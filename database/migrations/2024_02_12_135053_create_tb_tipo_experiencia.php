<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTipoExperiencia extends Migration
{
    public function up()
    {
        Schema::create('tb_tipo_experiencia', function (Blueprint $table) {
            $table->id()->nullable(false)->comment('Chave Primária da tabela tb_tipo_experiencia');
            $table->string('no_tipo_experiencia', 150)->nullable(false)->comment('Nome tipo de experiência adquirida');
            $table->string('ds_tipo_experiencia', 255)->nullable(false)->comment('Descrição tipo de experiência adquirida');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0)->comment('Data de delete do registro');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_tipo_experiencia');
    }
}
