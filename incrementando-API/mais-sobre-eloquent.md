## Vamos falar sobre como usar o HTTP da forma correta na hora da resposta

## Se tentarmos buscar uma serie que não existe vamos receber uma resposta em html e isso não é o que queremos.

## Isso acontece porque quando utilizamos a funcionalidade de receber a nossa model por paramentro o laravel faz um Serie::findOrFail(). Esse metodo tenta buscar a serie com um id e se não for encontrada ele lança uma exceção; essa exceção é capturada por algum exception handler 

## Neste caso o interessante é recebermos um int da serie por parametro e verificar se essa serie realmente existe 

```
$serieModel = Serie::with('seasons.episodes')->find($serie);

if($serieModel == null){
    return response()->json(['message' => 'Series not found'], 404);
}

return $serieModel;

```