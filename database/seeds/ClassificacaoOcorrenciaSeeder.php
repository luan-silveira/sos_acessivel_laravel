<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassificacaoOcorrenciaSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::insert('INSERT INTO classificacao_ocorrencias VALUES '
	."(1,'Acidentes e traumas',NULL,NULL),"
	."(2,'Emergências médicas',NULL,NULL),"
	."(3,'Emergências policiais',NULL,NULL),"
	."(4,'Resgates/Desastres naturais',NULL,NULL),"
	."(5,'Risco imediato à vida',NULL,NULL),"
	."(6,'Outros',NULL,NULL)");
    }

}
