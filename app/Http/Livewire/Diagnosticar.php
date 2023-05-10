<?php

namespace App\Http\Livewire;

use App\Models\Cita;
use App\Models\Diagnostico;
use App\Models\Padecimiento;
use App\Models\Receta;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Diagnosticar extends Component
{
    public $cita,$cita_id,$padecimientos,$padecimiento,$mesage_notification;

    public $indicaciones;

    public function render()
    {
        return view('livewire.diagnosticar');
    }

    public function mount()
    {
        $this->padecimientos = Padecimiento::get();
        $this->cita = Cita::find($this->cita_id);
    }

    public function diagnosticar(){
        
        $this->validate([
            'padecimiento' => 'required',
        ]);

        try {
            $diagnostico = new Diagnostico;

            $diagnostico->padecimiento_id = $this->padecimiento;
            $diagnostico->cita_id = $this->cita->id;
            // dd($this->padecimiento);
            $diagnostico->save();

            DB::commit();

            $this->mesage_notification = "Diagnóstico realizado";
            $this->dispatchBrowserEvent('notification');
            $this->mount();
            return;
        } catch (\Exception $e) {
            DB::rollback();

            $this->mesage_notification = "Error: " . $e;
            $this->dispatchBrowserEvent('notification');
            return;
        }
    }

    public function recetar(){
        
        $this->validate([
            'indicaciones' => 'required',
        ]);

        try {
            $receta = new Receta();

            $receta->diagnostico_id = $this->cita->diagnostico->id;
            $receta->indicaciones = $this->indicaciones;
            $receta->save();

            DB::commit();

            $this->mesage_notification = "Diagnóstico realizado";
            $this->dispatchBrowserEvent('notification');
            $this->mount();
            return;
        } catch (\Exception $e) {
            DB::rollback();

            $this->mesage_notification = "Error: " . $e;
            $this->dispatchBrowserEvent('notification');
            return;
        }
    }
}
