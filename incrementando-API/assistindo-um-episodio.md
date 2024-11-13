## Os verbos Put e Patch tem funcionalidades semelhantes, mas não são identicos.

## O verbo Put deve ser usado para representar um recurso como um todo inclusive sua identificação, por isso devemos passar a sua identificação na URL.
## Caso tudo que estamos transferindo ja exista essa nova representação, ou seja, o que foi enviado, irá substituir o nosso recurso no banco de dados. Agora caso ele não exista ainda ele pode ser criado.
## O Put pode se comportar como Post.

## Um erro ao se implementar o Put é, caso seja necessario atualizar somente um dado de um recurso, e é enviado somente um dado.
## Se o metodo Put for realmente implementado, o que vai acontecer é que o recurso que foi alterado só vai ter o dado que foi atualizado, porque foi enviado uma nova representação dele somente com um dado

## Para que seja alterado somente um dado de um recurso, de maneira correta, temos que utilizar o verbo Patch

## Agora vamos criar um Patch para episodes e ele só vai ter o watched atualizado