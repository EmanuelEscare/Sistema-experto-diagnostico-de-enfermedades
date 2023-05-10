<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="p-3">
        @php
            $date = new DateTime();
        @endphp
        <br>
        <h3>Cita #{{ $cita->id }}</h3>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-4 mb-2">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input disabled value="{{ $cita->paciente->nombre }} {{ $cita->paciente->apellidos }}" type="text"
                        class="form-control">
                </div>
            </div>
            <div class="col-lg-4 mb-2">
                @php
                    $birth = new DateTime($cita->paciente->fecha_nacimiento);
                @endphp
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Edad</label>
                    <input disabled value="{{ $date->diff($birth)->y }} años" type="text" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 mb-2">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Sexo</label>
                    <input disabled value="{{ $cita->paciente->sexo }}" type="text" class="form-control">
                </div>
            </div>
        </div>
        <br>
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
        <div class="rounded bg-primary p-4 text-white">
            <h4 class="text-center">Diagnóstico</h4>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-8">
                    <select wire:model="padecimiento" @disabled($cita->diagnostico)
                        class="form-select form-select-lg mb-3">
                        <option selected>
                            @if ($cita->diagnostico)
                                {{ $cita->diagnostico->padecimiento->nombre }}
                            @else
                                Selecciona la enfermedad
                            @endif
                        </option>
                        @foreach ($padecimientos as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <div class="d-grid gap-2">
                        <button @disabled($cita->diagnostico) wire:click="diagnosticar" class="btn btn-lg btn-success">
                            Diagnosticar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        @if (($cita->diagnostico))
        <div class="rounded bg-secondary p-4">
            <h4 class="text-center text-white">Recetar</h4>
            <br>
            <br>
            <div class="form-floating">
                @if (!$cita->diagnostico->receta)
                    <textarea wire:model="indicaciones" class="form-control" style="height: 100px">
                    </textarea>
                @elseif($cita->diagnostico)
                    <div class="bg-white text-black rounded p-4">
                        {{ $cita->diagnostico->receta->indicaciones }}
                    </div>
                @endif
            </div>
            <br>
            <div class="d-grid gap-2">
                <button wire:click="recetar" @disabled($cita->diagnostico->receta)
                    class="btn btn-lg btn-light">
                    Diagnosticar
                </button>
            </div>
        </div>
<br>
<br>
        @if ($cita->diagnostico->receta)
        <div class="d-grid gap-2">
            <button wire:click="recetar"
                class="btn btn-lg btn-warning">
                
                <h2>
                    Imprimir receta
                <br><i class="fa-solid fa-download"></i></h2>
            </button>
        </div>
        @endif
        @endif

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
</div>
