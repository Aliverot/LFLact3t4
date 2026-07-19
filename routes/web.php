<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideojuegoController;

Route::get('/', function () {
    return view('welcome');
});

//Asignar las rutas a los métodos del controlador
Route::get('videojuegos', [VideojuegoController::class, 'index']);
Route::get('videojuegos/create', [VideojuegoController::class, 'create']);
Route::get('videojuegos/{videojuego}/{plataforma?}', [VideojuegoController::class, 'show']);