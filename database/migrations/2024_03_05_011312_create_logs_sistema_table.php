<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsSistemaTable extends Migration
{

    public function up()
    {
        Schema::create('tb_logs_sistema', function (Blueprint $table) {
            $table->id()->nullable(false)->comment('Chave Primária da tabela tb_logs_sistema');
            $table->unsignedBigInteger('id_status')->nullable(false)->comment('Chave Estrangeira da tabela tb_status');
            $table->string('ds_log_executado', 70)->nullable(false)->comment('Descrição do log executado pelo usuário');
            $table->timestamps();

            // Constraint
            $table->foreign('id_status')->references('id')->on('tb_status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_logs_sistema');
    }
}
