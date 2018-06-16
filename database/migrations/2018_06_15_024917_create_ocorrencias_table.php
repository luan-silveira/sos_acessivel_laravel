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
            $table->text('descricao');
            $table->text('localizacao');
            $table->double('latitude', 5, 5);
            $table->double('longitude', 5, 5);
            $table->timestamp('data_ocorrencia');
            $table->enum('status', [1,2,3,4,5]);
            $table->integer('id_instituicao');
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_tipo_ocorrencia')->references('id')->on('tipo_ocorrencias');
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
        Schema::dropIfExists('ocorrencias');
    }
}
