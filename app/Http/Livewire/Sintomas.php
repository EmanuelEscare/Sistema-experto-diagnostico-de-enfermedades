<?php

namespace App\Http\Livewire;

use App\Models\Sintoma;
use Livewire\Component;

class Sintomas extends Component
{
    public $sintomasData;
    public $nowPage = 1;
    public $pages = 10;

    public function render()
    {
        $sintomas = $this->sintomasData->slice(($this->nowPage - 1) * $this->pages)->take($this->pages);
        return view('livewire.sintomas', ['sintomas' => $sintomas]);
    }


    public function mount()
    {

        $this->sintomasData = Sintoma::get();
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
