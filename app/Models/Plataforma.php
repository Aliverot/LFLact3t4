<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plataforma extends Model
{
    protected $fillable = ['nombre'];

    // Relación Inversa: Una plataforma tiene muchos videojuegos
    public function videojuegos()
    {
        return $this->belongsToMany(Videojuego::class);
    }
}