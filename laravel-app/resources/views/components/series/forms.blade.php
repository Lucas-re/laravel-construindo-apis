<form action="{{$action}}" method="post">
    @csrf

    @if($update)
    @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label" for="nome">Nome:</label>
        <input class="form-control" type="text" name="nome" id="nome" @isset($nome)value="{{$nome}}"@endisset>
    </div>
    <button class="btn btn-primary" type="submit">{{ $acao }}</button>
    <a class="btn btn-secondary" href="{{route('series.index')}}">Voltar</a>
</form>