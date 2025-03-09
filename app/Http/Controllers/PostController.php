<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // Las variables se pasan a las vistas usando compact o en array si qquieres definir el nombre de la variable
        $title = 'My posts';
        return view('posts.index', compact('title'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        return 'Guardar registro';
    }

    public function show($post){
        return view('posts.show');
    }

    public function edit($post){
        return view('posts.edit');
    }

    public function update($post){
        return 'Actualizar registro';
    }

    public function destroy($post){
        return 'Eliminar registro';
    }
}
