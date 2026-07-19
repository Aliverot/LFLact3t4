<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// 1. Importación indispensable para que funcionen los mutadores/accesores
use Illuminate\Database\Eloquent\Casts\Attribute; 

class Videojuego extends Model
{
    // Le indicamos explícitamente a Eloquent qué tabla debe usar
    protected $table = 'videojuegos';

    // 2. Método protegido con el nombre exacto de la columna en la base de datos
    protected function titulo(): Attribute
    {
        return Attribute::make(
            // Accesor (get): Se ejecuta al LEER el dato (capitaliza la primera letra)
            get: fn (string $value) => ucfirst($value),

            // Mutador (set): Se ejecuta ANTES de guardar en MySQL (convierte todo a minúsculas)
            set: fn (string $value) => strtolower($value)
        );
    }
}