<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCarreiraProfissionalTable extends Migration
{
    public function up()
    {
        Schema::create('tb_carreira_profissional', function (Blueprint $table) {
            $table->id()->comment('Chave Primária');
            $table->unsignedBigInteger('id_tipo_experiencia')->nullable(false)->comment('Chave Estrageira da tabela tb_tipo_experiencia');
            $table->string('no_experiencia', 255)->nullable(false)->comment('Nome da experiência adquirida, por exemplo, formação, certificado ou cargo de atuação');
            $table->string('no_empresa', 255)->nullable(false)->comment('Nome da empresa ou faculdade que prestou o serviço, trabalho ou formação');
            $table->date('dt_inicio')->nullable(false)->comment('Data Início do contrato');
            $table->date('dt_final')->nullable(true)->comment('Data Final do contrato');
            $table->text('ds_formacao')->nullable(true)->comment('Descrição da formação, atividades desempenhadas ou curso realizado');
            $table->float('nr_total_horas', 8, 2)->nullable(true)->comment('Número totais de horas do formação ou curso realizado');
            $table->text('ds_url')->nullable(true)->comment('URL do certificado emitido no nome do aluno');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0)->comment('Data de delete do registro');

            // Constraint
            $table->foreign('id_tipo_experiencia')->references('id')->on('tb_tipo_experiencia');

        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_carreira_profissional');
    }
}
