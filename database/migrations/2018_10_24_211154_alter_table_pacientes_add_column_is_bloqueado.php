<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePacientesAddColumnIsBloqueado extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->integer('is_bloqueado')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->dropColumn(['is_bloqueado']);
        });
    }

}
