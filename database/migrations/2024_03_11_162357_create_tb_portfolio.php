<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPortfolio extends Migration
{
    public function up()
    {
        Schema::create('tb_portfolio', function (Blueprint $table) {
            $table->id()->nullable(false)->comment('Chave Primária da tabela tb_portfolio');
            // $table->unsignedBigInteger('id_arquivos')->nullable(false)->comment('Chave Estrangeira da tabela tb_arquivos');
            $table->char('ds_tipo_projeto', 40)->nullable(true)->comment('Classe CSS que define qual o tipo de projeto');
            $table->string('no_projeto', 70)->nullable(false)->comment('Nome do projeto');
            $table->string('no_cliente', 70)->nullable(true)->comment('Nome do cliente ou empresa');
            $table->date('dt_inicio')->nullable(true)->comment('Data de início do projeto');
            $table->date('dt_finalizacao')->nullable(true)->comment('Data de finalização do projeto');
            $table->text('ds_url_projeto')->nullable(true)->comment('Link URL do projeto');
            $table->text('ds_url_repositorio')->nullable(true)->comment('Link URL do repositório');
            $table->text('ds_projeto')->nullable(false)->comment('Descrição do projeto');
            $table->string('ds_tecnologia', 100)->nullable(false)->comment('Descrição de tecnologias utilizadas');
            $table->string('ds_url_img_destaque', 255)->nullable(true)->comment('URL imagem em destaque do projeto');
            $table->string('ds_url_img_1_galeria', 255)->nullable(true)->comment('URL 1º imagem da galeria');
            $table->string('ds_url_img_2_galeria', 255)->nullable(true)->comment('URL 2º imagem da galeria');
            $table->string('ds_url_img_3_galeria', 255)->nullable(true)->comment('URL 3º imagem da galeria');
            $table->timestamps();
            $table->softDeletes()->nullable(true)->comment('Data de delete do registro');

            // TO DO - Melhoria: Colocar todos os arquivos imagens, PDF... uma uma tabela separada.
            // Constraint
            // $table->foreign('id_arquivos')->references('id')->on('tb_arquivos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_portfolio');
    }
}