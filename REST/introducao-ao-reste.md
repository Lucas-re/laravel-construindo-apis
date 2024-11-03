## A primeira coisa que precisamos pensar é em recursos. Exemplo: se um usuario for inserir uma serie no banco de dados utilizando 
## essa pessoa vai trabalhar com um recurso chamado Serie. Então vamos precisar separar na aplicação alguns recursos 
## em nosso caso temos o /series e se quisermos acessar uma serie especifica passamos o id dela para este recurso /series/:id

## Os verbos HTTP em si fornece tudo que é necessário para conseguirmos demostrar a nossa intenção ao manipular um recurso
## Se fazemos uma requisição para /series utilizando o verbo GET, a intenção é buscar series 

## Mas, além disso, precisamos informar qual o formato vamos utilizar para enviar um dado e para receber um dado; e para isso utilizamos os 
## cabeçalhos 

## Respondemos para o cliente da api se as requisições deram certo ou não atraves dos códigos HTTP. 

## Além disso podemos ter conceitos mais avançados. como:
## HATEOAS - HyperMedia As The Engine Of Application State; Ele significa que temos hipermidia como motor de estado da nossa aplicação. Podemos enviar coisas alem de texto, por exemplo um link uma url para a pessoa fazer uma outra requisição.
## Stateless;
## Escalabilidade 
 
## REST - Representational State Transfer; ele quer dizer basicamente que quando criamos uma api utilizando o padrão REST significa que nós estamos transferindo estado de recurso 