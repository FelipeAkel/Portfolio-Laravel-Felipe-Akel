<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbStatusTable extends Migration
{
    public function up()
    {
        Schema::create('tb_status', function (Blueprint $table) {
            $table->id()->nullable(false)->comment('Chave Primária da tabela');
            $table->string('no_status', 50)->nullable(false)->comment('Nome do status');
            $table->string('ds_status', 255)->nullable(false)->comment('Descrição do status');
            $table->timestamps();
            $table->softDeletes()->nullable(true)->comment('Data de delete do registro');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_status');
    }
}
