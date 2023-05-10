<?php

namespace App\Http\Livewire;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Pacientes extends Component
{
    public $pacientesData;
    public $nowPage = 1;
    public $pages = 10;
    public $query, $confirming;
    public $mesage_notification;

    public $paciente, $fecha, $medico, $medicos;

    public function rules()
    {
        return [
            'paciente.nombre' => 'required',
            'paciente.apellidos' => 'required',
            'paciente.email' => 'required|email',
            'paciente.fecha_nacimiento' => 'required',
            'paciente.telefono' => 'required|int',
            'paciente.sexo' => 'required',
        ];
    }

    protected $messages = [
        'paciente.nombre' => 'El campo nombre esta incorrecto',
        'paciente.apellidos' => 'El campo apellidos esta incorrecto',
        'paciente.email' => 'El campo email esta incorrecto',
        'paciente.fecha_nacimiento' => 'El campo fecha de nacimiento esta incorrecto',
        'paciente.telefono' => 'El campo teléfono esta incorrecto',
        'paciente.sexo' => 'El campo sexo esta incorrecto',
    ];

    public function render()
    {
        $pacientes = $this->pacientesData->slice(($this->nowPage - 1) * $this->pages)->take($this->pages);
        return view('livewire.pacientes', ['pacientes' => $pacientes]);
    }

    public function mount()
    {

        $this->pacientesData = Paciente::get();

        $role = Role::where('name', 'doctor')->first();
        $this->medicos = $role->users;
    }

    public function formNewPaciente()
    {
        $this->dispatchBrowserEvent('openModal');
    }

    public function saveNewPaciente()
    {
        $this->validate();
        DB::beginTransaction();

        try {
            $paciente = new Paciente;
            $paciente->nombre = $this->paciente['nombre'];
            $paciente->apellidos = $this->paciente['apellidos'];
            $paciente->fecha_nacimiento = $this->paciente['fecha_nacimiento'];
            $paciente->email = $this->paciente['email'];
            $paciente->sexo = $this->paciente['sexo'];
            $paciente->telefono = $this->paciente['telefono'];

            $paciente->save();

            DB::commit();

            $this->mesage_notification = "El paciente ha sido registrado";
            $this->dispatchBrowserEvent('notification');
            $this->dispatchBrowserEvent('closeModal');
            $this->clean();
            $this->mount();
            return;
        } catch (\Exception $e) {
            DB::rollback();

            $this->mesage_notification = "Error: " . $e;
            $this->dispatchBrowserEvent('notification');
            $this->dispatchBrowserEvent('closeModal');
            return;
        }
    }


    public function editNewPaciente($id)
    {
        $this->paciente = Paciente::find($id);

        $this->dispatchBrowserEvent('openModalUpdate');
    }

    public function updatePaciente()
    {
        $this->validate();
        DB::beginTransaction();

        try {
            $paciente = Paciente::find($this->paciente->id);
            $paciente->nombre = $this->paciente['nombre'];
            $paciente->apellidos = $this->paciente['apellidos'];
            $paciente->fecha_nacimiento = $this->paciente['fecha_nacimiento'];
            $paciente->email = $this->paciente['email'];
            $paciente->sexo = $this->paciente['sexo'];
            $paciente->telefono = $this->paciente['telefono'];

            $paciente->save();

            DB::commit();

            $this->mesage_notification = "El paciente ha sido editado";
            $this->dispatchBrowserEvent('notification');
            $this->dispatchBrowserEvent('closeModalUpdate');
            $this->clean();
            $this->mount();
            return;
        } catch (\Exception $e) {
            DB::rollback();

            $this->mesage_notification = "Error: " . $e;
            $this->dispatchBrowserEvent('notification');
            $this->dispatchBrowserEvent('closeModalUpdate');
            return;
        }
    }

    public function delete($id)
    {
        Paciente::find($id)->delete();
        $this->mesage_notification = "El usuario ha sido eliminado";
        $this->dispatchBrowserEvent('notification');
        $this->mount();
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function search()
    {
        $this->pacientesData = Paciente::where('nombre', 'like', '%' . $this->query . '%')
            ->orWhere('email', 'like', '%' . $this->query . '%')
            ->orWhere('telefono', 'like', '%' . $this->query . '%')
            ->get()->take($this->pages);
    }

    public function citaOpen($id)
    {
        $this->paciente = Paciente::find($id);

        $this->dispatchBrowserEvent('openModalCita');
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

    public function clean()
    {
        $this->paciente = null;
    }


    public function generarCita()
    {

        $this->validate([
            'fecha' => 'required',
            'medico' => 'required',
        ]);

        try {
            $cita = new Cita;

            $cita->paciente_id = $this->paciente->id;
            $cita->user_id = $this->medico;
            $cita->fecha = $this->fecha;

            $cita->save();

            DB::commit();

            $this->mesage_notification = "La cita ha sido creada";
            $this->dispatchBrowserEvent('notification');
            $this->dispatchBrowserEvent('closeModalCita');
            $this->clean();
            $this->mount();
            return;
        } catch (\Exception $e) {
            DB::rollback();

            $this->mesage_notification = "Error: " . $e;
            $this->dispatchBrowserEvent('notification');
            $this->dispatchBrowserEvent('closeModalCita');
            return;
        }
    }
}
