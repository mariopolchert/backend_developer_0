<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');
});


Route::delete('/prices/alex', [PriceController::class, 'alex'])->name('prices.alex');

Route::controller(PriceController::class)->group(function(){
    Route::get('/prices', 'index')->name('prices.index');
    Route::get('/prices/create', 'create')->name('prices.create');
    Route::post('/prices', 'store')->name('prices.store');
    Route::get('/prices/{price}', 'show')->name('prices.show');
    Route::get('/prices/{price}/edit', 'edit')->name('prices.edit');
    Route::put('/prices/{price}', 'update')->name('prices.update');
    Route::delete('/prices/{price}', 'destroy')->name('prices.destroy');
});

Route::resource('movies', MovieController::class);
Route::resource('rentals', RentalController::class);
Route::resource('formats', FormatController::class);


Route::controller(DashboardController::class)->group(function(){
    Route::get('/dashboard', 'index')->name('dashboard.index');
    Route::patch('/dashboard/return', 'return')->name('dashboard.return');
});
