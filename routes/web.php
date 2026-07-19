<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideojuegoController;

Route::get('/', function () {
    return view('welcome');
});

// 1. Leer (Listado)
Route::get('videojuegos', [VideojuegoController::class, 'index'])->name('videojuegos.index');
// 2. Crear (Mostrar formulario)
Route::get('videojuegos/create', [VideojuegoController::class, 'create'])->name('videojuegos.create');
// 3. Crear (Guardar en BD)
Route::post('videojuegos', [VideojuegoController::class, 'store'])->name('videojuegos.store');
// 4. Leer (Detalle de un registro)
Route::get('videojuegos/{videojuego}', [VideojuegoController::class, 'show'])->name('videojuegos.show');
// 5. Actualizar (Mostrar formulario de edición)
Route::get('videojuegos/{videojuego}/edit', [VideojuegoController::class, 'edit'])->name('videojuegos.edit');
// 6. Actualizar (Guardar cambios en BD)
Route::put('videojuegos/{videojuego}', [VideojuegoController::class, 'update'])->name('videojuegos.update');
// 7. Eliminar (Borrar de BD)
Route::delete('videojuegos/{videojuego}', [VideojuegoController::class, 'destroy'])->name('videojuegos.destroy');