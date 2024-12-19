<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function nutricion(){
        return view('inicio.nutricion');
    }
    public function fitness(){
        return view('inicio.fitness');
    }
    public function salud(){
        return view('inicio.salud');
    }
    public function acerca(){
        return view('inicio.acerca');
    }
}
