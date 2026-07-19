<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Schema::table modifica una tabla que ya existe
        Schema::table('videojuegos', function (Blueprint $table) {
            // Agregamos la columna 'desarrollador'
            // Usamos nullable() para que no de error con los registros viejos
            // Usamos after() para ubicarla justo después del título
            $table->string('desarrollador')->nullable()->after('titulo');
        });
    }

    public function down(): void
    {
        // El rollback de esta migración específica es solo borrar la columna, no la tabla entera
        Schema::table('videojuegos', function (Blueprint $table) {
            $table->dropColumn('desarrollador');
        });
    }
};