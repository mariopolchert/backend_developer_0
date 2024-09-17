<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\PriceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');
});

// Route::get('/prices', [PriceController::class, 'index'])->name('prices.index');
// Route::get('/prices/create', [PriceController::class, 'create'])->name('prices.create');
// Route::post('/prices', [PriceController::class, 'store'])->name('prices.store');
// Route::get('/prices/{price}', [PriceController::class, 'show'])->name('prices.show');
// Route::get('/prices/{price}/edit', [PriceController::class, 'edit'])->name('prices.edit');
// Route::put('/prices/{price}', [PriceController::class, 'update'])->name('prices.update');
// Route::delete('/prices/{price}', [PriceController::class, 'destroy'])->name('prices.destroy');

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
// Route::resource('prices', PriceController::class);
