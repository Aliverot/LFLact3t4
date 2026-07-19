<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    // Habilitamos la asignación masiva
    protected $fillable = ['cuerpo', 'videojuego_id'];

    // Relación Inversa (Un comentario pertenece a un videojuego)
    public function videojuego()
    {
        return $this->belongsTo(Videojuego::class);
    }
}