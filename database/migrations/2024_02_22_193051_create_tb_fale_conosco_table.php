<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbFaleConoscoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_fale_conosco', function (Blueprint $table) {
            $table->id()->nullable(false)->comment('Chave Primária da tabela');
            $table->unsignedBigInteger('id_status')->nullable(false)->comment('Chave Estrangeira da tabela tb_status');
            $table->string('no_contato', 70)->nullable(false)->comment('Nome do contato internauta');
            $table->string('ds_email', 70)->nullable(false)->comment('Email do contato internauta');
            $table->string('ds_assunto', 70)->nullable(false)->comment('Assunto da mensagem');
            $table->text('ds_mensagem')->nullable(false)->comment('Descrição da mensagem do internauta');
            $table->timestamps();
            $table->softDeletes()->nullable(true)->comment('Data de delete do registro');
            
            // Constraint
            $table->foreign('id_status')->references('id')->on('tb_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_fale_conosco');
    }
}
