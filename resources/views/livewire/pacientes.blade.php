<div>
    {{-- Do your work, then step back. --}}
    <div class="rounded-4 p-4">
        <h3 class="">Pacientes</h3>

        <table class="table table-bordered table-hover table-striped mt-5">
            <thead class="border">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
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
                        <td>
                            {{ $paciente->nombre }}
                        </td>
                        <td>
                            {{ $paciente->apellidos }}
                        </td>
                        <td>
                            {{ $paciente->edad }}
                        </td>
                        <td>
                            {{ $paciente->email }}
                        </td>
                        <td>
                            {{ $paciente->telefono }}
                        </td>
                        <td>
                            {{ $paciente->sexo }}
                        </td>

                        <td class="text-center">
                            <button type="button" class="btn btn-lg btn-warning"><i
                                    class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="btn btn-lg btn-danger">
                                <i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="btn-group mt-3 border" role="group" aria-label="Basic example">
            <button type="button" wire:click="afterPage" class="btn border-end"><i class="fa-solid fa-arrow-left"></i></button>
            <button type="button" wire:click="nextPage" class="btn border-start"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>
</div>