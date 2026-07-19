<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideojuegoController;
use App\Http\Controllers\ComentarioController;

use App\Models\Videojuego;
use App\Models\Detalle;
use App\Models\Comentario;
use App\Models\Plataforma;
use App\Models\Genero;


Route::get('/', function () {
    return view('welcome');
});

// Una sola línea para manejar todo el CRUD de videojuegos
Route::resource('videojuegos', VideojuegoController::class);

// Ruta específica para guardar los comentarios
Route::post('/videojuegos/{videojuego}/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');