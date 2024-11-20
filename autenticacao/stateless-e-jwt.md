## Agora com a api cirada, precisamos autenticar o usuario que ira usar a aplicação 

## Na aplicação fullstack fizemos isso utilizando sessões, coisa que o proprio laravel ja entrega isso implementado.

## Quando mandamos um formulario de login para o laravel, caso a credencial esteja correta, ele salva uma informação em sessão, ou seja, no servidor que esta rodando PHP, um arquivo vai ser armazenado e esse arquivo identifica aquele usuario.

## Para o usuario saber qual é a identificação dele o PHP envia um cookie pra ele. Então por isso o usuario não precisa saber disso tudo porque o navegador ja sabe gerenciar cookie e o servidor sabe gerenciar sessões. Só que essa abordagem tem alguns problemas. Exemplo:

## Em um cenario que a aplicação cresceu e ela esta recebendo muitos acessos muitas requisições, vamos precisar colocar ela em mais de um servidor e para isso usamos um load balancer( balanceador de carga ). Os usuarios vão acessar o balanceador de carga que vai mandando cada usuario para um servidor. Caso um usuario esteja sempre caindo em um servidor e esse servidor saia do ar, ele agora passará a cair em outro servidor e nesse esquema de sessões o usuario seria deslogado.

## Um outro ponto é a gestão de cookies, quando temos uma aplicação fullstack a gente sabe que isso vai ser utilizado dentro de um navegador e o navegador sabe lidar com cookies. Agora quando temos uma API, quem pode esta consumindo isso pode ser um terminal por linha de comando, um app web, ou seja, pode alguma coisa que não gerencia cookies muito bem.

## Um outro ponto é se seu cliente esta em um dominio e sua api esta em outro dominio e você precisa dessa sessão para um outro dominio... acaba que temos varios problemas porque cookies não funcionam bem em dominios diferentes. E quando estamos trabalhando com API's precisamos nos preocupar muito mais com isso porque não sabemos quem vai consumir nossos dados. 

## Por isso, a abordagem que costumamos utilizar em aplicações web é a altenticação por token. Como que acontece. O usuario vai mandar para alguma rota da API o usuario e senha, vamos validar, caso esse usuario exista e esteja tudo certo criamos, a partir desse usuario um token para este usuario e devolvemos para ele. O usuario vai armazenar esse token em qualquer lugar e isso não é tão complexo como cookie.

## Se estiver em um navegador web ele poded armazenar esse token em um cookie, se ele esta em um aplicativo ele pode guardar no sqlite do aplicativo, se ele esta em um terminal ele pode salvar em um arquivo.

## Com isso, para todas as urls que o usario for acessar, que não seja essa de login, ele manda esse token e esse token vai ser decodificado para descobrirmos qual é o usuario 

## Essa é a ideia de ter uma forma de login stateless, ou seja, sem estado, sem armazenar sessão e com isso conseguimos aplicar autenticação em uma api sem desvantagens 