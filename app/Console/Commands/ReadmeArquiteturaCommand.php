<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

class ReadmeArquiteturaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:readme-arquitetura';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gera um README_ARQUITETURA.md com a estrutura de pastas e informações do projeto';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Gerando README_ARQUITETURA.md...');

        $structure = $this->generateTree(base_path(), '', true);
        $estruturaArquivos = $this->estruturaArquivos(base_path());

        $readmeContent = "# Arquitetura: Portfólio Felipe Akel\n\n"
            . "## 📂 Estrutura de Pastas\n\n"
            . "```\n{$structure}\n```"

            . "\n\n\n## 📁 Estrutura de Pastas Resumo"
            . "\n```{$estruturaArquivos}\n```"

            . "\n\n\n## 🎯 Arquitetura MVC\n"
            . "O projeto segue o padrão **MVC (Model-View-Controller)** do Laravel:"

            . "\n\n### Models (app/Models/)\n"
            . "Representam as entidades do banco de dados e contêm a lógica de negócio."

            . "\n\n### Views (resources/views/)\n"
            . "Templates Blade para renderização HTML."

            . "\n\n### Controllers (app/Http/Controllers/)\n"
            . "Controlam o fluxo da aplicação e conectam Requests, Services, Repository 'via de regra', Models e Views."

            . "\n\n### Services (app/Services/)\n"
            . "Funcionalidades responsaveis por conter regras de negócio e lógicas complexas da aplicação. Atuando como intermediário entre o (Controller) e (Repository)."

            . "\n\n### Repositories (app/Repositories/)\n"
            . "Responsável por centralizar e abstrair o acesso a dados. Ela isola a lógica de consultas do ORM (Eloquent), o que torna o código mais limpo, testável, fácil de manter e flexível para mudanças futuras no banco de dados."


            . "\n\n\n## 🛡️ Middlewares (app/Http/Middleware/)"

            . "\n\n### AutenticacaoMiddleware.php\n"
            . "Verifica se o usuário é administrador."

            . "\n\n### Authenticate.php\n"
            . "Redireciona usuários não autenticados para login."


            . "\n\n\n## 🎨 Front-End"

            . "\n\n### Tema área do internauta: iKnow \n"
            . "[iKnow](https://themeforest.net/item/iknow-cv-resume-template/34225451?s_rank=42) é o template utilizado na Área dos Internautas."

            . "\n\n### Tema área administrativa: Bootstrap\n"
            . "[Bootstrap](https://getbootstrap.com/) é o template utilizado na Área Administrativa."

            . "\n\n### Arquitetura das Pastas Layouts\n"
            . "- email\n"
            . "- template-admin\n"    
            . "- template-internauta"


            . "\n\n\n## 🔄 Versionamento GitHub/GitLab"

            . "\n\n### Branches principais\n"
            . "```
                main        # Produção
                develop     # Desenvolvimento
                feat-*      # Novas funcionalidades
                fix-*       # Correções
                hotfix-*    # Correções urgentes\n```"

            . "\n\n### Commits Semânticos\n"
            . "Convenção de padrões para as mensagens de commit que definem uma estrutura clara, tornando o histórico de alterações mais fácil de ler e entender sem precisar ver o código.\n"
            . "```
                FEAT:       # Adiciona uma nova funcionalidade.
                FIX:        # Corrige um erro (bug).
                DOCS:       # Alterações na documentação.
                STYLE:      # Correções de estilo (formatação).
                REFACTOR:   # Mudanças no código que não corrigem bugs nem adicionam funcionalidades.
                PERF:       # Melhorias de performance.
                TEST:       # Adiciona ou corrige testes.
                CHORE:      # Tarefas de manutenção (como atualizar dependências).\n```"


            . "\n\n## Gerado automaticamente em: " . now()->toDateTimeString();

        file_put_contents(base_path('README_ARQUITETURA.md'), $readmeContent);

        $this->info('README_ARQUITETURA.md gerada com sucesso!');
    }

    /**
     * Gera a estrutura de pastas estilo tree.
     */
    private function generateTree($directory, $prefix = '', $isRoot = false)
    {
        $output = $isRoot ? basename($directory) . "/\n" : '';
        $items = File::directories($directory);
        $files = File::files($directory);

        // Ignorar pastas grandes desnecessárias
        $ignored = ['Exceptions', 'Providers', 'cache', 'config', 'public', 'js', 'lang', 'sass', 'vendor', 'node_modules', 'storage', 'bootstrap/cache'];

        // Ordenar diretórios e arquivos
        sort($items);
        sort($files);

        // Diretórios
        foreach ($items as $dir) {
            $name = basename($dir);

            if (in_array($name, $ignored)) continue;

            $output .= "{$prefix}├── 📁 {$name}/\n";
            $output .= $this->generateTree($dir, $prefix . "│   ");
        }

        // Arquivos
        $totalFiles = count($files);
        foreach ($files as $index => $file) {
            $name = basename($file);
            $isLast = ($index === $totalFiles - 1);
            $branch = $isLast ? '└──' : '├──';
            $output .= "{$prefix}{$branch} {$name}\n";
        }

        return $output;
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
