# Arquitetura: Portfólio Felipe Akel

## 📂 Estrutura de Pastas

```
Portfolio-Laravel-Felipe-Akel/
├── 📁 app/
│   ├── 📁 Console/
│   │   ├── 📁 Commands/
│   │   │   ├── InspireDev.php
│   │   │   ├── MakeEnumCommand.php
│   │   │   ├── MakeRepositoryCommand.php
│   │   │   ├── MakeServiceCommand.php
│   │   │   ├── ReadmeArquiteturaCommand.php
│   │   │   └── ReadmeResumoExecutivoCommand.php
│   │   └── Kernel.php
│   ├── 📁 Enums/
│   │   └── StatusEnum.php
│   ├── 📁 Http/
│   │   ├── 📁 Controllers/
│   │   │   ├── CarreiraProfissionalCotroller.php
│   │   │   ├── Controller.php
│   │   │   ├── DashboardController.php
│   │   │   ├── FaleConoscoController.php
│   │   │   ├── HabilidadeController.php
│   │   │   ├── InternautaController.php
│   │   │   ├── LoginController.php
│   │   │   ├── PortfolioController.php
│   │   │   ├── ServicosController.php
│   │   │   └── SobreMimController.php
│   │   ├── 📁 Middleware/
│   │   │   ├── AutenticacaoMiddleware.php
│   │   │   ├── Authenticate.php
│   │   │   ├── EncryptCookies.php
│   │   │   ├── PreventRequestsDuringMaintenance.php
│   │   │   ├── RedirectIfAuthenticated.php
│   │   │   ├── TrimStrings.php
│   │   │   ├── TrustHosts.php
│   │   │   ├── TrustProxies.php
│   │   │   └── VerifyCsrfToken.php
│   │   ├── 📁 Requests/
│   │   │   ├── 📁 CarreiraProfissional/
│   │   │   │   ├── CarreiraProfissionalFormRequest.php
│   │   │   │   └── IndexFormRequest.php
│   │   │   ├── 📁 FaleConosco/
│   │   │   │   ├── IndexFormRequest.php
│   │   │   │   └── ResponderFormRequest.php
│   │   │   ├── 📁 Habilidade/
│   │   │   │   ├── IndexFormRequest.php
│   │   │   │   └── StoreUpdateFormRequest.php
│   │   │   ├── 📁 Portfolio/
│   │   │   │   ├── IndexFormRequest.php
│   │   │   │   └── PortfolioFormRequest.php
│   │   │   ├── ArquivosFormRequest.php
│   │   │   ├── InformacaoPessoalFormRequest.php
│   │   │   ├── InternautaFormRequest.php
│   │   │   ├── LoginFormRequest.php
│   │   │   ├── LoginSenhaFormRequest.php
│   │   │   └── ServicosFormRequest.php
│   │   └── Kernel.php
│   ├── 📁 Mail/
│   │   └── respostaFaleConoscoEmail.php
│   ├── 📁 Models/
│   │   ├── TbCarreiraProfissional.php
│   │   ├── TbFaleConosco.php
│   │   ├── TbFuncionalidade.php
│   │   ├── TbHabilidades.php
│   │   ├── TbLogsSistema.php
│   │   ├── TbPortfolio.php
│   │   ├── TbRespostas.php
│   │   ├── TbServicos.php
│   │   ├── TbSobreMim.php
│   │   ├── TbStatus.php
│   │   ├── TbTipoExperiencia.php
│   │   ├── TbTipoHabilidade.php
│   │   └── User.php
│   ├── 📁 Repositories/
│   │   ├── CarreiraProfissionalRepository.php
│   │   ├── DashboardRepository.php
│   │   ├── FaleConoscoRepository.php
│   │   ├── HabilidadeRepository.php
│   │   ├── InternautaRepository.php
│   │   ├── PortfolioRepository.php
│   │   ├── ServicosRepository.php
│   │   ├── SobreMimRepository.php
│   │   └── StatusRepository.php
│   ├── 📁 Services/
│   │   ├── PortfolioService.php
│   │   ├── SegurancaService.php
│   │   ├── ServicosService.php
│   │   └── SobreMimService.php
├── 📁 bootstrap/
│   └── app.php
├── 📁 database/
│   ├── 📁 factories/
│   │   ├── TbFaleConoscoFactory.php
│   │   └── UserFactory.php
│   ├── 📁 migrations/
│   │   ├── 2014_10_12_000000_create_users_table.php
│   │   ├── 2014_10_12_100000_create_password_resets_table.php
│   │   ├── 2019_08_19_000000_create_failed_jobs_table.php
│   │   ├── 2019_12_14_000001_create_personal_access_tokens_table.php
│   │   ├── 2024_02_12_135053_create_tb_tipo_experiencia.php
│   │   ├── 2024_02_12_144741_create_tb_carreira_profissional_table.php
│   │   ├── 2024_02_12_190105_create_tb_tipo_habilidade_table.php
│   │   ├── 2024_02_12_190605_create_tb_habilidade.php
│   │   ├── 2024_02_20_013913_create_tb_servicos_table.php
│   │   ├── 2024_02_21_005258_create_tb_funcionalidades_table.php
│   │   ├── 2024_02_22_174440_create_tb_status_table.php
│   │   ├── 2024_02_22_193051_create_tb_fale_conosco_table.php
│   │   ├── 2024_02_24_024805_create_tb_respostas_table.php
│   │   ├── 2024_02_27_014941_create_tb_sobre_mim_table.php
│   │   ├── 2024_03_05_011312_create_logs_sistema_table.php
│   │   ├── 2024_03_11_162357_create_tb_portfolio.php
│   │   └── 2025_07_13_004242_create_jobs_table.php
│   ├── 📁 seeders/
│   │   ├── CarreiraProfissionalSeeder.php
│   │   ├── DatabaseSeeder.php
│   │   ├── FaleConoscoSeeder.php
│   │   ├── FuncionalidadesSeeder.php
│   │   ├── HabilidadeSeeder.php
│   │   ├── PortfolioSeeder.php
│   │   ├── ServicosSeeder.php
│   │   ├── SobreMimSeeder.php
│   │   ├── StatusSeeder.php
│   │   ├── TipoExperienciaSeeder.php
│   │   └── TipoHabilidadeSeeder.php
├── 📁 resources/
│   ├── 📁 css/
│   │   └── app.css
│   ├── 📁 views/
│   │   ├── 📁 email/
│   │   │   ├── 📁 layout/
│   │   │   │   ├── 📁 include/
│   │   │   │   │   ├── footer.blade.php
│   │   │   │   │   └── styleCss.blade.php
│   │   │   │   └── template.blade.php
│   │   │   └── respostaFaleConosco.blade.php
│   │   ├── 📁 template-admin/
│   │   │   ├── 📁 carreira-profissional/
│   │   │   │   ├── 📁 component/
│   │   │   │   │   └── form-create-edit.blade.php
│   │   │   │   ├── create.blade.php
│   │   │   │   ├── edit.blade.php
│   │   │   │   ├── index.blade.php
│   │   │   │   └── show.blade.php
│   │   │   ├── 📁 dashboard/
│   │   │   │   ├── 📁 graficos/
│   │   │   │   │   ├── carreira-profissional.blade.php
│   │   │   │   │   ├── fale-conosco.blade.php
│   │   │   │   │   ├── habilidades.blade.php
│   │   │   │   │   └── portfolio-servicos.blade.php
│   │   │   │   └── dashboard.blade.php
│   │   │   ├── 📁 fale-conosco/
│   │   │   │   ├── 📁 include/
│   │   │   │   │   ├── dados-registro-fale-conosco.blade.php
│   │   │   │   │   └── historico-resposta.blade.php
│   │   │   │   ├── index.blade.php
│   │   │   │   ├── responder.blade.php
│   │   │   │   └── show.blade.php
│   │   │   ├── 📁 habilidade/
│   │   │   │   ├── 📁 component/
│   │   │   │   │   └── form-create-edit.blade.php
│   │   │   │   ├── create.blade.php
│   │   │   │   ├── edit.blade.php
│   │   │   │   └── index.blade.php
│   │   │   ├── 📁 layout/
│   │   │   │   ├── 📁 include/
│   │   │   │   │   ├── color-modes.blade.php
│   │   │   │   │   ├── footer.blade.php
│   │   │   │   │   ├── head-css.blade.php
│   │   │   │   │   ├── head-js.blade.php
│   │   │   │   │   ├── header.blade.php
│   │   │   │   │   └── menu.blade.php
│   │   │   │   └── index.blade.php
│   │   │   ├── 📁 portfolio/
│   │   │   │   ├── 📁 component/
│   │   │   │   │   └── form-create-edit.blade.php
│   │   │   │   ├── create.blade.php
│   │   │   │   ├── edit.blade.php
│   │   │   │   ├── index.blade.php
│   │   │   │   └── show.blade.php
│   │   │   ├── 📁 servicos/
│   │   │   │   ├── 📁 component/
│   │   │   │   │   └── form-create-edit.blade.php
│   │   │   │   ├── create.blade.php
│   │   │   │   ├── edit.blade.php
│   │   │   │   ├── index.blade.php
│   │   │   │   └── show.blade.php
│   │   │   ├── 📁 sobre-mim/
│   │   │   │   ├── 📁 component/
│   │   │   │   │   ├── form-edit-alterar-login-senha.blade.php
│   │   │   │   │   ├── form-edit-info-pessoal.blade.php
│   │   │   │   │   └── form-edit-mudar-arquivos.blade.php
│   │   │   │   ├── alterar-login-senha-edit.blade.php
│   │   │   │   ├── alterar-login-senha-show.blade.php
│   │   │   │   ├── index.blade.php
│   │   │   │   ├── informacao-pessoal-edit.blade.php
│   │   │   │   ├── informacao-pessoal-show.blade.php
│   │   │   │   ├── logs-sistema.blade.php
│   │   │   │   ├── mudar-arquivos-edit.blade.php
│   │   │   │   └── mudar-arquivos-show.blade.php
│   │   │   └── login.blade.php
│   │   ├── 📁 template-internauta/
│   │   │   ├── 📁 layout/
│   │   │   │   ├── 📁 includes/
│   │   │   │   │   ├── footer.blade.php
│   │   │   │   │   ├── hero-shapes.blade.php
│   │   │   │   │   ├── menu.blade.php
│   │   │   │   │   └── topbar.blade.php
│   │   │   │   ├── about.blade.php
│   │   │   │   ├── blog.blade.php
│   │   │   │   ├── contact.blade.php
│   │   │   │   ├── portfolio.blade.php
│   │   │   │   ├── resume.blade.php
│   │   │   │   ├── service.blade.php
│   │   │   │   └── testimonials.blade.php
│   │   │   └── index.blade.php
│   │   ├── index-dark.html
│   │   └── welcome.blade.php
├── 📁 routes/
│   ├── api.php
│   ├── channels.php
│   ├── console.php
│   └── web.php
├── 📁 tests/
│   ├── 📁 Feature/
│   │   └── ExampleTest.php
│   ├── 📁 Unit/
│   │   └── ExampleTest.php
│   ├── CreatesApplication.php
│   └── TestCase.php
├── LICENSE
├── README.md
├── README_ARQUITETURA.md
├── README_COMANDOS.md
├── README_INSTALACAO.md
├── README_MODELAGEM.md
├── artisan
├── composer.json
├── composer.lock
├── package.json
├── phpunit.xml
├── server.php
└── webpack.mix.js

```


## 📁 Estrutura de Pastas Resumo
```
        📦 Sistema (184+ arquivos criados)
        ├── 🎨 Frontend (64 views Blade)
        ├── 🔧 Backend (10 controllers, 13 models)
        ├── 🗄️ Database (17 migrations, 11 seeders)
        ├── 💡 Repositories (9 repositories)
        ├── 📊 Services (4 serviços)
        ├── 🛡️ Security (9 middlewares)
        └── 📚 Documentação (5 arquivos MD)
```


## 🎯 Arquitetura MVC
O projeto segue o padrão **MVC (Model-View-Controller)** do Laravel:

### Models (app/Models/)
Representam as entidades do banco de dados e contêm a lógica de negócio.

### Views (resources/views/)
Templates Blade para renderização HTML.

### Controllers (app/Http/Controllers/)
Controlam o fluxo da aplicação e conectam Requests, Services, Repository 'via de regra', Models e Views.

### Services (app/Services/)
Funcionalidades responsaveis por conter regras de negócio e lógicas complexas da aplicação. Atuando como intermediário entre o (Controller) e (Repository).

### Repositories (app/Repositories/)
Responsável por centralizar e abstrair o acesso a dados. Ela isola a lógica de consultas do ORM (Eloquent), o que torna o código mais limpo, testável, fácil de manter e flexível para mudanças futuras no banco de dados.


## 🛡️ Middlewares (app/Http/Middleware/)

### AutenticacaoMiddleware.php
Verifica se o usuário é administrador.

### Authenticate.php
Redireciona usuários não autenticados para login.


## 🎨 Front-End

### Tema área do internauta: iKnow 
[iKnow](https://themeforest.net/item/iknow-cv-resume-template/34225451?s_rank=42) é o template utilizado na Área dos Internautas.

### Tema área administrativa: Bootstrap
[Bootstrap](https://getbootstrap.com/) é o template utilizado na Área Administrativa.

### Arquitetura das Pastas Layouts
- email
- template-admin
- template-internauta


## 🔄 Versionamento GitHub/GitLab

### Branches principais
```
                main        # Produção
                develop     # Desenvolvimento
                feat-*      # Novas funcionalidades
                fix-*       # Correções
                hotfix-*    # Correções urgentes
```

### Commits Semânticos
Convenção de padrões para as mensagens de commit que definem uma estrutura clara, tornando o histórico de alterações mais fácil de ler e entender sem precisar ver o código.
```
                FEAT:       # Adiciona uma nova funcionalidade.
                FIX:        # Corrige um erro (bug).
                DOCS:       # Alterações na documentação.
                STYLE:      # Correções de estilo (formatação).
                REFACTOR:   # Mudanças no código que não corrigem bugs nem adicionam funcionalidades.
                PERF:       # Melhorias de performance.
                TEST:       # Adiciona ou corrige testes.
                CHORE:      # Tarefas de manutenção (como atualizar dependências).
```

## Gerado automaticamente em: 2025-11-16 01:49:26