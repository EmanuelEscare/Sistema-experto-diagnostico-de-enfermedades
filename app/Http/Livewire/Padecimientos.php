<?php

namespace App\Http\Livewire;

use App\Models\Padecimiento;
use Livewire\Component;

class Padecimientos extends Component
{
    public $padecimientosData;
    public $nowPage = 1;
    public $pages = 10;

    public function render()
    {
        $padecimientos = $this->padecimientosData->slice(($this->nowPage - 1) * $this->pages)->take($this->pages);
        return view('livewire.padecimientos', ['padecimientos' => $padecimientos]);
    }


    public function mount()
    {

        $this->padecimientosData = Padecimiento::get();
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
