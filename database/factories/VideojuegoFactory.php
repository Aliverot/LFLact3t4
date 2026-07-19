<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideojuegoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'slug' => $this->faker->unique()->slug(), // Genera textos tipo: mi-juego-falso
            'desarrollador' => $this->faker->company(),
            'descripcion' => $this->faker->text(200),
            'published_at' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'is_active' => $this->faker->boolean(),
        ];
    }
}