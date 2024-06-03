<?php

use App\Http\Controllers\Caixeta\Admin\AdminController;
use App\Http\Controllers\Caixeta\Admin\DashBoardController;
use App\Http\Controllers\Caixeta\Web\HomeController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function(){
    Route::controller(HomeController::class)->group(function () {
        Route::get('/caixeta', 'index')->name('webHome.index');
    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('/caixeta/admin/', 'index')->name('admin.index')->middleware('auth');
        Route::get('/caixeta/admin/login', 'login')->name('login');

        Route::get('/caixeta/admin/logout', 'logout')->name('admin.logout')->middleware('auth');

        Route::post('/caixeta/admin/login', 'storeLogin')->name('admin.storeLogin');
    });

    Route::controller(DashBoardController::class)->group(function () {
        Route::get('/caixeta/admin/dashboard/', 'index')->name('dashBoard.index')->middleware('auth');
        Route::get('/caixeta/admin/dashboard/service/{url}', 'service')->name('admin.service')->middleware('auth');
        Route::post('/caixeta/admin/dashboard/', 'store')->name('dashBoard.store')->middleware('auth');
    });
});

