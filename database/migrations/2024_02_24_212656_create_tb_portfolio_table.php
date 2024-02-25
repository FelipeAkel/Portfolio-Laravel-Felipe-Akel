<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPortfolioTable extends Migration
{
    public function up()
    {
        Schema::create('tb_portfolio', function (Blueprint $table) {
            $table->id()->nullable(false)->comment('Chave Primária da tabela tb_portfolio');
            $table->char('ds_tipo_projeto', 40)->nullable(true)->comment('Classe que define qual o tipo de projeto');
            $table->string('no_projeto', 70)->nullable(false)->comment('Nome do projeto');
            $table->string('no_cliente', 70)->nullable(true)->comment('Nome do cliente ou empresa');
            $table->date('dt_inicio')->nullable(true)->comment('Data de início do projeto');
            $table->date('dt_finalizacao')->nullable(true)->comment('Data de finalização do projeto');
            $table->text('ds_url_projeto')->nullable(true)->comment('Link URL do projeto');
            $table->text('ds_url_repositorio')->nullable(true)->comment('Link URL do repositório');
            $table->text('ds_projeto')->nullable(false)->comment('Descrição do projeto');
            $table->string('ds_tecnologia', 100)->nullable(false)->comment('Descrição de tecnologias utilizadas');
            $table->timestamps();
            $table->softDeletes()->nullable(true)->comment('Data de delete do registro');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_portfolio');
    }
}
