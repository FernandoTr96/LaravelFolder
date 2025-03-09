<?php

// Aqui se registran las rutas que son parte del proyecto full stack de laravel blade
// rutas en cache: php artisan route:cache
// eliminar rutas del cache: php artisan route:clear

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// una ruta recibe una ruta url, un controlador  y retorna una vista o respuesta.
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', HomeController::class)->name('home');

// cada ruta debe tener un verbo: post get patch delete
Route::match(['get', 'post'], '/verbos-http', function () {
    return "GET POST PATH DELETE";
});

// las rutas reciben datos para ser dinamicas dependiendo el verbo
// Las rutas tipo get obtienen parametros mediante la url los cuales pueden ser string o modelos de datos
// Estas se reciben en su funcion controladora como parametro
// Los parametros tienen un binding lo que provoca que las variables tengan que tener el mismo nombre del parametro
// Los parametros pueden ser opcionales y validarse
Route::get('saludar/{nombre}/{mensaje?}', function ($nombre, $mensaje = 'me gusta laravel') {
    return "Hola, soy $nombre. $mensaje !!";
})
    ->where('nombre', '[a-zA-Z\s]+')    // Permite letras y espacios para nombre
    ->where('mensaje', '[a-zA-Z\s]+')   // Permite letras y espacios para mensaje
    ->name('saludar');                  //nombrar ruta para usar el endpoint obtenerURL;


// Las rutas pueden ser nombradas lo cual nos da un punto de referencia para obtener su url y reutilizar codigo
Route::get('obtenerURL/{nombreRuta}', function ($nombreRuta) {
    return route($nombreRuta, ['nombre' => 'Dante']);
});


// Rutas para hacer un crud 
// Rutas manuales

// 1.- Listar registros
//Route::get('/posts', [PostController::class,'index'])->name('post.index');

// 2.- Mostrar formulario para guardar registro
//Route::get('/posts/create', [PostController::class,'create'])->name('post.create');

// 3.- Guardar registro
//Route::post('/posts', [PostController::class,'store'])->name('post.store');

// 4.- Mostrar un registro
//Route::get('/posts/{post}', [PostController::class,'show'])->name('post.show');

// 5.- Mostrar formulario para editar registro
//Route::get('/posts/{post}/edit', [PostController::class,'edit'])->name('post.edit');

// 6.- Actualizar un registro
//Route::patch('/posts/{post}', [PostController::class,'update'])->name('post.update');

// 7.- Eliminar un registro
//Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('post.destroy');


// Rutas usando resource
// generara todas las rutas necesarias para fullstack
//Route::resource('post', PostController::class);

// En el caso de las api no necesitamos la vista de edit y create asi que mejor usar esto
// Route::apiResources('post', PostController::class);

// tambien podemos usar only para generar solo algunas rutas
// Route::apiResources('post', PostController::class)->only(['index']);

// En los resource tambien se pueden agregar names debido a que no estan individualmente hay que cambiar el nombre
// y el nombre del parametro si lo requieres
/* Route::resource('post', PostController::class)
    ->parameters(['articulos' => 'post'])
    ->names('articulos'); */


// Grupo de rutas agrupa rutas que usan el mismocontroller
Route::prefix('posts')->name('posts.')->controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{post}', 'show')->name('show');
    Route::get('/{post}/edit', 'edit')->name('edit');
    Route::patch('/{post}', 'update')->name('update');
    Route::delete('/{post}', 'destroy')->name('destroy');
});
