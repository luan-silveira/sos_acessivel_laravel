<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\ClassificacaoOcorrencia;

class TipoOcorrencia extends Model {
    
    public function classificacao(){
        return $this->belongsTo(ClassificacaoOcorrencia::class, 'id_classificacao_ocorrencia');
    }
    
}
