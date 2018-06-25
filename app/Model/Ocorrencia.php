<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\Paciente;
use App\Model\Admin\TipoOcorrencia;

class Ocorrencia extends Model {
    protected $table = 'ocorrencias';
    protected $guarded = ['id'];    

    public function paciente(){
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
    
    public function tipo(){
        return $this->belongsTo(TipoOcorrencia::class, 'id_tipo_ocorrencia');
    }
}
