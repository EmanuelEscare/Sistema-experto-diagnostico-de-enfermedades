<div>
    {{-- Do your work, then step back. --}}
    <div class="rounded-4 p-4">
        <h3 class="">Citas</h3>
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

            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped mt-5">
                <thead class="border">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Paciente</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Acción</th>

                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($citas as $cita)
                        <tr>
                            <th scope="row">{{ $cita->id }}</th>
                            <td class="text-center">
                                {{ $cita->paciente->nombre }}
                            </td>
                            <td class="text-center">
                                {{ $cita->user->name }}
                            </td>
                            <td class="text-center">
                                {{ $cita->fecha }}
                            </td>
                            <td class="text-center">
                                {{ $cita->status }}
                            </td>


                            <td class="text-center">
                                @if ($cita->status == 'pendiente')
                                <a href="{{route('diagnosticar', ['id' => $cita->id])}}"
                                    class="btn btn-lg btn-primary">Diagnosticar
                                    <i class="fa-solid fa-notes-medical"></i></a>
                                @endif
                                
                                @if ($confirming === $cita->id)
                                    <button type="button" wire:click="delete({{ $cita->id }})"
                                        class="btn btn-lg btn-danger fa-fade">¿Seguro?</button>
                                @else
                                    <button type="button" wire:click="confirmDelete({{ $cita->id }})"
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
