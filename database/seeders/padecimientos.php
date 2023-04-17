<?php

namespace Database\Seeders;

use App\Models\Padecimiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class padecimientos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Padecimiento::create([
            'nombre' => 'COVID-19'
        ]);
        
        Padecimiento::create([
            'nombre' => 'Influenza'
        ]);
    }
}
