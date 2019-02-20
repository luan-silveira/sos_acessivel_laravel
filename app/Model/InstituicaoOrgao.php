<?php

namespace App\Model;

use App\Model\InstituicaoOrgao;
use App\Model\TipoOcorrencia;
use Illuminate\Database\Eloquent\Model;

class InstituicaoOrgao extends Model {
    protected $table = 'instituicao_orgaos';
    protected $fillable = ['nome'];
    
    public function instituicoes(){
        return $this->hasMany(InstituicaoOrgao::class, 'id');
    }

    public function tipos_ocorrencia(){
        return $this->hasMany(TipoOcorrencia::class, 'id');
    }
}
