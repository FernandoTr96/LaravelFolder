<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return 'Listar posts';
    }

    public function create(){
        return 'Ver formulario';
    }

    public function store(){
        return 'Guardar registro';
    }

    public function show($post){
        return 'Mostrar un registro';
    }

    public function edit($post){
        return 'Ver formulario para editar registro';
    }

    public function update($post){
        return 'Actualizar registro';
    }

    public function destroy($post){
        return 'Eliminar registro';
    }
}
