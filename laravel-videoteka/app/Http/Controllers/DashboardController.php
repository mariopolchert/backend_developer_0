<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        
        $copies = Copy::join('movies', 'movies.id', '=', 'copies.movie_id')
                ->join('formats', 'formats.id', '=', 'copies.format_id')
                ->select('movies.id as movies_id', 'movies.title', 'movies.year', 
                'formats.id as formats_id', 'formats.type', DB::raw('count(movies.id) as amount'))
                ->where('copies.available', 1)
                ->groupBy('movies.id', 'formats.id')
                ->orderBy('movies.title')
                ->get();

        $rentals = DB::table('copy_rental')
                ->join('copies', 'copies.id', '=', 'copy_rental.copy_id')
                ->join('formats', 'formats.id', '=', 'copies.format_id')
                ->join('movies', 'movies.id', '=', 'copies.movie_id')
                ->join('genres', 'genres.id', '=', 'movies.genre_id')
                ->join('prices', 'prices.id', '=', 'movies.price_id')
                ->join('rentals', 'rentals.id', '=', 'copy_rental.rental_id')
                ->join('users', 'users.id', '=', 'rentals.user_id')
                ->select('rentals.id', 'rentals.rental_date', 'rentals.return_date',
                        'users.first_name', 'users.last_name', 'users.member_id',
                        'copy_rental.copy_id', 'copies.movie_id', 'movies.title', 'movies.year',
                        'genres.name as genre', 'formats.type as format',
                        DB::raw('round(prices.price * formats.coefficient, 2) as price'), DB::raw('round(prices.late_fee * formats.coefficient) as late_fee'))
                ->whereNull('rentals.return_date')
                ->orderBy('rentals.rental_date', 'desc')
                ->paginate(20);

        return view('admin.dashboard.index', compact('users', 'copies', 'rentals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function returnMovie(Request $request, Copy $copy)
    {
        DB::transaction(function ($copy) {
            $date = date('Y-m-d H:i:s');

            $copy->available = 1;
            $copy->save();

            $copyRental = DB::table('copy_rental')->where('copy_rental.copy_id', $copy->id)->findOrFail();
            $copyRental->return_date = $date;
            $copyRental->save();

            $rentals = DB::table('copy_rental')->where('copy_rental.rental_id', $copyRental->rental_id)->where('copy_rental.copy_id', '!=', $copy->id)->get();
            if(count($rentals) != null) {
                $flag = false;
                foreach ($rentals as $rental) {
                    if ($rental->return_date == null) {
                        $flag = true;
                    }
                }   
            }

            $rental = Rental::where('rental.id', $copyRental->rental_id)->get();
            $rental->updated_at = $date;
            if ($flag === false) {
                $rental->return_date = $date;
            }
            $rental->save();
        });
        
        return redirect()->route('dashboard.index')->with('success', 'Uspješno vraćen film');
    }
}