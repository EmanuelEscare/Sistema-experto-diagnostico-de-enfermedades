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
        // Padecimiento: Resfriado común
        $resfriado = Padecimiento::create([
            'nombre' => 'Resfriado común',
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $resfriado->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Congestión nasal'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $resfriado->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Estornudos'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $resfriado->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Goteo nasal'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $resfriado->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Dolor de garganta leve'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $resfriado->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Tos leve'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $resfriado->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Fatiga'])->id,
        ]);

        // Padecimiento: Gripe (influenza)
        $gripe = Padecimiento::create([
            'nombre' => 'Gripe influenza',
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $gripe->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Fiebre alta'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $gripe->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Escalofríos'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $gripe->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Dolores musculares y corporales'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $gripe->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Congestión nasal'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $gripe->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Dolor de garganta'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $gripe->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Tos seca'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $gripe->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Fatiga intensa'])->id,
        ]);

        // Padecimiento: Bronquitis aguda
        $bronquitis = Padecimiento::create([
            'nombre' => 'Bronquitis aguda',
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $bronquitis->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Tos persistente con esputo flema'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $bronquitis->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Dificultad para respirar'])->id,
        ]);

        // Continúa agregando los demás padecimientos y sus síntomas aquí...

        // Padecimiento: Neumonía
        $neumonia = Padecimiento::create([
            'nombre' => 'Neumonía',
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $neumonia->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Tos con esputo puede ser verde o amarillo'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $neumonia->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Dificultad para respirar'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $neumonia->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Dolor en el pecho al respirar o toser'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $neumonia->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Fiebre alta'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $neumonia->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Escalofríos'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $neumonia->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Fatiga intensa'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $neumonia->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Sudoración excesiva'])->id,
        ]);

        // Padecimiento: Asma
        $asma = Padecimiento::create([
            'nombre' => 'Asma',
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $asma->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Sibilancias recurrentes silbidos al respirar'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $asma->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Dificultad para respirar'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $asma->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Opresión en el pecho'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $asma->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Tos especialmente por la noche o temprano en la mañana'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $asma->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Fatiga durante el ejercicio'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $asma->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Toser o silbar después de una infección respiratoria'])->id,
        ]);

        // Padecimiento: Enfermedad pulmonar obstructiva crónica EPOC
        $epoc = Padecimiento::create([
            'nombre' => 'Enfermedad pulmonar obstructiva crónica EPOC',
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $epoc->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Tos crónica con o sin esputo'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $epoc->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Dificultad para respirar especialmente al exhalar'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $epoc->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Opresión en el pecho'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $epoc->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Fatiga'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $epoc->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Producción excesiva de moco'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $epoc->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Sibilancias'])->id,
        ]);

        // Padecimiento: Enfisema
        $enfisema = Padecimiento::create([
            'nombre' => 'Enfisema',
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $enfisema->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Dificultad para respirar especialmente al exhalar'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $enfisema->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Fatiga'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $enfisema->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Opresión en el pecho'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $enfisema->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Tos crónica'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $enfisema->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Sibilancias'])->id,
        ]);

        $fibrosisPulmonar = Padecimiento::create([
            'nombre' => 'Fibrosis pulmonar',
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $fibrosisPulmonar->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Tos seca y persistente'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $fibrosisPulmonar->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Dificultad para respirar especialmente durante el ejercicio'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $fibrosisPulmonar->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Fatiga'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $fibrosisPulmonar->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Pérdida de peso inexplicada'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $fibrosisPulmonar->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Opresión en el pecho'])->id,
        ]);

        // Padecimiento: Tuberculosis TB
        $tuberculosis = Padecimiento::create([
            'nombre' => 'Tuberculosis TB',
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $tuberculosis->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Tos persistente durante más de tres semanas'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $tuberculosis->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Tos con esputo puede contener sangre'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $tuberculosis->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Dolor en el pecho'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $tuberculosis->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Debilidad general'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $tuberculosis->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Fatiga'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $tuberculosis->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Pérdida de peso inexplicada'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $tuberculosis->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Sudoración nocturna'])->id,
        ]);

        // Continuación...

        // Padecimiento: Enfermedad pulmonar intersticial
        $enfermedadPulmonarIntersticial = Padecimiento::create([
            'nombre' => 'Enfermedad pulmonar intersticial',
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $enfermedadPulmonarIntersticial->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Tos seca y persistente'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $enfermedadPulmonarIntersticial->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Dificultad para respirar especialmente durante el ejercicio'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $enfermedadPulmonarIntersticial->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Fatiga'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $enfermedadPulmonarIntersticial->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Opresión en el pecho'])->id,
        ]);

        Padecimientos_caracteristica::create([
            'padecimiento_id' => $enfermedadPulmonarIntersticial->id,
            'caracteristica_id' => Caracteristica::firstOrCreate(['nombre' => 'Pérdida de peso inexplicada'])->id,
        ]);

        // Continúa agregando los demás padecimientos y sus síntomas aquí...


    }
}
