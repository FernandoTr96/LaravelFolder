<?php

// Aqui se registran las rutas que son parte del proyecto full stack de laravel blade
// rutas en cache: php artisan route:cache
// eliminar rutas del cache: php artisan route:clear
use Illuminate\Support\Facades\Route;

// una ruta recibe una ruta url, un controlador  y retorna una vista o respuesta.
Route::get('/', function () {
    return view('welcome');
});

// cada ruta debe tener un verbo: post get patch delete
Route::match(['get', 'post'], '/verbos-http', function () {
    return "GET POST PATCH DELETE";
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
    return route($nombreRuta,['nombre' => 'Dante']);
});


// Rutas para hacer un crud 

// 1.- Listar registros
Route::get('/posts', function(){
    return 'Listar posts';
});

// 2.- Mostrar formulario para guardar registro
Route::get('/posts/create', function(){
    return 'Ver formulario';
});

// 3.- Guardar registro
Route::post('/posts', function(){
    return 'Guardar registro';
});

// 4.- Mostrar un registro
Route::get('/posts/{post}', function($post){
    return 'Mostrar un registro';
});

// 5.- Mostrar formulario para editar registro
Route::get('/posts/{post}/edit', function($post){
    return 'Ver formulario para editar registro';
});

// 6.- Actualizar un registro
Route::patch('/posts/{post}', function($post){
    return 'Actualizar registro';
});

// 7.- Eliminar un registro
Route::delete('/posts/{post}', function($post){
    return 'Eliminar registro';
});