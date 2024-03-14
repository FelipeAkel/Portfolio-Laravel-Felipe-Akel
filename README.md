<p align="center"><img src="public/readme/desktop-mobile.png" width="400"></p>

## Sobre o Portfolio Felipe Akel em Laravel

> [!ATENÇÃO]
> Sistema em fase de Desenvolvimento

O portifólio Felipe Akel trata-se de um website para apresentar as informações do desenvolvedor. 

Destaca-se, que o sistema é composto de 2 layouts distintos responsáveis por montar o front-end dos ambientes. Primeiro, trata-se de área dos internautas de livre acesso. Segundo, trata-se da área administrativa do portfólio o qual possibilita o gerenciamento das informações do website. Com isso, o projeto desenvolvido em Laravel ganha autonomia para ações de CRUD. 

### Área dos Internautas
- Resumo [IMG](public/readme/resumo.png)
- Em breve todas as telas...

### Área Administrativa
- Sobre Mim [IMG](public/readme/sobre-mim.png)
- Dashboard [IMG](public/readme/cadastro-portfolio.png)
- Em breve todas as telas...

## Tecnologias utilizadas

<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="200"></p>

### Laravel
- **[Laravel Versão 8.x](https://laravel.com/docs/8.x)**

### Sistema de Gerenciameto de Bando de Dados - SGBD
O Banco de Dados utilizado foi o [MySQL Workbench](https://www.mysql.com/products/workbench/). O Sistema é composto de um Banco de Dados Relacional, a criação das tabelas foi utilizado as Migrations do Laravel, o atual modelo de dados pode ser acesso no link [Banco de Dados Relacional](public/readme/banco-relacional.png).

### Composer
Gerenciador de dependências do PHP. Necessário ter instalado para atualizações e inclusões de novos pacotes no sistema.
([Documentação](https://getcomposer.org/))

### Tema área do internauta: iKnow
[iKnow](https://themeforest.net/item/iknow-cv-resume-template/34225451) é o template utilizado na Área dos Internautas.

### Tema área administrativa: Bootstrap
[Bootstrap 5](https://getbootstrap.com/) é o template utilizado na Área Administrativa.


## Construção do Ambiente Local

Para configurar o ambiente local do Sistema, é essecial seguir o passa a passo abaixo:

    1. Faça o clone do projeto via git;
    2. Usando o cmd ou terminal, vá até a pasta do onde clonou o projeto;
    3. Execute 'composer install';
    4. Faça uma cópia do arquivo '.env.example' para '.env' na pasta do projeto. Pode-se usar para Windows: 'copy .env.example .env', ou, 'cp .env.example .env', para Ubuntu;
    5. Execute o comando 'php artisan key:generate';
    6. Abra o arquivo .env e altere, variável do valor contido em 'DB_DATABASE=laravel' para 'DB_DATABASE=bd_portfolio_felipe_akel';
    7. Abra o phpMyAdmin local ('http://localhost/phpmyadmin') ou SGBD de sua preferência;
    8. Crie um novo banco de dados com o nome 'bd_portfolio_felipe_akel';
    9. Execute o comando 'php artisan migrate' para criar as tabelas;
    10. Execute o comando 'php artisan db:seed' para carregar os dados as tabelas;
    11. Execute o comando 'php artisan serve' ou 'php artisan serve --port=9090';
    12. Acesse em seu navegador o endereço criado, ou ('http://127.0.0.1:9090/'), ou na porta em que sua máquina estiver configurada.
    13. Para logar na área administrativa clique no botão 'login' localizado no canto direito inferior da tela. Os dados de acesso são login 'felipe.florentino' senha '0123456789'. 


## Vulnerabilidades de segurança

Se você descobrir uma vulnerabilidade de segurança do sistema, envie uma mensagem para Felipe Akel via [Linkedin](https://www.linkedin.com/in/felipe-akel-carvalho-florentino-009412135/). Todas as vulnerabilidades de segurança serão verificadas. Obrigado!


## Licença

Este Portfólio desenvolvido em Laravel utiliza a licença MIT.