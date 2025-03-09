<?php 

/* Inicializar valores o reglas para todo el proyecto */
namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * - Singletons
     * - Services
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     * - validations
     * - routes
     * - share variables
     */
    public function boot(): void
    {
        // validacion global de parametros en rutas
        Route::pattern('id','[0-9]+');
        // cambiar verbos de la url en los crud
        Route::resourceVerbs([
            'create' => 'nuevo',
            'edit' => 'editar',
            'destroy' => 'eliminar'
        ]);
    }
}
