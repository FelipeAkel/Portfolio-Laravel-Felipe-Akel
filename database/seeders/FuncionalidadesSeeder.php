<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TbFuncionalidade;

class FuncionalidadesSeeder extends Seeder
{
    public function run()
    {
        TbFuncionalidade::create([
            'id' => 1,
            'no_funcionalidade' => 'Fale Conosco',
        ]);

        TbFuncionalidade::create([
            'id' => 2,
            'no_funcionalidade' => 'Logs do Sistema',
        ]);
    }
}
