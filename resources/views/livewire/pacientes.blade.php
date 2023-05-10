<div>
    {{-- Do your work, then step back. --}}
    <div class="rounded-4 p-4">
        <h3 class="">Pacientes</h3>
        @php
            $date = new DateTime();
        @endphp
        <br>
        <div class="row">
            <div class="col-lg-9">
                <div class="input-group mb-3">
                    <input class="form-control form-control-lg" wire:model="query" wire:keyup="search" type="text"
                        placeholder="">
                    <span class="input-group-text">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                </div>
            </div>
            <div class="col-lg-3">
                <button wire:click="formNewPaciente " class="btn btn-lg btn-success">
                    Registrar paciente
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped mt-5">
                <thead class="border">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Email</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Acción</th>

                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <th scope="row">{{ $paciente->id }}</th>
                            <td class="text-center">
                                {{ $paciente->nombre }}
                            </td>
                            <td class="text-center">
                                {{ $paciente->apellidos }}
                            </td>
                            <td class="text-center">
                                @php
                                    $birth = new DateTime($paciente->fecha_nacimiento);
                                @endphp
                                {{ $date->diff($birth)->y }}
                            </td>
                            <td class="text-center">
                                {{ $paciente->email }}
                            </td>
                            <td class="text-center">
                                {{ $paciente->telefono }}
                            </td>
                            <td class="text-center fs-5">
                                @if ($paciente->sexo != 'femenino')
                                    <i class="fa-solid fa-mars text-info"></i>
                                @else
                                    <i class="fa-solid fa-venus text-pink"></i>
                                @endif
                            </td>

                            <td class="text-center">
                                <button type="button" wire:click="citaOpen({{ $paciente->id }})"
                                    class="btn btn-lg btn-primary"> Cita
                                    <i class="fa-solid fa-plus"></i></button>

                                <button type="button" wire:click="editNewPaciente({{ $paciente->id }})"
                                    class="btn btn-lg btn-warning"> Editar <i
                                        class="fa-solid fa-pen-to-square"></i></button>

                                @if ($confirming === $paciente->id)
                                    <button type="button" wire:click="delete({{ $paciente->id }})"
                                        class="btn btn-lg btn-danger fa-fade">¿Seguro?</button>
                                @else
                                    <button type="button" wire:click="confirmDelete({{ $paciente->id }})"
                                        class="btn btn-lg btn-danger">Eliminar <i
                                            class="fa-solid fa-trash"></i></button>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="btn-group mt-3 border" role="group" aria-label="Basic example">
            <button type="button" wire:click="afterPage" class="btn border-end"><i
                    class="fa-solid fa-arrow-left"></i></button>
            <button type="button" wire:click="nextPage" class="btn border-start"><i
                    class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>



    {{-- Notification --}}
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="notification" class="toast align-items-center text-bg-success border-0" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ $mesage_notification }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="openModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content border-0 shadow">
                <form wire:submit.prevent="saveNewPaciente">
                    <div class="modal-header">
                        <h3 class="">Nuevo paciente</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-9 m-auto">
                            <p class="m-1">Nombre</p>
                            <input wire:model="paciente.nombre" class="form-control form-control-lg" type="text">
                            <br>
                            <p class="m-1">Apellidos</p>
                            <input wire:model="paciente.apellidos" class="form-control form-control-lg" type="text">
                            <br>
                            <p class="m-1">Fecha de nacimiento</p>
                            <input wire:model="paciente.fecha_nacimiento" class="form-control form-control-lg"
                                type="date">
                            <br>
                            <p class="m-1">Email</p>
                            <input wire:model="paciente.email" class="form-control form-control-lg" type="text">
                            <br>
                            <p class="m-1">Teléfono</p>
                            <input wire:model="paciente.telefono" class="form-control form-control-lg"
                                type="number">
                            <br>
                            <p class="m-1">Sexo</p>
                            <select wire:model="paciente.sexo" class="form-select form-select-lg mb-3"
                                aria-label=".form-select-lg example">
                                <option selected>.......</option>
                                <option value="femenino">Femenino</option>
                                <option value="masculino">Masculino</option>
                            </select>

                            @if ($errors->any())
                                <div class="my-3">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            <br>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-lg btn-primary">Registrar</button>
                            </div>
                            <br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal update -->
    <div class="modal fade" wire:ignore.self id="openModalUpdate" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content border-0 shadow">
                <form wire:submit.prevent="updatePaciente">
                    @if ($paciente)
                        <div class="modal-header">
                            <h3 class="">Editar usuario</h3>
                            <button wire:click="clean" type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-9 m-auto">
                                <p class="m-1">Nombre</p>
                                <input wire:model="paciente.nombre" class="form-control form-control-lg"
                                    type="text">
                                <br>
                                <p class="m-1">Apellidos</p>
                                <input wire:model="paciente.apellidos" class="form-control form-control-lg"
                                    type="text">
                                <br>
                                <p class="m-1">Fecha de nacimiento</p>
                                <input wire:model="paciente.fecha_nacimiento" class="form-control form-control-lg"
                                    type="date">
                                <br>
                                <p class="m-1">Email</p>
                                <input wire:model="paciente.email" class="form-control form-control-lg"
                                    type="text">
                                <br>
                                <p class="m-1">Teléfono</p>
                                <input wire:model="paciente.telefono" class="form-control form-control-lg"
                                    type="number">
                                <br>
                                <p class="m-1">Sexo</p>
                                <select wire:model="paciente.sexo" class="form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example">
                                    <option selected>.......</option>
                                    <option value="femenino">Femenino</option>
                                    <option value="masculino">Masculino</option>
                                </select>

                                @if ($errors->any())
                                    <div class="my-3">
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <br>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Registrar</button>
                                </div>
                                <br>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <!-- Modal cita -->
    <div class="modal fade" wire:ignore.self id="openModalCita" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content border-0 shadow">
                <form wire:submit.prevent="generarCita">
                    @if ($paciente)
                        <div class="modal-header">
                            <h3 class="">Generar cita</h3>
                            <button wire:click="clean" type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-9 m-auto">
                                <p class="m-1">Nombre</p>
                                <input disabled wire:model="paciente.nombre" class="form-control form-control-lg"
                                    type="text">
                                <br>
                                <p class="m-1">Apellidos</p>
                                <input disabled wire:model="paciente.apellidos" class="form-control form-control-lg"
                                    type="text">
                                <br>
                                <p class="m-1">Fecha de cita</p>
                                <input wire:model="fecha" class="form-control form-control-lg" type="datetime-local">
                                <br>
                                <p class="m-1">Medico</p>
                                <select wire:model="medico" class="form-select form-select-lg mb-3"
                                    aria-label=".form-select-lg example">
                                    <option selected>.......</option>
                                    @foreach ($medicos as $medico)
                                        <option value="{{$medico->id}}">{{$medico->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->any())
                                    <div class="my-3">
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <br>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Registrar</button>
                                </div>
                                <br>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('notification', event => {
            $("#notification").toast('show');
        })
    </script>

    <script>
        window.addEventListener('openModal', event => {
            $("#openModal").modal('show');
        })

        window.addEventListener('closeModal', event => {
            $("#openModal").modal('hide');
        })

        window.addEventListener('openModalUpdate', event => {
            $("#openModalUpdate").modal('show');
        })

        window.addEventListener('closeModalUpdate', event => {
            $("#openModalUpdate").modal('hide');
        })

        window.addEventListener('openModalCita', event => {
            $("#openModalCita").modal('show');
        })

        window.addEventListener('closeModalCita', event => {
            $("#openModalCita").modal('hide');
        })
    </script>
</div>
