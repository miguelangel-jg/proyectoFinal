<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('camisetas', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('nombre_equipo'); // Nombre del equipo
            $table->string('temporada'); // Temporada (Ej: 2023/24)
            $table->string('marca'); // Marca (Ej: Adidas, Nike, Puma)
            $table->string('talla'); // Talla (Ej: S, M, L, XL)
            $table->decimal('precio', 8, 2); // Precio (Ej: 79.99)
            $table->integer('stock'); // Cantidad en stock
            $table->string('imagen'); // Nombre del archivo de imagen
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camisetas');
    }
};
