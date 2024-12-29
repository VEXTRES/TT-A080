<?php

use App\Http\Controllers\InicioController;
use App\Livewire\MisPlanesController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});
Route::controller(InicioController::class)->group(function () {
    Route::get('/nutricion', 'nutricion')->name('nutricion');
    Route::get('/fitness', 'fitness')->name('fitness');
    Route::get('/salud', 'salud')->name('salud');
    Route::get('/acerca', 'acerca')->name('acerca');
});
//Route::get('/nutricion',[InicioController::class, 'nutricion'])->name('nutricion');

Route::get('plan-alimentacion',MisPlanesController::class)->name('plan-alimentacion');
// Route::get('/plan-entrenamiento',[PlanEntrenamientoController::class,'render'])->name('plan-entrenamiento');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('nutricion');
    })->name('dashboard');
});
