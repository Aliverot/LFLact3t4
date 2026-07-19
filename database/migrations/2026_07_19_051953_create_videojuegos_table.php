<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create crea la tabla desde cero
        Schema::create('videojuegos', function (Blueprint $table) {
            $table->id(); // Llave primaria autoincremental
            $table->string('titulo'); // Varchar
            $table->text('descripcion'); // Texto largo
            $table->timestamps(); // Crea los campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // El "botón de pánico" que elimina la tabla si hacemos un rollback
        Schema::dropIfExists('videojuegos');
    }
};