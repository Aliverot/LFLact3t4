<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('videojuegos', function (Blueprint $table) {
            $table->string('desarrollador')->nullable()->after('titulo');
            
            // 1. Añadimos el campo timestamp
            $table->timestamp('published_at')->nullable();
            
            // 2. Añadimos el campo boolean (MySQL lo creará como tinyint)
            $table->boolean('is_active')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('videojuegos', function (Blueprint $table) {
            $table->dropColumn('desarrollador');
            $table->dropColumn('published_at');
            $table->dropColumn('is_active');
        });
    }
};