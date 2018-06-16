<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtendentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->integer('i_instituicao_atendimento');
            $table->foreign('i_instituicao_atendimento')->references('id')->on('instituicao_atendimentos');
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
        Schema::dropIfExists('atendentes');
    }
}
