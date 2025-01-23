<?php

use App\Http\Controllers\InicioController;
use App\Livewire\MisPlanesController;
use App\Livewire\PlanAlimentacionController;
use App\Livewire\PlanEntrenamientoController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;



    Route::get('/', function () {
        return view('welcome');
    });

Route::controller(InicioController::class)->group(function () {
    Route::get('/nutricion', 'nutricion')->name('nutricion');
    Route::get('/fitness', 'fitness')->name('fitness');
    Route::get('/salud', 'salud')->name('salud');
    Route::get('/acerca', 'acerca')->name('acerca');
})->middleware('auth.redirect');
//Route::get('/nutricion',[InicioController::class, 'nutricion'])->name('nutricion');

Route::get('mis-planes', MisPlanesController::class)
->name('mis-planes')
->middleware('auth.redirect');

Route::get('plan-entrenamiento/{id}',PlanEntrenamientoController::class)
->name('plan-entrenamiento')
->middleware('auth.redirect');

Route::get('plan-alimentacion/{id}',PlanAlimentacionController::class)
->name('plan-alimentacion')
->middleware('auth.redirect');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('nutricion');
    })->name('dashboard');
});
