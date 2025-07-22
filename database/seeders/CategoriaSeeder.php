<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['nombre' => 'Smartphones', 'descripcion' => 'Teléfonos inteligentes'],
            ['nombre' => 'Accesorios', 'descripcion' => 'Accesorios para móviles'],
            ['nombre' => 'Wearables', 'descripcion' => 'Tecnología vestible'],
        ]);
    }
}
