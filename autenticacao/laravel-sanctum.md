## Vamos implementar uma rota para fazer login na API 
## Para montar as credenciais vamos precisar de pelo menos o email e a senha do usuario

```
$credentials = $request->only(['email', 'password']);

```

## E para verificar a autenticidade das credenciais do usuario vamos utilizar o metodo attempt, caso a autenticidade do usuario seja falsa ele retorna um json com a mensagem de não autenticado; caso o contrario ele estancia o usuario   

```
if (Auth::attempt($credentials) === false) {
    return response()->json('Unauthorized', 401);
};

$user = Auth::user();

```

## Inicialmente ele vai salvar o usuario na sessão mas essa sessão vai ser ignorada, ou seja, estamos utilzando a facade que salva em sessão, mas não utilizamos essa sessão em outra requisição. 

## Agora vamos gerar um token para esse usuario para receber esse token e validar no middleware.

## O Sanctum é um pacote que permite a criação de API tokens para trabalharmos com autenticação, por padrão ele ja vem instalado no laravel, mas caso ele não esteja instalado é possivel instalar com o composer e importá-lo para a model de User

## Com isso, tendo o usuario instanciado, usamos o metodo createToken() para gerar o token do usuario.

```
$token = $user->createToken('token');

```

## Com o token gerado, podemos retornar ele como um texto puro

```
return response()->json($token->plainTextToken);

```

## Agora o que queremos fazer é exigir que esse token seja utilizado nas outras urls. Para isso vamos utilizar o middleware('auth:sanctum').
## Criamos o middleware agrupando as rotas, limitando o acesso de tosoa os recursos, ou seja, só conseguimos acessar qualquer coisa na API deposi de fazer o login porque o middleware do Sanctum ja pega o token do usuario (encontra o usuario a partir do token) e conseguimos acessar 