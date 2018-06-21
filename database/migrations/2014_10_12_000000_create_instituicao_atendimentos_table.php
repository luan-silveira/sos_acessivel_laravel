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
            $table->enum('orgao_instituicao', [1,2,3]);//1-Corpo de Bombeiros Mililtar/2-SAMU/3-Polícia Militar
            $table->integer('id_estado');
            $table->foreign('id_estado')->references('id')->on('estados');
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
