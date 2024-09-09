<?php

use App\Models\Price;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prices', function () {

    $prices = Price::all();

    return view('prices.index', [
        'prices' => $prices
    ]);
});

Route::post('/prices', function () {
    return view('welcome');
});

// ORM - Object Relational Mapping