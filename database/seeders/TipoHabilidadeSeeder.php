<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TbTipoHabilidade;

class TipoHabilidadeSeeder extends Seeder
{
    public function run()
    {
        TbTipoHabilidade::create([
            'no_tipo_habilidade' => 'Frameworks', 
            'ds_tipo_habilidade' => 'Um framework em desenvolvimento de software, é uma abstração que une códigos comuns entre vários projetos de software provendo uma funcionalidade genérica.'
        ]);

        TbTipoHabilidade::create([
            'no_tipo_habilidade' => 'Codificação', 
            'ds_tipo_habilidade' => 'Representação de um programa em determinado código, para torná-lo aceitável e compreensível por um sistema cibernético.'
        ]);

        TbTipoHabilidade::create([
            'no_tipo_habilidade' => 'Designer', 
            'ds_tipo_habilidade' => 'O designer é o profissional responsável pela concepção de um produto. Ele compreende os conceitos artísticos e funcionais, projeta e idealiza um objeto.'
        ]);
    }
}
