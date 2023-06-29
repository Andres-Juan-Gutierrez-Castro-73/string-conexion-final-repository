<?php

namespace Database\Seeders;

use App\Models\Cadena;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cadenaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cadena::create([
            'nombre_cadena' => 'TICS'
        ]);
    }
}
