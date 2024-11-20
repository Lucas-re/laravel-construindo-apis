## Aqui agora vamos implementar a paginação
## A paginação é relativamente complexo de se implementar porque precisamos conhecer o total de elementos que temos e ir paginando em cima deles ou precisamos definir um limite.
## Exemplo: vamos dizer que vamos ter 5 itens em cada pagina, então vamos montar uma query para pegar todas as series colocando um limit 

## Porém, para fazer uma paginação com laravel vamos alterar a consulta adicionando o metodo paginate. E podemos passar por parametro algumas informações, sendo elas: quais colunas vamos buscar dessa query e etc..
## Mas o principal é o primeiro parametro que é quantos elementos vamos ter por pagina

## Agora na resposta é exibido um array de series dentro do item data. Além disso o laravel adiciona qual é a pegina atual, o link para cada pagina, o numero da paginas e etc...