<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TbSobreMim;

class SobreMimSeeder extends Seeder
{

    public function run()
    {
        TbSobreMim::create([
            'no_usuario' => 'Felipe Akel Carvalho Florentino', 
            'no_usuario_portfolio' => 'Felipe Akel',
            'ds_email' => 'teste@gmail.com', 
            'ds_telefone' => '(61) 99988-7766', 
            'ds_cidade_uf' => 'Brasília, Distrito Federal ', 
            'ds_funcao' => 'Programador PHP | Laravel', 
            'ds_subtitulo' => 'Apaixonado por programação front e back-end', 
            'ds_perfil' => 'Olá! Eu sou Felipe Akel, sou profissional com formação superior completa na área de Tecnologia da Informação o qual contemplo o bacharelado em Sistema de Informação, pela faculdade UDF, e com pós-graduação em Segurança da Informação pela IESB. Além disso, contemplo outros cursos complementares realizados ao longo da minha carreira e importantes para o desenvolvimento profissional e pessoal.', 
            'ds_url_linkedin' => 'https://www.linkedin.com/in/felipe-akel-carvalho-florentino-009412135/', 
            'ds_url_github' => 'https://github.com/FelipeAkel', 
            'no_login' => 'felipe.florentino', 
            'ds_senha' => 'dd977e91ecd57d23703b9bb27dab6943', // 0123456789
        ]);
    }
}