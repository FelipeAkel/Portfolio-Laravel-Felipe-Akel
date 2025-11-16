<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InspireDev extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:inspire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mostra uma frase inspiradora personalizada de motivação';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $frases = [
            "O sucesso é a soma de pequenos esforços repetidos diariamente.",
            "Não tenha medo de falhar — tenha medo de não tentar.",
            "A persistência transforma o impossível em rotina.",
            "Enquanto uns dormem, outros codificam.",
            "O código perfeito não existe, mas o aprendizado é constante."
        ];

        $frase = $frases[array_rand($frases)];

        $this->info("\n    {$frase}");
    }
}
