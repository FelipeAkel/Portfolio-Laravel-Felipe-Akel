<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TbHabilidades;

class HabilidadeSeeder extends Seeder
{
    public function run()
    {
        TbHabilidades::create([
            'id_tipo_habilidade' => 1,
            'no_habilidade' => 'Angular', 
            'ds_habilidade' => 'Front-end', 
            'nr_porcentagem' => 50,
            'nr_ordenacao' => 1
        ]);

        TbHabilidades::create([
            'id_tipo_habilidade' => 1,
            'no_habilidade' => 'Laravel', 
            'ds_habilidade' => 'Back-end', 
            'nr_porcentagem' => 75,
            'nr_ordenacao' => 1
        ]);

        TbHabilidades::create([
            'id_tipo_habilidade' => 1,
            'no_habilidade' => 'Bootstrap', 
            'ds_habilidade' => 'Front-end', 
            'nr_porcentagem' => 100,
            'nr_ordenacao' => 2
        ]);

        TbHabilidades::create([
            'id_tipo_habilidade' => 1,
            'no_habilidade' => 'Metronic', 
            'ds_habilidade' => 'Front-end', 
            'nr_porcentagem' => 100,
            'nr_ordenacao' => 3
        ]);

        TbHabilidades::create([
            'id_tipo_habilidade' => 2,
            'no_habilidade' => 'PHP', 
            'ds_habilidade' => '5x e 7x', 
            'nr_porcentagem' => 75,
            'nr_ordenacao' => 1
        ]);

        TbHabilidades::create([
            'id_tipo_habilidade' => 2,
            'no_habilidade' => 'HTML', 
            'ds_habilidade' => null, 
            'nr_porcentagem' => 100,
            'nr_ordenacao' => 1
        ]);

        TbHabilidades::create([
            'id_tipo_habilidade' => 2,
            'no_habilidade' => 'CSS', 
            'ds_habilidade' => null,
            'nr_porcentagem' => 50,
            'nr_ordenacao' => 1
        ]);

        TbHabilidades::create([
            'id_tipo_habilidade' => 2,
            'no_habilidade' => 'JavaScript', 
            'ds_habilidade' => null, 
            'nr_porcentagem' => 50,
            'nr_ordenacao' => 2
        ]);

        TbHabilidades::create([
            'id_tipo_habilidade' => 2,
            'no_habilidade' => 'Linguagem SQL', 
            'ds_habilidade' => null, 
            'nr_porcentagem' => 75,
            'nr_ordenacao' => 3
        ]);

        TbHabilidades::create([
            'id_tipo_habilidade' => 3,
            'no_habilidade' => 'Photoshop',
            'ds_habilidade' => '', 
            'nr_porcentagem' => 25,
            'nr_ordenacao' => 1
        ]);

        TbHabilidades::create([
            'id_tipo_habilidade' => 3,
            'no_habilidade' => 'InDesigner',
            'ds_habilidade' => null, 
            'nr_porcentagem' => 25,
            'nr_ordenacao' => 2
        ]);

    }
}