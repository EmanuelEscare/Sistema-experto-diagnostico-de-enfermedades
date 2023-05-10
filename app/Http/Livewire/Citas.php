<?php

namespace App\Http\Livewire;

use App\Models\Cita;
use Livewire\Component;

class Citas extends Component
{
    public $mesage_notification,$confirming,$query;
    public $citasData;
    public $nowPage = 1;
    public $pages = 10;

    public function render()
    {
        $citas = $this->citasData->slice(($this->nowPage - 1) * $this->pages)->take($this->pages);
        return view('livewire.citas', ['citas' => $citas]);
    }

    public function mount()
    {
        $this->citasData = Cita::get();
    }

    public function delete($id)
    {
        Cita::find($id)->delete();
        $this->mesage_notification = "La cita ha sido eliminada";
        $this->dispatchBrowserEvent('notification');
        $this->mount();
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
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

    public function search()
    {
        $this->citasData = Cita::whereHas('paciente', function ($query) {
            $query->where('nombre', 'like', '%' . $this->query .'%');
        })->get();
    }

}
