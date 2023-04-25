<div>
    {{-- The Master doesn't talk, he acts. --}}
    @foreach ($preguntas as $pregunta)
       <h4> {{ $pregunta['pregunta'] }}</h4>
        <br>
        <button wire:click="respuestas({{$pregunta['caracteristica_id']}}, 0)" {{$pregunta['contestada'] ? 'disabled' : ''}} class="btn btn-primary">
            No
        </button>
        <button wire:click="respuestas({{$pregunta['caracteristica_id']}}, 2)" {{$pregunta['contestada'] ? 'disabled' : ''}} class="btn btn-primary">
            No se
        </button>
        <button wire:click="respuestas({{$pregunta['caracteristica_id']}}, 1)" {{$pregunta['contestada'] ? 'disabled' : ''}} class="btn btn-primary">
            Si
        </button>
        <br>
        <hr>
        <br>
    @endforeach

</div>
