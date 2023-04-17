<?php

namespace App\Http\Livewire;

use App\Models\Paciente;
use Livewire\Component;

class Pacientes extends Component
{
    public $pacientesData;
    public $nowPage = 1;
    public $pages = 10;

    public function render()
    {
        $pacientes = $this->pacientesData->slice(($this->nowPage - 1) * $this->pages)->take($this->pages);
        return view('livewire.pacientes', ['pacientes' => $pacientes]);
    }


    public function mount()
    {

        $this->pacientesData = Paciente::get();
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

}
