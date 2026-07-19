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
        Schema::create('genero_videojuego', function (Blueprint $table) {
            $table->id();
            
            // Llaves foráneas con borrado en cascada
            $table->foreignId('genero_id')->constrained()->onDelete('cascade');
            $table->foreignId('videojuego_id')->constrained()->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genero_videojuego');
    }
};
