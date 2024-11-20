## Vamos criar um filtro para que o usuario da api possa filtrar qual serie ele quer buscar

## No metodo index do controller da api acrescentamos a validação para verificar se o nome esta sendo passado para a rota
## caso o nome de alguma serie esteja sendo passado, o retorno será o filtro da consulta pelo nome passado
## caso não seja passado nenhum nome para a rota, ele ira retornar todas as series cadastradas

```
if(!$request->has('nome')){
    return Serie::all();
}
return Serie::whereNome($request->nome)->get();

```