<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSobreMimTable extends Migration
{
    public function up()
    {
        Schema::create('tb_sobre_mim', function (Blueprint $table) {
            $table->id()->nullable(false)->comment('Chave Primária da tabela tb_sobre_mim');
            $table->string('no_usuario', 70)->nullable(false)->comment('Nome completo do usuário do portfólio');
            $table->string('no_usuario_portfolio', 70)->nullable(false)->comment('Nome abrevido do usuário para os internautas do site');
            $table->string('ds_email', 70)->nullable(false)->comment('E-mail do usuário do portfólio');
            $table->char('ds_telefone', 15)->nullable(false)->comment('DDD e Telefone do usuário');
            $table->string('ds_cidade_uf', 70)->nullable(false)->comment('Cidade e Estado do usuário');
            $table->string('ds_funcao', 70)->nullable(false)->comment('Descrição da função que o usuário desempenha');
            $table->string('ds_subtitulo', 70)->nullable(false)->comment('Descrição do sub título do portfólio');
            $table->text('ds_perfil')->nullable(false)->comment('Descrição do perfil do portfólio');
            $table->string('ds_url_linkedin', 255)->nullable(true)->comment('URL do Linkedin do usuário');
            $table->string('ds_url_github', 255)->nullable(true)->comment('URL do GitHub do usuário');
            $table->string('ds_url_curriculo', 255)->nullable(true)->comment('URL do currículo do usuário');
            $table->string('ds_url_foto_usuario', 255)->nullable(true)->comment('URL do foto do usuário');
            $table->string('no_login', 50)->nullable(false)->comment('Nome do login do usuário do sistema');
            $table->string('ds_senha', 255)->nullable(false)->comment('Hash da senha do usuário do sistema');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_sobre_mim');
    }
}
