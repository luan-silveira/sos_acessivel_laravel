<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;


class TipoOcorrencia extends Model {
    
    public function classificacao(){
        return $this->belongsTo(ClassificacaoOcorrencia::class, 'id_classificacao_ocorrencia');
    }
    
    public function orgao(){
        return $this->belongsTo(InstituicaoOrgao::class, 'id_instituicao_orgao');
    }
    
}
