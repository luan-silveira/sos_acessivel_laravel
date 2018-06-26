<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\ClassificacaoOcorrencia;

class TipoOcorrencia extends Model {
    
    public function classificacao(){
        return $this->belongsTo(ClassificacaoOcorrencia::class, 'id_classificacao_ocorrencia');
    }
    
}
