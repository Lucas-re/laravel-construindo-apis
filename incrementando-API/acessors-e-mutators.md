## Aqui vamos resolver o caso onde o o dado watched do episodio esta sendo salvo como um inteiro quando deveria ser um boolean

## Vamos utilizar uma forma diferente de acessar o atributo. Podemos utilizar o que o laravel chama de acessor, ou seja, uma forma de acessar um atributo.
## Na model Episode vamos criar o acessor, que será a forma de acessar o atributo watched que nos retornara o atributo.
## Passamos dois possiveis parametros para o Attribute: um parametro para recuperar o dado, que é o que chamamos de acessor e outro parametro para definir este dado, que é o que chamamos de mutator.
## É como se fosse getters e setters (inclusive esses são os nomes dos parametros), mas se quiser definir somente um, é possivel.

```
protected function watched(): Attribute
{
    protected function watched(): Attribute
    {
        return new Attribute(
            get: fn ($watched) => (bool) $watched,
            set: fn ($watched) => (bool) => $watched,
        );
    }
}

```

## Dessa forma temos o casting tanto na hora de salvar quanto na hora de recuperar o dado.

## Esse tipo de abordagem é interessante ser utilizado quanto temos alguma regra, por exemplo: se quisermos transformar todos os nomes das series em letras maiusculas.
## Como neste caso só precisamos de um cast podemos remover essa funcionalidade e informar na model a tributo cast que é um array associativo onde cada atributo é mapeado para algum tipo.

```
protected $cast = [
    'watched' => 'boolean'
];

```