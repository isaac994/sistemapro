<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('marcas')->insert([
            ['nombre' => 'Apple', 'descripcion' => 'Apple Inc.'],
            ['nombre' => 'Samsung', 'descripcion' => 'Samsung Electronics'],
            ['nombre' => 'Xiaomi', 'descripcion' => 'Xiaomi Corp.'],
            ['nombre' => 'Motorola', 'descripcion' => 'Motorola Mobility'],
        ]);
    }
}
