<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{

    public function nutricion(){
        if (auth()->check()) {
            // Usuario autenticado
            return view('inicio.nutricion.auth');
        } else {
            // Usuario no autenticado
            return view('inicio.nutricion.guest');
        }
    }
    public function fitness(){
        if (auth()->check()) {
            // Usuario autenticado
            return view('inicio.fitness.auth');
        } else {
            // Usuario no autenticado
            return view('inicio.fitness.guest');
        }
    }
    public function salud(){
        if (auth()->check()) {
            // Usuario autenticado
            return view('inicio.salud.auth');
        } else {
            // Usuario no autenticado
            return view('inicio.salud.guest');
        }
    }
    public function acerca(){
        if (auth()->check()) {
            // Usuario autenticado
            return view('inicio.acerca.auth');
        } else {
            // Usuario no autenticado
            return view('inicio.acerca.guest');
        }
    }
}
