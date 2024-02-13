<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TbTipoExperiencia;

class TipoExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TbTipoExperiencia::create([
            'no_tipo_experiencia' => 'Escolaridade', 
            'ds_tipo_experiencia' => 'Formação acadêmica é a sua escolaridade, ou seja, geralmente refere-se ao seu estudo formal, que se divide em: Educação básica, Técnica e Superior. '
        ]);

        TbTipoExperiencia::create([
            'no_tipo_experiencia' => 'Certificados', 
            'ds_tipo_experiencia' => 'Certificação é a declaração formal de comprovação emitida por quem tenha credibilidade ou autoridade legal/moral.'
        ]);

        TbTipoExperiencia::create([
            'no_tipo_experiencia' => 'Experiência de Trabalho', 
            'ds_tipo_experiencia' => 'Categoria contratual de trabalho por prazo pré-estabelecido. Averiguar se o profissional recém-contratado tem aptidão para realizar as funções para as quais foi admitido na empresa.'
        ]);

        TbTipoExperiencia::create([
            'no_tipo_experiencia' => 'Cursos Complementares', 
            'ds_tipo_experiencia' => 'Os cursos online para horas complementares possibilitam que os estudantes de graduação complementem a formação.'
        ]);
    }
}
