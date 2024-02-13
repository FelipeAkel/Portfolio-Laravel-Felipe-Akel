<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TbCarreiraProfissional;

class CarreiraProfissionalSeeder extends Seeder
{
    public function run()
    {
        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '1',
            'no_experiencia' => 'Segurança da Informação',
            'no_empresa' => 'Centro Universitário (IESB)',
            'dt_inicio' => '2015-01-01',
            'dt_final' => '2016-01-01',
            'ds_formacao' => 'Pós-Graduação, Segurança da Informação, o curso é uma especialização que visa proteger a integridade das informações de empresas e desenvolver mecanismos que impeçam acessos não autorizados. 480 horas/aula.',
            'nr_total_horas' => 480,
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '2',
            'no_experiencia' => 'Certified Scrum Developer® (CSD®)',
            'no_empresa' => 'Scrum Alliance',
            'dt_inicio' => '2022-05-25',
            'dt_final' => '2024-05-25',
            'ds_formacao' => 'Os Certified Scrum Developers (CSD®) demonstram, por meio da formação, que possuem uma compreensão prática dos princípios do Scrum e do Agile e que adquirem competências de engenharia Agile especializadas.',
            'nr_total_horas' => 15,
        ]);
    }
}
