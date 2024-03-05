<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbFuncionalidadesTable extends Migration
{
    public function up()
    {
        Schema::create('tb_funcionalidades', function (Blueprint $table) {
            $table->id()->nullable(false)->comment('Cheve Primária da tabela tb_funcionlidades');
            $table->string('no_funcionalidade', 50)->nullable(false)->comment('Nome da funcionalidade');
            $table->timestamps();
            $table->softDeletes()->nullable(true)->comment('Data delete do registro');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_funcionalidades');
    }
}
