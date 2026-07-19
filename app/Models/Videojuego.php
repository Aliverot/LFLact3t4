<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Videojuego extends Model
{
    use HasFactory; // Habilitamos el uso de Factories en este modelo

    protected $table = 'videojuegos';

    protected function titulo(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value)
        );
    }

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }
}