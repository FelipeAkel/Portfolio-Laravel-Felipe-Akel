<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTipoHabilidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tipo_habilidade', function (Blueprint $table) {
            $table->id()->nullable(false)->comment('Chave Primária da tabela tb_tipo_habilidade');
            $table->string('no_tipo_habilidade', 150)->nullable(false)->comment('Nome tipo de habilidade adquirida');
            $table->string('ds_tipo_habilidade', 255)->nullable(false)->comment('Descrição tipo de habilidade adquirida');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0)->comment('Data de delete do registro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_tipo_habilidade');
    }
}
