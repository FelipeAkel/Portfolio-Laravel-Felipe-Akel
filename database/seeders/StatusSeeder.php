<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TbStatus;

class StatusSeeder extends Seeder
{
    public function run()
    {
        // Funcionalidade Fale Conosco
        TbStatus::create([
            'id_funcionalidade' => 1,
            'no_status' => 'Requisição Recebida', 
            'ds_status' => 'Pergunta Fale Conosco foi enviada por um internauta e está aguardando uma resposta dos gestores.',
        ]);

        TbStatus::create([
            'id_funcionalidade' => 1,
            'no_status' => 'Requisição Pendente Internauta', 
            'ds_status' => 'Pergunta Fale Conosco foi respondida todavia está aguardando uma resposta por parte do internauta.',
        ]);
        
        TbStatus::create([
            'id_funcionalidade' => 1,
            'no_status' => 'Requisição em Análise', 
            'ds_status' => 'Pergunta Fale Conosco está em processo de análise pelos gestores.',
        ]);
        
        TbStatus::create([
            'id_funcionalidade' => 1,
            'no_status' => 'Requisição Finalizada', 
            'ds_status' => 'Pergunta Fale Conosco foi respondida pelos gestores e a requisição foi encerrada.',
        ]);
        
        TbStatus::create([
            'id_funcionalidade' => 1,
            'no_status' => 'Requisição Cancelada', 
            'ds_status' => 'Pergunta Fale Conosco foi cancelada por motivos diversos.',
        ]);
        // FIM - Funcionalidade Fale Conosco

        // Funcionalidade Logs do Sistema
        TbStatus::create([
            'id_funcionalidade' => 2,
            'no_status' => 'Cadastro de Registro', 
            'ds_status' => 'Um novo registro foi cadastrado no sistema.',
        ]);

        TbStatus::create([
            'id_funcionalidade' => 2,
            'no_status' => 'Atualização de Registro', 
            'ds_status' => 'Um determinado registro sofreu uma atualização.',
        ]);

        TbStatus::create([
            'id_funcionalidade' => 2,
            'no_status' => 'Delete de Registro', 
            'ds_status' => 'Um determinado registro foi deletado do sistema.',
        ]);

        TbStatus::create([
            'id_funcionalidade' => 2,
            'no_status' => 'Fale Conosco Respondido', 
            'ds_status' => 'Uma determinada pergunta do Fale Conosco foi respondida.',
        ]);

        TbStatus::create([
            'id_funcionalidade' => 2,
            'no_status' => 'Log de Acesso ao Sistema', 
            'ds_status' => 'Último login a área administrativa do sistema.',
        ]);
        // FIM - Funcionalidade Logs do Sistema

    }
}