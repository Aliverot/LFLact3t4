<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('ola');
});

// 1. Ruta para listar todos los videojuegos
Route::get('videojuegos', function () {
    return "Aquí se mostrará el listado de todos los videojuegos";
});

// 2. Ruta para mostrar el formulario de creación
Route::get('videojuegos/create', function () {
    return "Aquí se mostrará el formulario para registrar un nuevo videojuego";
});

// 3. Ruta dinámica para mostrar un videojuego en específico usando un parámetro
Route::get('videojuegos/{videojuego}', function ($videojuego) {
    return "Aquí se mostrarán los detalles del videojuego: {$videojuego}";
});

// 4. Ruta con parámetro opcional (por si queremos filtrar por categoría, por ejemplo)
Route::get('videojuegos/{videojuego}/{plataforma?}', function ($videojuego, $plataforma = null) {
    if ($plataforma) {
        return "Mostrando el juego {$videojuego} para la plataforma {$plataforma}";
    }
    return "Mostrando el juego {$videojuego} en todas sus plataformas";
});