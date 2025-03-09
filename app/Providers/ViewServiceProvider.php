<?php

// para crear un provider php artisan make:provider nombre
// sirvan para extraer las configuraciones globales de laravel las cuales van en AppServiceProvider
// de esta forma las confguraciones van por archivo 
// este archivo se configura solo en bootstrap/providers de no ser asi agregar manualmente

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // pasar datos a todas las vistas con view que tiene que venir de facade
        // tambien de puede con view::composer el cual permite enviar la variable a una sola vista
        View::share('errorMessage', 'Error when load info');
    }
}
