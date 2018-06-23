<?php

namespace App\Model\Admin;

use App\Model\Admin\InstituicaoOrgao;
use App\Model\Admin\TipoOcorrencia;
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
