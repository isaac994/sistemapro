<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->decimal('precio', 10, 2);
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->foreignId('marca_id')->constrained('marcas')->onDelete('cascade');
            $table->timestamps();
            $table->index(['categoria_id'], 'idx_categoria_id');
            $table->index(['marca_id'], 'idx_marca_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
