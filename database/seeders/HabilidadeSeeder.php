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
            'no_habilidade' => 'Laravel', 
            'ds_habilidade' => 'Back-end', 
            'nr_porcentagem' => 100,
            'nr_ordenacao' => 1
        ]);

        TbHabilidades::create([
            'id_tipo_habilidade' => 1,
            'no_habilidade' => 'Bootstrap ', 
            'ds_habilidade' => 'Front-end', 
            'nr_porcentagem' => 100,
            'nr_ordenacao' => 5
        ]);

        TbHabilidades::create([
            'id_tipo_habilidade' => 2,
            'no_habilidade' => 'PHP', 
            'ds_habilidade' => '5x e 7x', 
            'nr_porcentagem' => 100,
            'nr_ordenacao' => 10
        ]);

    }
}
