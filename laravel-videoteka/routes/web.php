<?php

use App\Models\Price;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');
});


Route::get('/prices', function () {

    $prices = Price::all();

    return view('admin.prices.index', [
        'prices' => $prices
    ]);
});

Route::get('/prices/create', function() {
    return view('admin.prices.create');
});

Route::post('/prices', function (Request $request) {
    Price::validate($request->all());
});



// ORM - Object Relational Mapping