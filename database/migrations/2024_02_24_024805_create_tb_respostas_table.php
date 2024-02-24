<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbRespostasTable extends Migration
{

    public function up()
    {
        Schema::create('tb_respostas', function (Blueprint $table) {
            $table->id()->nullable(false)->comment('Chave Primária da tabela tb_respostas');
            $table->unsignedBigInteger('id_fale_conosco')->nullable(false)->comment('Chave Estrangeira da tabela tb_fale_conosco');
            $table->char('st_notificacao_email', 1)->nullable(false)->comment('Notificação por e-mail: 1 - [Sim]; 2 - [Não];');
            $table->text('ds_resposta')->nullable(false)->comment('Descrição da resposta enviada ao internauta');
            $table->timestamps();

            // Constraint
            $table->foreign('id_fale_conosco')->references('id')->on('tb_fale_conosco');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_respostas');
    }
}
