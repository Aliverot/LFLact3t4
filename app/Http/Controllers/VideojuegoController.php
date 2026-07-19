<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideojuegoController extends Controller
{
    public function index()
    {
        // Busca el archivo en resources/views/videojuegos/index.blade.php
        return view('videojuegos.index');
    }

    public function create()
    {
        return view('videojuegos.create');
    }

    public function show($videojuego, $plataforma = null)
    {
        // Pasamos las variables a la vista usando compact()
        return view('videojuegos.show', compact('videojuego', 'plataforma'));
    }
}