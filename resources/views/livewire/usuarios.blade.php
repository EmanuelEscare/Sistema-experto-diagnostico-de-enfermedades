<div>
    {{-- Do your work, then step back. --}}
    <div class="rounded-4 p-4">
        <h3 class="">{{ __('Usuarios') }}</h3>

        <table class="table table-bordered table-hover table-striped mt-5">
            <thead class="border">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td class="dropdown text-center">
                            <button class="btn btn-lg btn-secondary dropdown-toggle text-capitalize" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __($user->getRoleNames()->first()) }}
                            </button>
                            <ul class="dropdown-menu text-center">
                                <li><a class="dropdown-item" wire:click="changeRole('{{$user->id}}','{{$user->getRoleNames()->first()}}', 'admin')">{{__("Administrador")}}</a></li>
                                <li><a class="dropdown-item" wire:click="changeRole('{{$user->id}}','{{$user->getRoleNames()->first()}}', 'doctor')">{{__("Doctor")}}</a></li>
                                <li><a class="dropdown-item" wire:click="changeRole('{{$user->id}}','{{$user->getRoleNames()->first()}}', 'recepcionista')">{{__("Recepcionista")}}</a></li>
                            </ul>
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
