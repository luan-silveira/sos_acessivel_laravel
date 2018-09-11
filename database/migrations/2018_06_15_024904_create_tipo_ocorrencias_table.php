<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_ocorrencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 100);
            $table->unsignedInteger('id_classificacao_ocorrencia');
            $table->unsignedInteger('id_instituicao_orgao');
            $table->foreign('id_classificacao_ocorrencia')->references('id')->on('classificacao_ocorrencias');
            $table->foreign('id_instituicao_orgao')->references('id')->on('instituicao_orgaos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_ocorrencias');
    }
}
