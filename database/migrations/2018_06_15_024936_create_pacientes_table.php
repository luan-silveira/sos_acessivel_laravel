<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->date('data_nascimento');
            $table->enum('tipo_sanguineo', ['A', 'B', 'AB', 'O']);
            $table->enum('fator_rh_sanguineo', ['Positivo', 'Negativo']);
            $table->text('endereco');
            $table->text('informacoes_medicas'); 
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
        Schema::dropIfExists('pacientes');
    }
}
