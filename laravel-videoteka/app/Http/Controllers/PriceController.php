<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(session()->all());
        $prices = Price::all();

        return view('admin.prices.index', ['prices' => $prices]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.prices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => ['required', 'string', 'unique:prices'],
            'price' => ['required', 'numeric', 'gt:0'],
            'late_fee' => ['required', 'numeric', 'gt:0'],
        ]);
    
        Price::create($data);
    
        return redirect('/prices')->with('success', "Uspjesno kreirana nova cijena");
    }

    /**
     * Display the specified resource.
     */
    public function show(Price $price)
    {
        return view('admin.prices.show', ['price' => $price]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Price $price)
    {
        return view('admin.prices.edit', ['price' => $price]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Price $price)
    {
        $data = $request->validate([
            'type' => ['required', 'string', Rule::unique('prices')->ignore($price)],
            'price' => ['required', 'numeric', 'gt:0'],
            'late_fee' => ['required', 'numeric', 'gt:0'],
        ]);
    
        $price->update($data);
    
        return redirect('/prices')->with('success', "Uspjesno uredjena cijena {$price->type}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Price $price)
    {
        $type = $price->type;
        $price->delete();
        return redirect()->back()->with('message', ['type' => 'success', 'text' => "Uspjesno obrisana cijena $type"]);
    }
}
