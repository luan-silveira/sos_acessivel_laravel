<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\InstituicaoAtendimento;
class InstituicaoAtendimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()  {
        InstituicaoAtendimento::create([
            'id' => 1,
            'nome' => 'Instituição Exemplo CBM-SC',
            'instituicao_orgao' => 1,
            'id_estado' => 24
        ]);
    }
}
