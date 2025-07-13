<p align="center"><img src="public/readme/desktop-mobile-2.png" width="400"></p>

## :rocket: Sobre o Portfolio Felipe Akel em Laravel

O Portifólio Felipe Akel trata-se de um website desenvolvido em PHP Laravel com o objetivo de apresentar as informações do desenvolvedor, Felipe Akel. 

Destaca-se, que o sistema é composto de 2 layouts distintos responsáveis por montar o front-end dos ambientes. Primeiro, trata-se de área dos internautas de livre acesso. Segundo, trata-se da área administrativa do portfólio o qual possibilita o gerenciamento das informações do website. Com isso, o projeto desenvolvido em Laravel ganha autonomia para ações de _CRUD - Create, Read, Update, Delete_. 

### :small_blue_diamond: Área dos Internautas
- [Sobre Mim](public/readme/sobre-mim.png)
- [Porfólio](public/readme/portfolio.png)
- [Contato](public/readme/contato.png)
- ...

### :small_blue_diamond: Área Administrativa
- [Dashboard](public/readme/ad-dashboard.png)
- [Sobre Mim](public/readme/ad-sobre-mim.png)
- [Pesquisando: Portfólio](public/readme/ad-portfolio.png)
- [Cadastro: Portfólio](public/readme/ad-create-portfolio.png)
- ...

### :small_blue_diamond: Modelo de Dados Relacional
- [Banco de Dados Relacional](public/readme/banco-relacional.png)

## :computer: Tecnologias utilizadas

### :small_blue_diamond: Laravel
[PHP Versão 7.x](https://www.php.net/)

### :small_blue_diamond: Laravel
[Laravel Versão 8.x](https://laravel.com/docs/8.x)

### :small_blue_diamond: Sistema de Gerenciameto de Bando de Dados - SGBD
O Banco de Dados utilizado foi o [MySQL Workbench](https://www.mysql.com/products/workbench/). 
O Sistema utilizar um **Banco de Dados Relacional** e para criação das tabelas foi utilizado as **Migrations do Laravel** além das **Seeders** para inserir dados nas tabelas.

### :small_blue_diamond: Composer
Gerenciador de dependências do PHP. Necessário ter instalado para atualizações e inclusões de novos pacotes no sistema.
([Documentação](https://getcomposer.org/))

### :small_blue_diamond: Tema área do internauta: iKnow
[iKnow](https://themeforest.net/item/iknow-cv-resume-template/34225451) é o template utilizado na Área dos Internautas.

### :small_blue_diamond: Tema área administrativa: Bootstrap
[Bootstrap 5](https://getbootstrap.com/) é o template utilizado na Área Administrativa.


## :white_check_mark: Construção do Ambiente Local

Primeiramente, é essencial clonar o repositório para sua máquina e abrir o terminal, prompt de comando, no diretório na pasta do projeto. Com isso, podemos seguir o passo a passo a seguir:

> [!IMPORTANT]
> Para logar na área administrativa clique no link ```Login``` localizado no canto direito inferior da tela ou (```http://127.0.0.1:8000/login```).

**Login**: ```felipe.florentino``` e **senha**: ```0123456789```

### :one: Configurando o Ambiente

1. No terminal execute ```composer install```;
2. Faça uma cópia do arquivo ```.env.example``` para ```.env``` na pasta do projeto.
3. SGBD utilizado ```MySQL```: Crie um banco de dados chamado ```bd_portfolio_felipe_akel```;
    - Por exemplo, pode-se utilizar o Xampp para acessar o phpMyAdmin (```http://localhost/phpmyadmin```) e criar a database;
4. No terminal execute ```php artisan key:generate```;
5. No terminal execute ```php artisan migrate``` para criar as tabelas;
6. No terminal execute ```php artisan db:seed``` para carregar os dados nas tabelas;
7. No terminal execute ```php artisan storage:link``` para gerar um link simbólico na pasta ```public```;
8. No terminal execute ```php artisan serve``` ou ```php artisan serve --port=8080```;
9. Pronto! Você deve conseguir acessar o endereço criado (```http://127.0.0.1:8000```) ou na porta configurada.

### :two: Configurando o Envio de E-mails (Opcional)

Para configurar o envio de e-mail do sistema, foi utilizado o passo a passo abaixo:

1. Necessário ter uma conta Gmail com autenticação de 2 fatores ativas.
2. Acesse as configurações de sua conta:
    - Busque por "Senhas de app", geralmente está dentro de "Verificação em duas etapas", crie um registro com o nome Portfólio Felipe Akel, por exemplo. Copie/salve a senha gerada.
3. Abra o arquivo .env e altere o valor contido na variável:
    - ```EMAIL_CONFIGURADO=true```, atualize para este dado;
    - ```MAIL_HOST=smtp.gmail.com```, atualize para este dado;
    - ```MAIL_PORT=587```, altere para esta porta;
    - ```MAIL_USERNAME=SEU_EMAIL@gmail.com```, coloque o e-mail responsável por enviar as mensagens aos usuários.
    - ```MAIL_PASSWORD=SENHA_GERADA_GMAIL```, coloque a senha gerada do Gmail, não coloque espaços.
    - ```MAIL_ENCRYPTION=tls```, atualize para este dado;
    

## :unlock: Vulnerabilidades de segurança

Se você descobrir uma vulnerabilidade de segurança do sistema, envie uma mensagem para Felipe Akel via [Linkedin](https://www.linkedin.com/in/felipe-akel-carvalho-florentino-009412135/). Todas as vulnerabilidades de segurança serão verificadas. Obrigado!


## :page_facing_up: Licença

Este Portfólio desenvolvido em Laravel e utiliza a licença MIT.