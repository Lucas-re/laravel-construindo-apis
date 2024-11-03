<x-layout title="Temporadas de '{!! $serie->nome !!}'">
    <a class="btn btn-secondary mb-2" href="{{route('series.index')}}">Voltar</a>
    <ul class="list-group">
        @foreach ($aSeasons as $season)
        <li class="list-group-item d-flex justify-content-between align-item-center">
               Temporada {{$season->number}}
            </a>

            <span class="badge bg-secondary">
                {{ $season->episodes->count() }}
            </span>
        </li>
        @endforeach
    </ul>
    
</x-layout>