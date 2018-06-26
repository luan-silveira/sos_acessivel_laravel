<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_paciente');
            $table->integer('id_tipo_ocorrencia');
            $table->text('descricao')->nullable();
            $table->text('localizacao');
            $table->decimal('latitude', 13, 6)->nullable();
            $table->decimal('longitude', 13, 6)->nullable();
            $table->timestamp('data_ocorrencia');
            $table->integer('id_instituicao')->nullable;
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_tipo_ocorrencia')->references('id')->on('tipo_ocorrencias');
            $table->foreign('id_instituicao')->references('id')->on('instituicao_atendimentos');
            $table->enum('status', [0,1,2,3]); //0-Em aberto/1-Em atendimento/2-Socorro enviado/4-Atendida ;
            $table->text('observacoes');
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
        Schema::dropIfExists('ocorrencias');
    }
}
