## Caso queremos ver todas as rotas que estão definidas, quando estamos utilizando o API resource, é executando o comando 
## php artisan route:list
## ele vai mostrar todas as rotas inclusive as que o breeze registrou 

## Com isso vamos criar o metodo show para retornar uma serie especifica
## Buscamos todas as series que o id seja igual ao que foi passado por parametro e adicionamos o parametro para trazer também as temporadas e epeisodios 

```
$serie = Serie::whereId($serie)->with('seasons.episodes')->first();
        return $serie;

``` 