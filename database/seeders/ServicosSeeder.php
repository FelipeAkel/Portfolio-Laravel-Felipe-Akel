<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TbServicos;

class ServicosSeeder extends Seeder
{
    public function run()
    {
        TbServicos::create([
            'no_servico' => 'Programador Front-End',
            'ds_servico' => 'Utilizando Frameworks consolidados no mercado, como por exemplo Bootstrap e Metronic, para aumentar a velocidade na criação de layouts. Além disso, adoto conceitos de UX/Designer cujo objetivo é garantir que o usuário tenha a melhor experiência de uso do produto/serviço.'
        ]);

        TbServicos::create([
            'no_servico' => 'Programador Back-End',
            'ds_servico' => 'Apto a resolver problemas relacionados "aos bastidores" do web site e sistemas. Atualmente trabalho mais com o PHP e também utilizando framework, Laravel, como principal linguagem de programação.'
        ]);

        TbServicos::create([
            'no_servico' => 'Responsabilidades',
            'ds_servico' => 'Meu ponto de vista, o programador não trabalha somente com códigos. Destaco as seguintes responsabilidades:
            Executar as tarefas do backlog do produto respeitando as necessidades definidas pelo Product Owner (PO); 
            Criar e atualizar Banco de Dados Relacional do sistema;
            Evidênciar, documentar a entrega das funcionalidades;
            Descrever, extrair as informações e histórias do usuário além de manter o quadro de tarefas atualizado; 
            '
        ]);

        
    }
}
