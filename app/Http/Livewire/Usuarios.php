<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Usuarios extends Component
{
    public $usersData;
    public $nowPage = 1;
    public $pages = 10;

    public function render()
    {
        $users = $this->usersData->slice(($this->nowPage - 1) * $this->pages)->take($this->pages);
        return view('livewire.usuarios', ['users' => $users]);
    }


    public function mount()
    {

        $this->usersData = User::get();
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

    public function changeRole($userId, $role, $newRole){
        
        $user = User::find($userId);

        $user->removeRole($role);
        $user->assignRole($newRole);

        $user->save();
}
}