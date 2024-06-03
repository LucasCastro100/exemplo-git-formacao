<?php


use App\Http\Controllers\BeerCode\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function(){
    Route::controller(HomeController::class)->group(function () {
        Route::get('/beercode', 'index')->name('home.index');
    });
});


