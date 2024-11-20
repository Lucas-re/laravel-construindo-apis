## Vimos que essa ideia do laravel de adicionar links na resposta é muito interessante. Podemos usar dessa mesma ideia dentro do data, ou seja, quando estivermos retornando um dado de uma serie, podemos adicionar links e esses links vão ter a url para acessar, por exemplo, as temporadas dessa serie, os episodio desse serie.

## Poderiamos fazer isso de diversas formas, e tem uma recomendação d propria documentação que é de utilizar um acessor 

## Então dentro da models de Serie vamos criar o acessor

```
    public function links(): Attribute
    {
        return new Attribute(
            get: fn () => [
                [
                    'rel' => 'self',
                    'url' => "/api/series/{$this->id}/seasons"
                ],
                [
                    'rel' => 'seasons',
                    'url' => "/api/series/{$this->id}/seasons"
                ],
                [
                    'rel' => 'episodes',
                    'url' => "/api/series/{$this->id}/episodes"
                ],
            ],
        );
    }

```

## Porém não tem como o laravel saber na hora que vai exportar, que ele precisa chamar esse metodo, porque um acessor é utilizado quando acessamos o atributo dele

## Para informar ao laravel que ele adicionar esse atributo quando serializar o json, adicionamos um propriedade chamada appends na model de serie e passamos para ele um array do que será adicionado 

```
protected $appends = ['links'];

```

## HATEOAS - hipermidia como um motor do estado da aplicação: é a ideia de usar coisas alem de textos, como por exemplo um link, como motor de navegação para a API como uma forma de entregar uma documentação viva. 