<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Videojuego; // Importamos el modelo

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Llamamos al seeder de usuarios (que crea el admin y 10 fakes)
        $this->call([
            UserSeeder::class,
        ]);

        // 2. Ejecutamos el factory directamente aquí, creando 20 videojuegos
        Videojuego::factory(20)->create();
    }
}