<x-layout title="Editar Série '{{$serie->nome}}'">
    <x-series.forms :action="route('series.update', $serie->id)" :nome="$serie->nome" :acao="$acao" :update="true"/>
</x-layout>