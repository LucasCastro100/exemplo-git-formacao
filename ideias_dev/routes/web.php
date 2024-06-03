<?php

use App\Http\Controllers\Ideias\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('ideiasHome.index');
});
