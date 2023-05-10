<div>
    {{-- Do your work, then step back. --}}
    <div class="rounded-4 p-4">

        <div class="row">
            <div class="col-lg-7">
                <h3 class="">Padecimientos</h3>
            </div>
            <div class="col-lg-5">
                <div class="d-grid gap-2 d-md-block">
                    <button class="btn  btn-lg btn-primary" wire:click="downloadPrologFile">Descargar conocimiento</button>
                    <a class="btn btn-lg btn-dark" href="{{ asset('diagnosticar.pl') }}" download="">Descargar
                        prolog</a>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-hover table-striped mt-5">
            <thead class="border">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Síntomas</th>
                    <th scope="col">Acción</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($padecimientos as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>
                            {{ $item->nombre }}
                        </td>

                        <td class="text-center">
                            <button type="button" wire:click="sintomas({{ $item->id }})"
                                class="btn btn-lg btn-secondary">
                                Síntomas/Signo</button>
                        </td>

                        <td class="text-center">
                            @if ($confirming === $item->id)
                                <button type="button" wire:click="delete({{ $item->id }})"
                                    class="btn btn-lg btn-danger fa-fade">¿Seguro?</button>
                            @else
                                <button type="button" wire:click="confirmDelete({{ $item->id }})"
                                    class="btn btn-lg btn-danger">Eliminar <i class="fa-solid fa-trash"></i></button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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
            @if ($padecimiento)
                <div class="modal-content border-0 shadow">
                    <div class="modal-header">
                        <h3 class="">Síntomas/Signo de {{ $padecimiento->nombre }}</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-9 m-auto">

                            @foreach ($padecimiento->caracteristicas as $item)
                                <div class="input-group mb-3">
                                    <input value="{{ $item->nombre }} - {{ $item->tipo }}" disabled type="text"
                                        class="form-control" placeholder="">
                                    @if ($confirmingSintoma === $item->id)
                                        <button wire:click="deleteSintoma({{ $item->id }})"
                                            class="btn btn-lg btn-danger" type="button">¿Seguro?</button>
                                    @else
                                        <button wire:click="confirmDeleteSintoma({{ $item->id }})"
                                            class="btn btn-lg btn-danger">Eliminar <i
                                                class="fa-solid fa-trash"></i></button>
                                    @endif
                                </div>
                            @endforeach


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

                            <p>Síntomas/Signo</p>
                            <select wire:model="sintoma" class="form-select form-select-lg mb-3">
                                <option selected>......</option>

                                @foreach ($sintomas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endforeach

                            </select>

                            <br>
                            <div class="d-grid gap-2">
                                <button wire:click="agregarSintoma" class="btn btn-lg btn-primary">Agregar
                                    Síntomas/Signo</button>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            @endif
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
    </script>
</div>
