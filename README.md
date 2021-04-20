# CRUD Laravel

## Problema:

Tenho muitos livros e gostaria de catalogá-los.

## Solução:

Uma plataforma para adicionar e remover os livros que possuo.

## Observações:

Até o momento eu ainda não consegui adicionar as migrates, será necessário criar um banco de dados chamado larapp com as seguintes tabelas ao mysql (escolhi esse pela a facilidade do momento):

```
CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `autor` text NOT NULL,
  `status` text NOT NULL
) 
```

```
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
)
```