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
            $table->unsignedInteger('id_paciente');
            $table->unsignedInteger('id_tipo_ocorrencia');
            $table->string('descricao')->nullable();
            $table->string('localizacao')->nullable();
            $table->decimal('latitude', 13, 6)->nullable();
            $table->decimal('longitude', 13, 6)->nullable();
            $table->timestamp('data_ocorrencia');
            $table->unsignedInteger('id_user')->nullable();
            $table->text('mensagem_atendente')->nullable();
            $table->foreign('id_paciente')->references('id')->on('pacientes');
            $table->foreign('id_tipo_ocorrencia')->references('id')->on('tipo_ocorrencias');
            $table->foreign('id_user')->references('id')->on('users');
            $table->enum('status', [0,1,2]); //0-Em aberto/1-Em atendimento/2-Socorro enviado/3-Atendida ;
            $table->text('observacoes')->nullable();
            $table->string('_key')->nullable();
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
