## Agora vamos implementar a busca de todas as temporadas de determinada serie 
## Criamos a rota para buscar as temporadas no arquivo api.php em routes

```
Route::get('/series/{series}/seasons', function(Serie $serie){
    return $serie->seasons();
}); 

```

## Com isso conseguimos acessar um recurso baseado em outro recurso. Estamos buscando uma coleção de temporadas que são relacionadas com uma serie especifica e esse é o conceito de sub-recursos.
## Quando trabalhamos com API RESTFULL, que implementam o padrão rest, muitas das vezes temos subrecursos.
## Seguimos esse padrão na url sendo: o recurso pai com sua identificação e depois o subrecurso  */recurso_pai/id_recurso_pai/sub_recurso*

## Para acessarmos os episodios atraves da temporada de uma serie usamos o recurso hasManyThrough

```
public function episodes()
{
    return $this->hasManyThrough(Episode::class, Season::class);
}

```

## Na model Serie adicionamos o a função que busca todos episodios da serie através da temporada 