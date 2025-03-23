<?php

// Este archivo contiene las rutas de api para laravel -->
// Anteriormente este archivo estaba disponible desde un inicio -->
// Pero ahora se debe instalar con php artisan install:api -->
// De esta forma solo la usaras cuando sea necesario y ya vendra configurado con sanctum -->

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
