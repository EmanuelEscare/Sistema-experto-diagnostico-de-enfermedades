<?php

namespace Database\Seeders;

use App\Models\Caracteristica;
use App\Models\Padecimiento;
use App\Models\Padecimientos_caracteristica;
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

        // Define los nombres de las enfermedades
        $nombresPadecimientos = [
            'Gripe',
            'Resfriado común',
            'Neumonía',
            'Bronquitis',
            'Faringitis',
            'Hipertensión',
            'Diabetes',
            'Cáncer de pulmón',
            'Artritis',
            'Depresión'
        ];

        // Define los síntomas comunes para las primeras cinco enfermedades
        $sintomasComunes = [
            'Fiebre',
            'Tos seca',
            'Fatiga',
            'Dolor de cabeza',
            'Dolor de garganta',
            'Congestión nasal',
            'Dificultad para respirar',
            'Dolor muscular'
        ];

        // Define los síntomas diferentes para las últimas cinco enfermedades
        $sintomasDiferentes = [
            'Presión arterial alta',
            'Niveles elevados de azúcar en la sangre',
            'Dolor en las articulaciones',
            'Tristeza y desesperanza',
            'Náuseas',
            'Pérdida de peso'
        ];

        // Crea los padecimientos y sus características asociadas
        foreach ($nombresPadecimientos as $key => $nombre) {
            $padecimiento = Padecimiento::create([
                'nombre' => $nombre
            ]);

            if ($key < 5) {
                // Síntomas comunes para las primeras cinco enfermedades
                $sintomas = $sintomasComunes;
            } else {
                // Síntomas diferentes para las últimas cinco enfermedades
                $sintomas = $sintomasDiferentes;
            }

            foreach ($sintomas as $sintoma) {
                $caracteristica = Caracteristica::firstOrCreate([
                    'nombre' => $sintoma
                ]);

                Padecimientos_caracteristica::create([
                    'caracteristica_id' => $caracteristica->id,
                    'padecimiento_id' => $padecimiento->id
                ]);
            }
        }
    }
}
