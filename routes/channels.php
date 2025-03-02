<!-- Este archivo contiene las rutas/emisiones para laravel con broadcasting -->
<!-- Anteriormente este archivo estaba disponible desde un inicio -->
<!-- Pero ahora se debe instalar con php artisan install:broadcasting -->
<!-- De esta forma solo la usaras cuando sea necesario y te instalara todo lo necesario incluido las dependencias del front -->


<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
