<?php

use App\Http\Controllers\Games\CobrinhaController;
use App\Http\Controllers\Games\DesenhoController;
use App\Http\Controllers\Games\FalaController;
use App\Http\Controllers\Games\GravadorController;
use App\Http\Controllers\Games\HomeController;
use App\Http\Controllers\Games\MatematicaController;
use App\Http\Controllers\Games\RGBController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/games', 'index')->name('gamesHome.index');
        Route::get('/games/grid', 'grid')->name('gamesHome.grid');
    });

    Route::controller(RGBController::class)->group(function () {
        Route::get('/games/rgb', 'index')->name('rgb.index');
    });

    Route::controller(MatematicaController::class)->group(function () {
        Route::get('/games/matematica', 'index')->name('matematica.index');
    });

    Route::controller(FalaController::class)->group(function () {
        Route::get('/games/fala', 'index')->name('fala.index');
    });

    Route::controller(GravadorController::class)->group(function () {
        Route::get('/games/gravador-img', 'img')->name('gravador.img');
    });

    Route::controller(GravadorController::class)->group(function () {
        Route::get('/games/gravador-tela', 'tela')->name('gravador.tela');
    });

    Route::controller(GravadorController::class)->group(function () {
        Route::get('/games/gravador-voz', 'voz')->name('gravador.voz');
    });

    Route::controller(CobrinhaController::class)->group(function () {
        Route::get('/games/cobrinha', 'index')->name('cobrinha.index');
    });

    Route::controller(DesenhoController::class)->group(function () {
        Route::get('/games/desenho', 'index')->name('desenho.index');
    });
});
