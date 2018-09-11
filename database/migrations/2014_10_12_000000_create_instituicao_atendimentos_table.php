<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituicaoAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicao_atendimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->unsignedInteger('id_estado');
            $table->unsignedInteger('id_instituicao_orgao');
            $table->foreign('id_estado')->references('id')->on('estados');
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
        Schema::dropIfExists('instituicao_atendimentos');
    }
}
