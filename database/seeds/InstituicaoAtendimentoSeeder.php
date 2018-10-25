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
            'id_instituicao_orgao' => 1,
            'id_estado' => 24
        ]);
        
        InstituicaoAtendimento::create([
            'id' => 2,
            'nome' => 'Instituição Exemplo PM-SC',
            'id_instituicao_orgao' => 2,
            'id_estado' => 24
        ]);
        
        InstituicaoAtendimento::create([
            'id' => 3,
            'nome' => 'Instituição Exemplo SAMU-SC',
            'id_instituicao_orgao' => 3,
            'id_estado' => 24
        ]);
    }
}
