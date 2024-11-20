## Existem dois conceitos de segurança muito importantes quando estamos falando de login: Autenticação e Autorização

## Autenticação é para identificar um usuario. Autorização é para permitir que um usuario conhecido ou não faça alguma tarefa 
## Exemplo: só é permitido que removam series os usuarios administradores 

## Como ela poderia ser feita: a aprtir do usuario poderiamos ter um tipo, por exemplo, se o usuario é admin; se ele for administrador podemos adicionar uma habilidade a mais no token 

```
$user->admin;
$token = $user->createToken('token', ['series:delete']);

```
## passamos um array de habilidades nomeando as habilidades que o usuario pode ter. Podemos nomear as habilidades de qualquer forma, mas é uma boa pratica indicar o recurso que vai ser manipulado e depois a operação que pode ser executada

## Com isso, quando for fazer a remoção de serie, conseguimos pegar o usuario a partir do request, ou da model de User ou usando o Authenticatable 

## E com o usuario em mãos temos também os detalhes do token; com isso podemos verificar se o token do usuario pode fazer algo, por exemplo series:delete 

## Revogar token: em API's normalmente não implementamos rota de logout, não é tão comum porque o token fica no nosso cliente, então se o cliente quiser fazer logout ele simplesmente exclui o token.
## Mas sempre que ele fazer login podemos fazer logout desse usurio revogando qualquer outro token que ele tenha

```
$user->tokens()->delete(); 

```