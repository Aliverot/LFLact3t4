<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideojuegoFactory extends Factory
{
    public function definition(): array
    {
        return [
            // sentence(3) genera un título de 3 palabras
            'titulo' => $this->faker->sentence(3),
            
            // company() genera un nombre de empresa aleatorio
            'desarrollador' => $this->faker->company(),
            
            // text(200) genera un párrafo corto de máximo 200 caracteres
            'descripcion' => $this->faker->text(200),
            
            // dateTimeBetween() genera una fecha aleatoria en la última década
            'published_at' => $this->faker->dateTimeBetween('-10 years', 'now'),
            
            // boolean() devuelve true o false al azar
            'is_active' => $this->faker->boolean(),
        ];
    }
}