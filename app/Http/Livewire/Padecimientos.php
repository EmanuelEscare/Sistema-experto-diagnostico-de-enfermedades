<?php

namespace App\Http\Livewire;

use App\Models\Caracteristica;
use App\Models\Padecimiento;
use App\Models\Padecimientos_caracteristica;
use Livewire\Component;

class Padecimientos extends Component
{
    public $padecimientosData, $confirming, $confirmingSintoma, $mesage_notification;
    public $nowPage = 1;
    public $pages = 10;

    public $sintoma, $sintomas, $padecimiento;

    public function render()
    {
        $padecimientos = $this->padecimientosData->slice(($this->nowPage - 1) * $this->pages)->take($this->pages);
        return view('livewire.padecimientos', ['padecimientos' => $padecimientos]);
    }


    public function mount()
    {
        $this->padecimientosData = Padecimiento::get();
    }

    public function sintomas($id)
    {
        $this->padecimiento =  Padecimiento::find($id);
        $this->sintomas =  Caracteristica::whereNotIn('id', function ($query) {
            $query->select('caracteristica_id')
                ->from('padecimientos_caracteristicas')
                ->where('padecimiento_id', $this->padecimiento->id);
        })->get();

        $this->dispatchBrowserEvent('openModal');
    }

    public function delete($id)
    {
        Padecimiento::find($id)->delete();
        $this->mesage_notification = "El padecimiento ha sido eliminado";
        $this->dispatchBrowserEvent('notification');
        $this->mount();
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function deleteSintoma($id)
    {

        Padecimientos_caracteristica::where('padecimiento_id', $this->padecimiento->id)
            ->where('caracteristica_id', $id)
            ->delete();
        $this->padecimiento =  Padecimiento::find($this->padecimiento->id);
        $this->sintomas =  Caracteristica::whereNotIn('id', function ($query) {
            $query->select('caracteristica_id')
                ->from('padecimientos_caracteristicas')
                ->where('padecimiento_id', $this->padecimiento->id);
        })->get();
        $this->mesage_notification = "El síntoma/signo ha sido eliminado";
        $this->dispatchBrowserEvent('notification');
        $this->mount();
        $this->confirmingSintoma = null;
    }

    public function confirmDeleteSintoma($id)
    {
        $this->confirmingSintoma = $id;
    }

    public function nextPage()
    {
        $this->nowPage++;
        $this->render();
    }

    public function afterPage()
    {
        $this->nowPage--;
        $this->render();
    }

        // ----------------------------------
    

        public function rules()
        {
            return [
                'sintoma' => 'required',
            ];
        }
    
        public function agregarSintoma()
        {
            $this->validate();
    
            Padecimientos_caracteristica::create([
                'padecimiento_id' => $this->padecimiento->id,
                'caracteristica_id' => $this->sintoma,
            ]);

        $this->mesage_notification = "El síntoma/signo ha sido agregado";
        $this->dispatchBrowserEvent('notification');
        $this->mount();
        $this->padecimiento =  Padecimiento::find($this->padecimiento->id);
        $this->sintomas =  Caracteristica::whereNotIn('id', function ($query) {
            $query->select('caracteristica_id')
                ->from('padecimientos_caracteristicas')
                ->where('padecimiento_id', $this->padecimiento->id);
        })->get();
        }
}
