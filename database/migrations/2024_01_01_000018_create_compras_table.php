<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proveedor_id')->constrained('proveedores')->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->date('fecha');
            $table->decimal('total', 10, 2);
            $table->timestamps();
            $table->index(['proveedor_id'], 'idx_proveedor_id');
            $table->index(['usuario_id'], 'idx_usuario_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
