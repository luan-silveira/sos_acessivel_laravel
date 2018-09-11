<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_ocorrencia');
            $table->unsignedInteger('id_paciente');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_instituicao');
            $table->text('observacoes')->nullable();
            $table->text('mensagem_atendente')->nullable();
            $table->foreign('id_ocorrencia')->references('id')->on('ocorrencias');
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_instituicao')->references('id')->on('instituicao_atendimentos');
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
        Schema::dropIfExists('atendimentos');
    }
}
