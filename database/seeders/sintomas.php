<?php

namespace Database\Seeders;

use App\Models\Sintoma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class sintomas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sintoma::create([
            'nombre' => 'tos'
        ]);

        Sintoma::create([
            'nombre' => 'fiebre'
        ]);

        Sintoma::create([
            'nombre' => 'fatiga'
        ]);
    }
}
