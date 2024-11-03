<x-layout title="Excluir Serie">

    <form action="/series/excluir" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="nome">Nome:</label>
            <input class="form-control" type="text" name="nome" id="nome">
        </div>
        <button class="btn btn-primary" type="submit">Adicionar</button>
        <a class="btn btn-secondary" href="/series/">Voltar</a>
    </form>

</x-layout>