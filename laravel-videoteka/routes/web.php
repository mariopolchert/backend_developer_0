<?php

use App\Models\Price;
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



// ORM - Object Relational Mapping