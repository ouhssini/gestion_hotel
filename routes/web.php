<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;





Route::middleware('auth')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');

    Route::resource('chambres', ChambreController::class);
    Route::resource('types', TypeController::class)->except('show');
    Route::resource('clients', ClientController::class);
    Route::resource('reservations', ReservationController::class)->except('show');

});



// login routes 

Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'login')->name('login');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });
});
