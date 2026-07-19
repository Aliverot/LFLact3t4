<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videojuego;
use App\Models\Plataforma; // IMPORTANTE: Importamos el modelo Plataforma
use App\Http\Requests\StoreVideojuegoRequest;
use App\Http\Requests\UpdateVideojuegoRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\VideojuegoCreateMail;

class VideojuegoController extends Controller
{
    public function index()
    {
        $videojuegos = Videojuego::orderBy('id', 'desc')->paginate(5);
        return view('videojuegos.index', compact('videojuegos'));
    }

    public function create()
    {
        // Rescatamos todas las plataformas de la BD para mostrarlas en los checkboxes
        $plataformas = Plataforma::all();
        return view('videojuegos.create', compact('plataformas'));
    }

    public function store(StoreVideojuegoRequest $request)
    {
        // 1. Creamos el videojuego principal
        $juego = Videojuego::create($request->all());

        // 2. Asociamos las plataformas usando attach()
        if ($request->has('plataformas')) {
            $juego->plataformas()->attach($request->plataformas);
        }

        // 3. Relación 1 a 1: Creamos el Detalle si llenaron los campos
        if ($request->filled('motor_grafico') && $request->filled('peso_gb')) {
            $juego->detalle()->create([
                'motor_grafico' => $request->motor_grafico,
                'peso_gb' => $request->peso_gb
            ]);
        }

        // 4. Enviamos el correo
        Mail::to('admin@tujuego.com')->send(new VideojuegoCreateMail($juego));

        return redirect()->route('videojuegos.index');
    }
    
    public function show(Videojuego $videojuego)
    {
        return view('videojuegos.show', compact('videojuego'));
    }

    public function edit(Videojuego $videojuego)
    {
        // Mandamos el juego y TODAS las plataformas disponibles
        $plataformas = Plataforma::all();
        return view('videojuegos.edit', compact('videojuego', 'plataformas'));
    }

    public function update(UpdateVideojuegoRequest $request, Videojuego $videojuego)
    {
        // 1. Actualizamos los datos principales
        $videojuego->update($request->all());

        // 2. Relación Muchos a Muchos: Actualizamos plataformas
        if ($request->has('plataformas')) {
            $videojuego->plataformas()->sync($request->plataformas);
        } else {
            $videojuego->plataformas()->detach();
        }

        // 3. Relación 1 a 1: Actualizamos o creamos el Detalle
        if ($request->filled('motor_grafico') && $request->filled('peso_gb')) {
            $videojuego->detalle()->updateOrCreate(
                ['videojuego_id' => $videojuego->id], // Condición de búsqueda
                [
                    'motor_grafico' => $request->motor_grafico,
                    'peso_gb' => $request->peso_gb
                ]
            );
        }

        return redirect()->route('videojuegos.show', $videojuego);
    }

    public function destroy(Videojuego $videojuego)
    {
        $videojuego->delete();
        return redirect()->route('videojuegos.index');
    }
}