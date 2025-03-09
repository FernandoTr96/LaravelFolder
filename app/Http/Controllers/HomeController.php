<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    // Los metodos invoke se ejecutan al pasar solo la referencia de la clase 
    
    /*     public function index(){
        return 'Home';
    } */

    public function __invoke()
    {
        return 'Home';
    }
}
