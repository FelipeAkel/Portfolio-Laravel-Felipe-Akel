<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ReadmeResumoExecutivoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:readme-resumo-executivo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gera um README_RESUMO_EXECUTIVO.md com informações sobre o projeto';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Gerando README_RESUMO_EXECUTIVO.md...');

        $estruturaArquivos = $this->estruturaArquivos(base_path());

        $readmeContent = "# Resumo Executivo: Portfólio Felipe Akel\n\n"
            . "## 📂 Visão Geral\n\n"
            . "Sistema para gestão de portfólio do programador desenvolvido em **Laravel 12 + Bootstrap 5 + MySQL ou PostgreSQL**"


            . "\n\n\n## ✅ Status do Projeto\n"
            . "**🟢 100% CONCLUÍDO** Todas as funcionalidades foram implementadas e testadas."

            
            . "\n\n\n## 📁 Estrutura de Pastas Resumo"
            . "\n```{$estruturaArquivos}\n```"


            // TODO - | Autenticação | ✅ | Laravel Auth (session-based)
            // TODO - | Rate Limiting |   🔁   | Configurável |
            . "\n\n\n## 🛡️ Segurança "
            . "\n```
            | Recurso       | Status | Descrição |
            |---------------|--------|-----------|
            | Autorização   |   ✅   | Middleware de admin |
            | CSRF          |   ✅   | Proteção em todos os forms |
            | Criptografia  |   ✅   | Senhas com md5 com adição de string personalizada |
            | Soft Delete   |   ✅   | Preservação de dados |
            | Validação     |   ✅   | Input validation completa |\n```"


            . "\n\n\n## 🎨 Interface do Usuário"

            . "\n\n### Tema área do internauta: MxTonz\n"
            . "[iKnow](https://themeforest.net/item/iknow-cv-resume-template/34225451?s_rank=42) é o template utilizado na Área dos Internautas."

            . "\n\n### Tema área administrativa: Metronic\n"
            . "[Bootstrap](https://getbootstrap.com/) é o template utilizado na Área Administrativa."
            
            . "\n\n### Design\n"
            . "- ✅ Moderno e profissional\n"
            . "- ✅ Responsivo (mobile-first)\n"
            . "- ✅ Sidebar colapsável\n"
            . "- ✅ Tema escuro na navegação\n"
            . "- ✅ Cards informativos\n"
            . "- ✅ Badges coloridos por contexto\n"
            . "- ✅ Alertas auto-dismissíveis\n"
            . "- ✅ Ícones intuitivos"

            . "\n\n### UX\n"
            // . "- 🔁 Máscaras automáticas (CPF, CNPJ, telefone, CEP)\n" // TODO - Máscaras automáticas (CPF, CNPJ, telefone, CEP)
            // . "- ✅ Busca automática de endereço através do CEP\n"
            . "- ✅ Confirmações de ações destrutivas ou grande impacto\n"
            . "- ✅ Mensagens de erro claras\n"
            . "- ✅ Feedback visual imediato\n"
            . "- ✅ Navegação intuitiva\n"
            . "- ✅ Filtros e buscas eficientes"


            . "\n\n\n## 💻 Informações Ténicas"

            . "\n\n### Arquitetura\n"
            . "- ✅ MVC estruturado\n"
            . "- ✅ Services com regras de negócio\n"
            . "- ✅ Repositories com as consultas Eloquent ORM\n"
            . "- ✅ Middlewares para segurança\n"
            . "- ✅ Migrations das tabelas\n"
            . "- ✅ Seeders para dados iniciais"

            . "\n\n### Performance\n"
            . "- ✅ Eager loading de relacionamentos\n"
            . "- ✅ Paginação eficiente\n"
            . "- ✅ Índices no banco de dados"

            . "\n\n### Manutenção\n"
            . "- ✅ Código documentado\n"
            . "- ✅ Padrões de códigos e banco de dados consistentes\n"
            . "- ✅ Separação de responsabilidades\n"
            . "- ✅ Fácil extensibilidade\n"
            . "- ✅ Testes preparados"


            . "\n\n\n## 👩‍💻 Equipe Ténica"
            . "\nTodas as codificações, funcionalidades, configurações de servidores e modelagem de dados foram desenvolvidar pela mesma pessoa.\n"
            . "- Felipe Akel Carvalho Florentino - [Linkedin](https://www.linkedin.com/in/felipe-akel-carvalho-florentino-009412135/)"

            . "\n\n\n## 🎉 Conclusão\n"
            . "Sistema **completo e funcional**, pronto para uso em produção após configuração adequada do ambiente. Todas as histórias e funcionalidade implementadas com **qualidade**, **segurança** e **documentação**."
            . "\nDesenvolvido seguindo as melhores práticas de desenvolvimento Laravel e princípios SOLID."
            . "\n\n**Autor e Desenvolvedor:** Felipe Akel Carvalho Florentino"

            . "\n\n## Gerado automaticamente em: " . now()->toDateTimeString();

        file_put_contents(base_path('README_RESUMO_EXECUTIVO.md'), $readmeContent);

        $this->info('README_RESUMO_EXECUTIVO.md gerado com sucesso!');
    }

    private function estruturaArquivos($basePath)
    {
        $resumo = [
            'total' => 0,
            'controllers' => 0,
            'models' => 0,
            'views' => 0,
            'repositories' => 0,
            'services' => 0,
            'migrations' => 0,
            'seeders' => 0,
            'middlewares' => 0,
            'docs' => 0,
        ];

        $todosArquivos = File::allFiles($basePath);
        $ignored = ['Exceptions', 'Providers', 'cache', 'config', 'public', 'js', 'lang', 'sass', 'vendor', 'node_modules', 'storage', 'bootstrap/cache'];

        foreach ($todosArquivos as $file) {
            $path = $file->getPathname();

            // Ignorar caminhos irrelevantes
            if (collect($ignored)->contains(fn($ignore) => str_contains($path, $ignore))) {
                continue;
            }

            $resumo['total']++;

            // Contadores baseados em padrões de caminho
            if (str_contains($path, 'app\Http\Controllers')) {
                $resumo['controllers']++;
            } elseif (str_contains($path, 'app\Models')) {
                $resumo['models']++;
            } elseif (str_contains($path, 'resources\views')) {
                if (str_ends_with($path, '.blade.php')) {
                    $resumo['views']++;
                }
            } elseif (str_contains($path, 'database\migrations')) {
                $resumo['migrations']++;
            } elseif (str_contains($path, 'database\seeders')) {
                $resumo['seeders']++;
            } elseif (str_contains($path, 'app\Http\Middleware')) {
                $resumo['middlewares']++;
            } elseif (str_contains($path, 'app\Repositories')) {
                $resumo['repositories']++;
            } elseif (str_contains($path, 'app\Services')) {
                $resumo['services']++;
            } elseif (str_contains($path, 'docs') || str_ends_with($path, '.md')) {
                $resumo['docs']++;
            }
        }

        $textoResumo = "
        📦 Sistema ({$resumo['total']}+ arquivos criados)
        ├── 🎨 Frontend ({$resumo['views']} views Blade)
        ├── 🔧 Backend ({$resumo['controllers']} controllers, {$resumo['models']} models)
        ├── 🗄️ Database ({$resumo['migrations']} migrations, {$resumo['seeders']} seeders)
        ├── 💡 Repositories ({$resumo['repositories']} repositories)
        ├── 📊 Services ({$resumo['services']} serviços)
        ├── 🛡️ Security ({$resumo['middlewares']} middlewares)
        └── 📚 Documentação ({$resumo['docs']} arquivos MD)";

        return $textoResumo;
    }

}
