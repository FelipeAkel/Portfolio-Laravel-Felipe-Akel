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
            $table->unsignedBigInteger('id_funcionalidade')->nullable(false)->comment('Chave Estrangeira da tabela tb_funcionalidades');
            $table->string('ds_log_executado', 70)->nullable(false)->comment('Descrição do log executado pelo usuário');
            $table->timestamps();

            // Constraint
            $table->foreign('id_funcionalidade')->references('id')->on('tb_funcionalidades');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_logs_sistema');
    }
}
