<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Videojuego extends Model
{
    use HasFactory;

    protected $table = 'videojuegos';

    // 1. Añadimos los campos permitidos para asignación masiva
    // Omitimos intencionalmente 'is_active' u otros campos sensibles
    protected $fillable = [
        'titulo',
        'slug',
        'desarrollador',
        'descripcion'
    ];

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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relación Uno a Uno
    public function detalle()
    {
        return $this->hasOne(Detalle::class);
    }

    // Relación Uno a Muchos (Un videojuego tiene muchos comentarios)
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    // Relación Muchos a Muchos (Un videojuego pertenece a muchas plataformas)
    public function plataformas()
    {
        return $this->belongsToMany(Plataforma::class);
    }
    // Relación Muchos a Muchos
    public function generos()
    {
        return $this->belongsToMany(Genero::class);
    }

}