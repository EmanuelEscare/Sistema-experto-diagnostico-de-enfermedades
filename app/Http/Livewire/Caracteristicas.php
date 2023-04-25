<?php

namespace App\Http\Livewire;

use App\Models\Caracteristica;
use Livewire\Component;

class Caracteristicas extends Component
{

    public $caracteristicasData;
    public $nowPage = 1;
    public $pages = 10;

    public function render()
    {
        $caracteristicas = $this->caracteristicasData->slice(($this->nowPage - 1) * $this->pages)->take($this->pages);
        return view('livewire.caracteristicas', ['caracteristicas' => $caracteristicas]);
    }


    public function mount()
    {

        $this->caracteristicasData = Caracteristica::get();
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
