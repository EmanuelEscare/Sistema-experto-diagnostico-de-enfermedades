<?php

namespace Database\Seeders;

use App\Models\Paciente;
use App\Models\Padecimiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pacientes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paciente::create([
            'nombre' => 'Sandra',
            'apellidos' => 'Cuevas',
            'fecha_nacimiento' => '1980-10-01',
            'email' => 'sandra@gmail.com',
            'telefono' => '3317009646',
            'sexo' => 'femenino'
        ]);
    }
}
