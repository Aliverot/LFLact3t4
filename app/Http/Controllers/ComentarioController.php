<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videojuego;

class ComentarioController extends Controller
{
    public function store(Request $request, Videojuego $videojuego)
    {
        // Validamos que el comentario no venga vacío
        $request->validate([
            'cuerpo' => 'required|string|max:1000'
        ]);

        // Creamos el comentario usando la relación (Laravel inyecta el videojuego_id automático)
        $videojuego->comentarios()->create([
            'cuerpo' => $request->cuerpo
        ]);

        // Recargamos la página del videojuego
        return redirect()->route('videojuegos.show', $videojuego);
    }
}