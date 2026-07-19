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
            
            // Añadimos el slug como campo único después del título
            $table->string('slug')->unique()->after('titulo'); 
            
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_active')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('videojuegos', function (Blueprint $table) {
            $table->dropColumn('desarrollador');
            $table->dropColumn('slug'); // No olvides agregarlo al rollback
            $table->dropColumn('published_at');
            $table->dropColumn('is_active');
        });
    }   
};