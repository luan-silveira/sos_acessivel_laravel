<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
       DB::insert("INSERT INTO estados(nome, sigla) VALUES " .
                    "('Acre', 'AC')," .
                    "('Alagoas', 'AL')," .
                    "('Amapá', 'AP')," .
                    "('Amazonas', 'AM')," .
                    "('Bahia', 'BA')," .
                    "('Ceará', 'CE')," .
                    "('Distrito Federal', 'DF')," .
                    "('Espírito Santo', 'ES')," .
                    "('Goiás', 'GO')," .
                    "('Maranhão', 'MA')," .
                    "('Mato Grosso', 'MT')," .
                    "('Mato Grosso do Sul', 'MS')," .
                    "('Minas Gerais', 'MG')," .
                    "('Pará', 'PA')," .
                    "('Paraíba', 'PB')," .
                    "('Paraná', 'PR')," .
                    "('Pernambuco', 'PE')," .
                    "('Piauí', 'PI')," .
                    "('Rio de Janeiro', 'RJ')," .
                    "('Rio Grande do Norte', 'RN')," .
                    "('Rio Grande do Sul', 'RS')," .
                    "('Rondônia', 'RO')," .
                    "('Roraima', 'RR')," .
                    "('Santa Catarina', 'SC')," .
                    "('São Paulo', 'SP')," .
                    "('Sergipe', 'SE')," .
                    "('Tocantins', 'TO')"
        );
    }
}
