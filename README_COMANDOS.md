# ⚡ Comandos

Referência dos comandos mais usados no projeto.<br>
**Pré-requisitos:** É necessário que o projeto esteja instalado no servidor ou localmente para a execução dos comandos informados abaixo.<br>
Para mais informações acesso **README_INSTALACAO.md**.

## 🚀 Instalação Inicial

```bash
# 1. Instalar ou atualizar de dependências
composer install
composer update

# 2. Configurar ambiente
copy .env.example .env
php artisan key:generate
php artisan storage:link

# 3. Configurar banco de dados
php artisan migrate
php artisan db:seed                     # Executar as seeders, preencher as tabelas com dados.
php artisan migrate --seed              # Executa todas as migrations e, em seguida, os seeders definidos no DatabaseSeeder.


# 4. Compilar assets e iniciar
php artisan serve
php artisan serve --port=8080           # Compila o projeto na porta 8080
```

## 🔄 Desenvolvimento Diário

```bash
# Iniciar servidor Laravel
php artisan serve
php artisan serve --port=8080

# Opcional, compilar envio de e-mails de forma assíncrona (deixe rodando)
php artisan queue:work

# Limpar todos os caches
php artisan optimize:clear
```

## 🗄️ Banco de Dados

```bash
# Executar migrations
php artisan migrate                     # Cria as tabelas no banco de dados
php artisan migrate:fresh               # Apaga todas as tabelas e executa novamente todas as migrations do zero.
php artisan migrate:fresh --seed        # Com execução das seeders.
php artisan migrate:rollback            # Desfaz a última execução de migrate. Exemplo: remove as últimas tabelas criadas.
php artisan migrate:refresh             # Faz um rollback completo e roda novamente todas as migrations.
php artisan migrate:reset               # Desfaz todas as migrations (deixa o banco vazio).
php artisan migrate:status              # Mostra uma tabela indicando quais migrations já foram aplicadas e quais não.

# Criar nova migration
php artisan make:migration create_nome_tabela_table

# Apenas popular dados da tabela (sem resetar)
php artisan db:seed

# Criar novo seeder
php artisan make:seeder NomeSeeder
```

## 🗄️ Documentação do Projeto

```bash
php artisan app:readme-arquitetura          # Atualiza a documentação README_ARQUITETURA
php artisan app:readme-resumo-executivo     # Atualiza a documentação README_RESUMO_EXECUTIVO
```

## 🧹 Limpeza de Cache

```bash
# Limpar tudo de uma vez
php artisan optimize:clear

# Ou individualmente:
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## 🏗️ Criar Novos Componentes

Comandos nativos do Laravel e criados para esse projeto

```bash
# Controller
php artisan make:controller NomeController

# Model
php artisan make:model Nome

# Model com migration
php artisan make:model Nome -m

# Middleware
php artisan make:middleware NomeMiddleware

# Request (validação)
php artisan make:request NomeRequest

# Service (app/Service) - Comando Criado
php artisan make:service Nome

# Repository (app/Repositories) - Comando Criado
php artisan make:repository Nome

# Enums (app/Enums) - Comando Criado
php artisan make:enum Nome

```

## 📋 Informações do Sistema

```bash
# Listar todas as rotas
php artisan route:list

# Listar rotas de um controller específico
php artisan route:list --path=users

# Ver informações do Laravel
php artisan about

# Comando de humor, 
php artisan inspire         # Frases são retiradas de uma pequena coleção de citações internas incluídas no framework Laravel
php artisan app:inspire     # Frases personalizadas - Comando Criado
```

## 🔧 Manutenção

```bash
# Modo manutenção (ativar)
php artisan down

# Modo manutenção (desativar)
php artisan up

# Recarregar autoload do Composer
composer dump-autoload

# Atualizar dependências
composer update
```

## 🐛 Debug e Testes

```bash
# Abrir Tinker (console interativo)
php artisan tinker

# Exemplo no Tinker:
# App\Models\TbStatus::count()
# App\Models\TbStatus::where('id', '=', 1)->get()
# exit

# Ver logs em tempo real (PowerShell)
Get-Content storage/logs/laravel.log -Wait -Tail 50
```

## 👤 Gerenciar Usuários via Tinker

```bash
php artisan tinker
```

```php
# Criar registro dessa forma
use App\Models\Status;
TbStatus::create(['no_status' => 'NOME', 'ds_status' => 'DESCRICAO']);

# Ou criar registro dessa forma
$status = use App\Models\TbStatus;
$status->no_status = "NOME";
$status->ds_status = "DESCRICAO";
$status->save();

# Listar todos os status
App\Models\TbStatus::all();

# Sair do Tinker
exit
```

## 📊 Consultas Úteis (Tinker)

```php
# Total de registros
App\Models\TbStatus::count();

# Total de registros ativos
App\Models\TbEventosShows::where('id_status', '=', 1)->count();

# Primeiros 5 registros
App\Models\TbEventosShows::latest()->take(5)->get();
```

## 🚨 Solução Rápida de Problemas

```bash
# Erro de permissão (Windows - executar como Admin)
# Não aplicável no Windows, mas no Linux/Mac:
# chmod -R 775 storage bootstrap/cache

# Erro de banco de dados
# 1. Verifique se o PostgreSQL está rodando
# 2. Verifique as credenciais no .env
# 3. Recrie o banco: php artisan migrate:fresh --seed
```

## 📦 Backup Rápido

```bash
# Backup do banco (PostgreSQL)
pg_dump -U postgres sistema_gestao > backup.sql

# Restaurar backup
psql -U postgres sistema_gestao < backup.sql

# Backup de arquivos importantes
# Copie: .env, storage/app, public/uploads (se houver)
```

## 🌐 Deploy (Produção)

```bash
# 1. Atualizar código
git pull origin main

# 2. Instalar dependências
composer install --optimize-autoloader --no-dev

# 4. Executar migrations
php artisan migrate
php artisan db:seed

# 5. Limpar e otimizar
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 6. Reiniciar servidor (se necessário)
```

## 📝 Notas Importantes

- **Sempre** faça backup antes de executar `migrate:fresh`
- **Nunca** commite o arquivo `.env` no Git
- **Sempre** teste em desenvolvimento antes de fazer deploy
- **Mantenha** as dependências atualizadas regularmente
- **Use** `php artisan optimize:clear` quando algo não funcionar

---

## 🆘 Precisa de Ajuda?

1. Verifique os logs: `storage/logs/laravel.log`
2. Execute: `php artisan optimize:clear`
3. Consulte: [Documentação Laravel](https://laravel.com/docs)
4. Verifique o arquivo `README_INSTALACAO.md` para setup completo
