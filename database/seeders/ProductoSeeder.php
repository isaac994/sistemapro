<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        // Productos demo
        $productos = [
            [
                'nombre' => 'iPhone 15',
                'descripcion' => 'Apple iPhone 15',
                'precio' => 1200.00,
                'categoria_id' => 1,
                'marca_id' => 1,
            ],
            [
                'nombre' => 'Galaxy S24',
                'descripcion' => 'Samsung Galaxy S24',
                'precio' => 1100.00,
                'categoria_id' => 1,
                'marca_id' => 2,
            ],
            [
                'nombre' => 'Redmi Note 13',
                'descripcion' => 'Xiaomi Redmi Note 13',
                'precio' => 400.00,
                'categoria_id' => 1,
                'marca_id' => 3,
            ],
            [
                'nombre' => 'Moto G84',
                'descripcion' => 'Motorola Moto G84',
                'precio' => 350.00,
                'categoria_id' => 1,
                'marca_id' => 4,
            ],
        ];
        foreach ($productos as $producto) {
            $id = DB::table('productos')->insertGetId($producto + ['created_at' => now(), 'updated_at' => now()]);
            $stock = match ($producto['nombre']) {
                'iPhone 15' => 3,
                'Galaxy S24' => 5,
                'Redmi Note 13' => 10,
                'Moto G84' => 7,
                default => 0,
            };
            DB::table('inventario')->insert([
                'producto_id' => $id,
                'cantidad' => $stock,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
