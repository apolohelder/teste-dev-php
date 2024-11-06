
## Introdução

Este projeto foi desenvolvido utilizando o Laravel na versão 11. O objetivo é criar um sistema para gerenciar fornecedores e produtos, com autenticação de usuários.

Foi utilizado [composer](https://getcomposer.org/) para iniciar o desenvolvimento. O Composer é uma ferramenta de gerenciamento de dependências para PHP.


Execute utilizado:

```bash
composer create-project laravel/laravel nome-do-projeto
```
## Estrutura do Projeto

O projeto inclui as seguintes funcionalidades:

 - **Autenticação de usuários:** Implementação de um sistema de autenticação para usuários, onde é possível criar usuários e definir se têm acesso master ou não.

 - **Cadastro de fornecedores:** Função para cadastrar fornecedores e seus produtos associados, disponível tanto na interface web quanto pela API.

## Configuração do Banco de Dados

Após configurar o banco de dados em seu arquivo .env, execute os seguintes comandos para criar as tabelas necessárias e popular o banco de dados:

```bash
php artisan migrate
php artisan db:seed
```
Ou, se preferir, você pode executar:

```bash
php artisan migrate --seed
```
Executar o **seed** no Laravel é importante para popular o banco de dados com dados iniciais ou de teste, permitindo que você verifique o funcionamento da aplicação com registros predefinidos sem precisar inserir manualmente.

## Primeiro Usuário

O sistema é inicializado com um usuário padrão. Os detalhes do primeiro usuário são:

Pode acessar usando nome ou e-mail

- **Nome:** admin
- **Email:** admin@gmail.com
- **Senha:** 123456789