<?php

namespace App\Http\Controllers;

use App\Models\Format;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Price;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with(['genre', 'price'])->latest()->paginate(20);

        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        $prices = Price::all();
        $formats = Format::all();

        return view('admin.movies.create', compact('genres', 'prices', 'formats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255', 'min:2'],
            'year' => ['required', 'numeric'],
            'genre_id' => ['required', 'exists:genres,id'],
            'price_id' => ['required', 'exists:prices,id'],
        ]);

        Movie::create($data);

        return redirect()->route('movies.index')->with('success', "Uspjesno dodan novi film $data[title]");
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('admin.movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        $prices = Price::all();

        return view('admin.movies.edit', compact('genres', 'prices', 'movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255', 'min:2'],
            'year' => ['required', 'numeric'],
            'genre_id' => ['required', 'exists:genres,id'],
            'price_id' => ['required', 'exists:prices,id'],
        ]);

        // $movie->update($data);
        $movie->title = $data['title'];
        $movie->year = $data['year'];
        $movie->genre_id = $data['genre_id'];
        $movie->price_id = $data['price_id'];
        $movie->save();

        return redirect()->back()->with('success', "Uspjesno uredjen film $data[title]");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', "Uspjesno obrisan film $movie[title]");
    }
}
