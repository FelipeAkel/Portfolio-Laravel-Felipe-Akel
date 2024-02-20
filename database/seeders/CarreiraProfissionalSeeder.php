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
            'dt_inicio' => '2016-04-30',
            'dt_final' => '2017-04-30',
            'st_trabalho_atual' => '0',
            'ds_formacao' => 'Pós-Graduação, Segurança da Informação, o curso é uma especialização que visa proteger a integridade das informações de empresas e desenvolver mecanismos que impeçam acessos não autorizados. 480 horas/aula.',
            'nr_total_horas' => 480,
            'ds_url' => null
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '1',
            'no_experiencia' => 'Sistema de Informação',
            'no_empresa' => 'Centro Universitário do Distrito Federal (UDF)',
            'dt_inicio' => '2011-01-18',
            'dt_final' => '2014-12-18',
            'st_trabalho_atual' => '0',
            'ds_formacao' => 'Bacharelado, Sistema de Informação, o curso de Sistemas de Informação forma profissionais capazes de administrar o fluxo de informações geradas e distribuídas por redes de computadores dentro e fora de uma organização.',
            'nr_total_horas' => 3000,
            'ds_url' => null
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '2',
            'no_experiencia' => 'Certified Scrum Developer® (CSD®)',
            'no_empresa' => 'Scrum Alliance',
            'dt_inicio' => '2022-05-31',
            'dt_final' => '2024-05-31',
            'st_trabalho_atual' => '0',
            'ds_formacao' => 'Os Certified Scrum Developers (CSD®) demonstram, por meio da formação, que possuem uma compreensão prática dos princípios do Scrum e do Agile e que adquirem competências de engenharia Agile especializadas.',
            'nr_total_horas' => 16,
            'ds_url' => null
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '4',
            'no_experiencia' => 'Testes Unitários e TD com PHP e PHPUnit',
            'no_empresa' => 'Udemy',
            'dt_inicio' => '2023-12-27',
            'dt_final' => '2023-12-27',
            'st_trabalho_atual' => '0',
            'ds_formacao' => '',
            'nr_total_horas' => 4.5,
            'ds_url' => 'https://www.udemy.com/certificate/UC-4b1e6e50-c568-40fd-a1a5-1cfb27b1eae8/'
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '4',
            'no_experiencia' => 'Laravel 10 do Básico ao Avançado',
            'no_empresa' => 'Udemy',
            'dt_inicio' => '2023-12-15',
            'dt_final' => '2023-12-15',
            'st_trabalho_atual' => '0',
            'ds_formacao' => '',
            'nr_total_horas' => 11 ,
            'ds_url' => 'https://www.udemy.com/certificate/UC-c643058d-54f1-4f77-93ba-404258266458/'
        ]);
    }
}
