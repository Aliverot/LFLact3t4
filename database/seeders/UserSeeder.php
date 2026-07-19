<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Nuestro usuario real (fijo) para poder iniciar sesión después
        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('password');
        $user->save();

        // 2. Llamamos al Factory por defecto para crear 10 usuarios aleatorios
        User::factory(10)->create();
    }
}