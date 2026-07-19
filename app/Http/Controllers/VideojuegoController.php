<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videojuego; // Importamos el modelo

class VideojuegoController extends Controller
{
    // 1. Mostrar listado
    public function index()
    {
        // Cambiamos get() por paginate(5) para fragmentar la vista
        $videojuegos = Videojuego::orderBy('id', 'desc')->paginate(5);
        return view('videojuegos.index', compact('videojuegos'));
    }

    // 2. Mostrar formulario de creación
    public function create()
    {
        return view('videojuegos.create');
    }

    // 3. Guardar el nuevo registro
    public function store(Request $request)
    {
        $juego = new Videojuego();
        $juego->titulo = $request->titulo;
        $juego->desarrollador = $request->desarrollador;
        $juego->descripcion = $request->descripcion;
        $juego->save();

        return redirect()->route('videojuegos.index');
    }

    // 4. Mostrar detalle de un registro
    public function show($id)
    {
        $videojuego = Videojuego::find($id);
        return view('videojuegos.show', compact('videojuego'));
    }

    // 5. Mostrar formulario de edición
    public function edit($id)
    {
        $videojuego = Videojuego::find($id);
        return view('videojuegos.edit', compact('videojuego'));
    }

    // 6. Actualizar el registro
    public function update(Request $request, $id)
    {
        $juego = Videojuego::find($id);
        $juego->titulo = $request->titulo;
        $juego->desarrollador = $request->desarrollador;
        $juego->descripcion = $request->descripcion;
        $juego->save();

        return redirect()->route('videojuegos.show', $juego);
    }

    // 7. Eliminar el registro
    public function destroy($id)
    {
        $juego = Videojuego::find($id);
        $juego->delete();

        return redirect()->route('videojuegos.index');
    }
}