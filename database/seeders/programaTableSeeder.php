<?php

namespace Database\Seeders;

use App\Models\Programa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class programaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Programa::create([
            'nombre_programa' => 'ADSI',
            'ficha_programa' => '2471718',
            'cadena_id' => '1'
        ]);

        /* Programa::create([
            'nombre_programa' => 'ADSI',
            'ficha_programa' => '2471726',
            'cadena_id' => '1'
        ]); */
    }
}
