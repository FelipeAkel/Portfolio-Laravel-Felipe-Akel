<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbServicosTable extends Migration
{
    public function up()
    {
        Schema::create('tb_servicos', function (Blueprint $table) {
            $table->id()->comment('Chave Primária da tabela tb_servicos');
            $table->string('no_servico', 100)->nullable(false)->comment('Nome do serviço');
            $table->text('ds_servico')->nullable(false)->comment('Descrição do serviço');
            $table->text('ds_url_icon_svg')->nullable(true)->comment('Código do icone Bootstrap do serviço');
            $table->text('ds_url_img')->nullable(true)->comment('URL da imagem do serviço');
            $table->timestamps();
            $table->softDeletes()->nullable(true)->comment('Data de delete do registro');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_servicos');
    }
}
