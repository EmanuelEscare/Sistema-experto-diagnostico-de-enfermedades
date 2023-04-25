<?php

namespace App\Http\Livewire;

use App\Models\Caracteristica;
use App\Models\Padecimiento;
use Livewire\Component;
use Illuminate\Http\Request;

class Diagnostico extends Component
{

    public $caracteristicas_ids_si = [];
    public $lista_caracteristicas = [];
    public $caracteristicas_ids_no = [];

    public $preguntas;


    public function render()
    {
        return view('livewire.diagnostico');
    }

    public function mount(){
        $this->preguntas = collect();
        $this->preguntas();
    }


    public function lista()
    {
        
        $padecimiento = Padecimiento::whereHas('caracteristicas', function ($query) {
            if (empty($this->caracteristicas_ids_si)) {
                $query;
            } else {
                $query->where('caracteristicas.id', $this->caracteristicas_ids_si);
            }
        })->whereDoesntHave('caracteristicas', function ($query) {
                $query->where('caracteristicas.id', $this->caracteristicas_ids_no);
        })
        ->get();
        
        return $this->lista_caracteristicas = $padecimiento->pluck('caracteristicas')->flatten()->unique('id')->whereNotIn('id', $this->caracteristicas_ids_si);

    }


    public function preguntas(){
        $lista = $this->lista()->first();

        $this->preguntas->push([
            'caracteristica_id' => $lista->id,
            'pregunta' => 'El paciente presenta el '.$lista->tipo.' de '.$lista->nombre.'?',
            'respuesta' => null,
            'contestada' => false,
        ]);
        
    }

    public function respuestas($id, $respuesta){
        if($respuesta == 0){
            array_push($this->caracteristicas_ids_no, $id);
        }
        if($respuesta == 1){
            array_push($this->caracteristicas_ids_si, $id);
        }

        $this->preguntas = $this->preguntas->map(function ($item) use ($id, $respuesta) {
            if ($item['caracteristica_id'] == $id) {
                $item['respuesta'] = $respuesta;
                $item['contestada'] = true;
                return $item;
            }
            
            return $item;
        });

        $this->lista();
        $this->preguntas();
        return;
    }
        

}
