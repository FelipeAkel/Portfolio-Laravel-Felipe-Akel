<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TbSobreMim;

class SobreMimSeeder extends Seeder
{

    public function run()
    {
        TbSobreMim::create([
            'no_usuario' => 'Fulano Silva Junior', 
            'no_usuario_portfolio' => 'Fulano Silva',
            'ds_email' => 'fulano@gmail.com', 
            'ds_telefone' => '(61) 99988-7766', 
            'ds_cidade_uf' => 'Brasília, Distrito Federal ', 
            'ds_funcao' => 'Programador PHP | Laravel', 
            'ds_subtitulo' => 'Apaixonado por programação front e back-end', 
            'ds_perfil' => 'Olá! Eu sou Fulano Silva, sou profissional com formação superior completa na área de Tecnologia da Informação o qual contemplo o bacharelado em Sistema de Informação, pela faculdade UDF, e com pós-graduação em Segurança da Informação pela IESB. Além disso, contemplo outros cursos complementares realizados ao longo da minha carreira e importantes para o desenvolvimento profissional e pessoal.', 
            'ds_url_linkedin' => 'https://www.linkedin.com/', 
            'ds_url_github' => 'https://github.com/', 
            'ds_url_curriculo' => 'https://pics.craiyon.com/2023-07-06/b9d8201c125c4a72a9746f3e44a1bb83.webp', 
            'ds_url_foto_usuario' => 'https://pics.craiyon.com/2023-07-06/b9d8201c125c4a72a9746f3e44a1bb83.webp', 
            'no_login' => 'fulano.silva', 
            'ds_senha' => 'dd977e91ecd57d23703b9bb27dab6943', // 0123456789
        ]);
    }
}
