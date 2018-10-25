<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $this->call(EstadoSeeder::class);
        $this->call(InstituicaoOrgaoSeeder::class);
        $this->call(InstituicaoAtendimentoSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ClassificacaoOcorrenciaSeeder::class);
        $this->call(TipoOcorrenciaSeeder::class);
    }
}
