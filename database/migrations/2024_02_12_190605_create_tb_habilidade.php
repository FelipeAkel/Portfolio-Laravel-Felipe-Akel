<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHabilidade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_habilidade', function (Blueprint $table) {
            $table->id()->nullable(false)->comment('Chave primária da tabela tb_habilidade');
            $table->string('no_habilidade', 150)->nullalbe(false)->comment('Nome da habilidade, ferramenta, codificação que domina');
            $table->string('ds_habilidade', 150)->nullable(true)->comment('Descrição complementar da habilidade');
            $table->integer('nr_porcentagem')->nullable(false)->comment('Porcentagem de 0 a 100% de domínio sobre a ferramenta, codificação');
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
        Schema::dropIfExists('tb_habilidade');
    }
}
