# 📦 Guia de Instalação: Portfólio Felipe Akel

Este guia detalha todos os passos necessários para instalar e configurar o sistema.

## 📋 Pré-requisitos

Antes de começar, certifique-se de ter instalado:

- **PHP 8.2 ou superior**
- **Composer** (gerenciador de dependências PHP)
- **[MySQL Workbench](https://www.mysql.com/products/workbench/)** ou **[PostgreSQL](https://www.postgresql.org/)**
- **Git** (opcional, para controle de versão)


### Verificando Requisitos

```bash
# Verificar versão do PHP
php -v

# Verificar extensões do PHP
php -m

# Verificar Composer
composer --version

# Verificar versão do MySQL ou PostgreSQL
mysql --version
psql --version
```

## 🚀 Instalação Passo a Passo

### 1. Clonar/Copiar o Projeto

Se você recebeu o projeto em um arquivo ZIP, extraia-o no diretório de seu desenvolvimento.

### 2. Instalar Dependências PHP

```php
# Instalar Dependências
composer install

# Se encontrar erros, tente soluciona-los ou execute:
composer install --ignore-platform-reqs
```

### 3. Configurar Variáveis de Ambiente

Copie o arquivo de exemplo:

```php
# Terminal: bash
copy .env.example .env

# Terminal: PowerShell
Copy-Item .env.example .env
```

### 4. Gerar Chave da Aplicação

```php
# Gerar Chave da Aplicação
php artisan key:generate

# Cria um link simbólico que conecta o diretório public
php artisan storage:link
```

### 5. Configurar Banco de Dados

#### 5.1. Criar o Banco de Dados no MySQL ou PostgreSQL

Crie o banco de dados **bd_gestao_musical** no [MySQL Workbench](https://www.mysql.com/products/workbench/) ou [PostgreSQL](https://www.postgresql.org/) em **pgAdmin** ou o terminal do PostgreSQL:

```php
# sql
CREATE DATABASE bd_gestao_musical;

# Terminal: Bash
psql -U postgres
CREATE DATABASE bd_gestao_musical;
\q
```

### 6 Configurar o arquivo .env

Abra o arquivo `.env` e configure as credenciais do banco e envio de email:

#### Banco de Dados

```php
DB_CONNECTION=mysql             # PostgreSQL: pgsql
DB_HOST=127.0.0.1
DB_PORT=3306                    # PostgreSQL: 5432
DB_DATABASE=bd_gestao_musical
DB_USERNAME=root                # PostgreSQL: postgres
DB_PASSWORD=sua_senha_aqui      # Substitua pela senha do seu MySQL ou PostgreSQL.
```

#### Configurando o Envio de E-mails (Opcional)

Para configurar o envio de e-mail do sistema, foi utilizado o passo a passo abaixo, para contar Gmail:

1. Necessário ter uma conta Gmail com autenticação de 2 fatores ativas.
2. Acesse as configurações de sua conta:
    - Busque por "Senhas de app", geralmente está dentro de "Verificação em duas etapas", crie um registro com o nome Portfólio Felipe Akel, por exemplo. Copie/salve a senha gerada.
3. Abra o arquivo **.env** e altere o valor contido na variável:
4. No terminal execute ```php artisan queue:work```, para o envio de forma assíncrona;
    - Ele deve ficar rodando em segundo plano em produção (ex: usando supervisord, systemd, etc.).

```php
MAIL_MAILER=smtp                      
MAIL_HOST=smtp.gmail.com              # Servidor do Gmail
MAIL_PORT=587                         # Portal do Gmail
MAIL_USERNAME=SEU_EMAIL@gmail.com     # Coloque o e-mail responsável por enviar as mensagens aos usuários.
MAIL_PASSWORD=SENHA_GERADA_GMAIL      # Coloque a senha gerada do Gmail, não coloque espaços.
MAIL_ENCRYPTION=TLS
```

### 6. Executar Migrations e Seeders

```php
php artisan migrate             # Cria as tabelas no banco de dados
php artisan db:seed             # Popular dados iniciais nas tabelas criadas pela migrate (Usuário de Login, Status, Gênero Musical...)
php artisan migrate:fresh       # Apaga todas as tabelas e executa novamente todas as migrations do zero.
```

### 7. Iniciar o Servidor

```php
# Em um terminal, iniciar servidor Laravel
php artisan serve
php artisan serve --port=8080
```

O sistema estará disponível em: **http://127.0.0.1:8000**

## 🔐 Credenciais de Acesso - Área Adeministrativa

Login na área administrativa na URL: **http://127.0.0.1:8000/login**

### Administrador
- **Usuário:** felipe.florentino
- **Senha:** 0123456789
- **Perfil:** Administrador


## 🔄 Atualizações Futuras

Para atualizar o sistema:

```bash
# Atualizar dependências
composer update

# Executar novas migrations
php artisan migrate

```

## 📞 Suporte

Em caso de dúvidas ou problemas:

1. Verifique os logs em `storage/logs/laravel.log`
2. Consulte a documentação do [Laravel](https://laravel.com/docs)
3. Verifique se todos os pré-requisitos estão instalados

## 📝 Checklist de Instalação Resumo

- [ __ ] PHP 8.2+ instalado;
- [ __ ] Composer instalado;
- [ __ ] MySQL ou PostgreSQL instalado e rodando;
- [ __ ] Banco de dados,bd_gestao_musical, criado;
- [ __ ] Dependências PHP instaladas (`composer install`);
- [ __ ] Arquivo `.env` configurado;
- [ __ ] Chave da aplicação gerada (`php artisan key:generate`);
- [ __ ] Cria link simbólico que conecta o diretório da pasta public (`php artisan storage:link`);
- [ __ ] Migrations executadas (`php artisan migrate`);
- [ __ ] Seeders executados (`php artisan db:seed`);
- [ __ ] Servidor iniciado (`php artisan serve`);
- [ __ ] Realizar login na URL (`http://127.0.0.1:8000/login`);

---

**Pronto!** Seu sistema está instalado, configurado e funcionando. Acesse http://127.0.0.1:8000 para navegar no sistema.
