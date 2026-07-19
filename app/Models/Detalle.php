<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    // Habilitamos los campos para asignación masiva
    protected $fillable = ['motor_grafico', 'peso_gb', 'videojuego_id'];

    // Relación Inversa: Un detalle pertenece a un videojuego
    public function videojuego()
    {
        return $this->belongsTo(Videojuego::class);
    }
}