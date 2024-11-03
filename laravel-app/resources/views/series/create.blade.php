<x-layout title="Nova Série">

    <form action="{{route('series.store')}}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label class="form-label" for="nome">Nome:</label>
                <input autofocus class="form-control" type="text" name="nome" id="nome" value="{{old('nome')}}">
            </div>
            <div class="col-2">
                <label class="form-label" for="seasonQty">Nº Temporadas:</label>
                <input class="form-control" type="text" name="seasonQty" id="seasonQty" value="{{old('seasonQty')}}">
            </div>
            <div class="col-2">
                <label class="form-label" for="episodesPerSeason">EPs / Temporada:</label>
                <input class="form-control" type="text" name="episodesPerSeason" id="episodesPerSeason" value="{{old('episodesPerSeason')}}">
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Salvar</button>
        <a class="btn btn-secondary" href="{{route('series.index')}}">Voltar</a>
    </form>
</x-layout>