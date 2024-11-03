## Vamos criar uma rota que recebe uma requisição do tipo post para inserir uma serie

## Lembra que utilizamos o metodo resource que já cria varias rotas no mesmo controller, existe também o metodo API resource e a diferença é que ele não vai criar, por exemplo, a rota que exibe um formulario, a de create, a de visualizar as informações para editar um recurso

## Em routes/apip.php criamos a seguinte rota:

```
Route::apiResource('/series', ApiController::class);

``` 

## Agora vamos criar o metodo store no controller; nele vmaos precisar receber uma requisição, adicionamos o SeriesFormRequest por ele ja ter as validações que é necessário receber um nome e este nome deve possuir no minimo 2 caracteres

## Após salvar a serie não iremos redirecionar o usuario para algum lugar; o que vamos fazer é informar para o usuario que foi criado. Vamos retornar a resposta do tipo json, e caso queremos ser mais explicitos podemos usar a seguinte técnica:

```
return response()
    ->json(Serie::create($request->all()), 201);

```