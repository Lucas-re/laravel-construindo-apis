## Um endpoint, se tratando de API, é basicamente uma url; um ponto onde conseguimos acessar a nossa API 

## No projeto, em routes/web vamos criar uma rota nova.
## Quando retornamos em uma rota algum tipo de dado que não seja uma view ou uma string, o laravel vai tentar converter isso da melhor forma
## e responder da melhor forma. Ele vai retornar em um formato JSON 

```
Route::get('/api/series', function(){
    return ['suits'];
});

```

## Se for retornado alguma model ou collection do eloquent, o proprio laravel ja sabe como devolver isso também

```
Route::get('/api/series', function(){
    return Serie::all();
});

```

## Porém, não é comum que tenhamos em uma aplicação, fullstack, uma parte com visualização e também uma API. 
## Normalmente temos um API ou uma aplicação Fullstack, mas é normal ter os dois 

## Um outro detalhe é que não é interessante termos as definições das rotas de api junto das definições de rotas do sistema Fullstack

## No arquivo app/Http/Kernel temos alguns middlewares que são adicionados por padrão em todas as rotas que temos no arquivo web.php
## como por exemplo cookies, sessão e isso não é comum ser utilizado quando estamos trabalhando com API 

## Dentro de routes, temos um arquivo especifico para definir rotas de api, que é, api.php
## Toda rota que for definida dentro desse arquivo de api, ela ja possui prefixo api 

```
Route::get('/series', function(){
    return Serie::all();
});

```