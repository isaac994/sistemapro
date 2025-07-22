<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['nombre' => 'Admin', 'descripcion' => 'Administrador'],
            ['nombre' => 'Vendedor', 'descripcion' => 'Vendedor de tienda'],
            ['nombre' => 'Almacén', 'descripcion' => 'Gestión de inventario'],
            ['nombre' => 'Contador', 'descripcion' => 'Gestión contable'],
        ]);
    }
}
