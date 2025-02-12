<?php

use App\Http\Controllers\InicioController;
use App\Livewire\Admin\DashboardController;
use App\Livewire\Admin\DetallesUsuario;
use App\Livewire\CrearComidaController;
use App\Livewire\DetallesSeguimientoController;
use App\Livewire\MisPlanesController;
use App\Livewire\PlanAlimentacionController;
use App\Livewire\PlanEntrenamientoController;
use App\Livewire\SeguimientoController;
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
})->middleware('verify.auth');
//Route::get('/nutricion',[InicioController::class, 'nutricion'])->name('nutricion');

Route::get('mis-planes', MisPlanesController::class)
->name('mis-planes')
->middleware('verify.auth');

Route::get('plan-entrenamiento/{id}',PlanEntrenamientoController::class)
->name('plan-entrenamiento')
->middleware('verify.auth');

Route::get('plan-alimentacion/{id}',PlanAlimentacionController::class)
->name('plan-alimentacion')
->middleware('verify.auth');

Route::get('plan-alimentacion/{id}/crear-comida',CrearComidaController::class)
->name('plan-alimentacion.crear-comida')
->middleware('verify.auth');

Route::get('seguimiento',SeguimientoController::class)
->name('seguimiento')
->middleware('verify.auth');

Route::get('seguimiento/detalles/{id}',DetallesSeguimientoController::class)
->name('seguimiento.detalles')
->middleware('verify.auth');

Route::get('admin/dashboard',DashboardController::class)
->name('admin.dashboard')
->middleware('IsAdmin');

Route::get('admin/detalles-usuario/{id}',DetallesUsuario::class)
->name('admin.detalles-usuario')
->middleware('IsAdmin');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('nutricion');
    })->name('dashboard')->middleware('verify.auth');
});
