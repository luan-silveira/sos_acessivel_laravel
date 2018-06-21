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
            $table->integer('id_ocorrencia');
            $table->integer('id_paciente');
            $table->integer('id_viatura')->nullable();
            $table->foreign('id_ocorrencia')->references('id')->on('ocorrencias');
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_viatura')->references('id')->on('viaturas');
            $table->enum('status', [1,2,3,4]); //1-Em aberto/2-Em atendimento/3-Socorro enviado/4-Atendida ;
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
