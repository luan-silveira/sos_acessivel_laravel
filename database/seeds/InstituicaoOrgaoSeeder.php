<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstituicaoOrgaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::insert("INSERT INTO instituicao_orgaos (id, nome) VALUES "
                . "(1,'Corpo de Bombeiros Militar'),"
                . "(2,'Polícia Militar'),"
                . "(3,'Serviço de Atendimento Móvel de Urgência');"
                );
    }
}
