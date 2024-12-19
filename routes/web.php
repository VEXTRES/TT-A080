<?php

use App\Http\Controllers\InicioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::controller(InicioController::class)->group(function () {
    Route::get('/nutricion', 'nutricion')->name('nutricion');
    Route::get('/fitness', 'fitness')->name('fitness');
    Route::get('/salud', 'salud')->name('salud');
    Route::get('/acerca', 'acerca')->name('acerca');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
