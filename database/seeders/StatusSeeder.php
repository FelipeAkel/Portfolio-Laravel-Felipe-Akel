<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TbStatus;

class StatusSeeder extends Seeder
{
    public function run()
    {
        TbStatus::create([
            'no_status' => 'Requisição Recebida', 
            'ds_status' => 'Pergunta Fale Conosco foi enviada por um internauta e está aguardando uma resposta dos gestores.',
        ]);

        TbStatus::create([
            'no_status' => 'Requisição Pendente Internauta', 
            'ds_status' => 'Pergunta Fale Conosco foi respondida todavia está aguardando uma resposta por parte do internauta.',
        ]);
        
        TbStatus::create([
            'no_status' => 'Requisição em Análise', 
            'ds_status' => 'Pergunta Fale Conosco está em processo de análise pelos gestores.',
        ]);
        
        TbStatus::create([
            'no_status' => 'Requisição Finalizada', 
            'ds_status' => 'Pergunta Fale Conosco foi respondida pelos gestores e a requisição foi encerrada.',
        ]);
        
        TbStatus::create([
            'no_status' => 'Requisição Cancelada', 
            'ds_status' => 'Pergunta Fale Conosco foi cancelada por motivos diversos.',
        ]);
        
    }
}