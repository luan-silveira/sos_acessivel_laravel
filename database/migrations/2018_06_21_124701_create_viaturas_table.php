<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viaturas', function (Blueprint $table) {
            $table->increments('id');
            $table->char('placa', 8);
            $table->integer('id_modelo');
            $table->integer('id_instituicao');
            $table->year('ano');
            $table->foreign('id_modelo')->references('id')->on('viatura_modelos');
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
        Schema::dropIfExists('viaturas');
    }
}
