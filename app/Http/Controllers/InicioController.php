<?php

namespace App\Http\Controllers;

use App\Services\NewsApiService;
use Illuminate\Http\Request;

class InicioController extends Controller
{

    public function nutricion(){
        if (auth()->check()) {

            $api= new NewsApiService();
            $news=$api->getNews('comida');
            return view('inicio.nutricion.auth',['news'=>$news]);
        } else {
            $api= new NewsApiService();
            $news=$api->getNews('comida');
            return view('inicio.nutricion.guest',['news'=>$news]);
        }
    }
    public function fitness(){
        if (auth()->check()) {
            $api= new NewsApiService();
            $news=$api->getNews('fitness');
            return view('inicio.fitness.auth',['news'=>$news]);
        } else {
            $api= new NewsApiService();
            $news=$api->getNews('fitness');
            return view('inicio.fitness.guest',['news'=>$news]);
        }
    }
    public function salud(){
        if (auth()->check()) {
            $api= new NewsApiService();
            $news=$api->getNews('salud');
            return view('inicio.salud.auth',['news'=>$news]);
        } else {
            $api= new NewsApiService();
            $news=$api->getNews('salud');
            return view('inicio.salud.guest',['news'=>$news]);
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
