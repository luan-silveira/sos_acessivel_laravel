<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Paciente;
use App\Model\TipoOcorrencia;

class Ocorrencia extends Model {

    protected $table = 'ocorrencias';
    protected $guarded = ['id']; 
    protected $fillable = ['_key', 'id_tipo_ocorrencia', 'id_paciente', 'descricao', 'localizacao', 'latitude', 'longitude',
        'status', 'data_ocorrencia', 'mensagem_atendente'];
    public function paciente(){
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
    
    public function tipo(){
        return $this->belongsTo(TipoOcorrencia::class, 'id_tipo_ocorrencia');
    }
    
    public function dataOcorrencia(){
        return date('d/m/Y H:i:s', strtotime($this->data_ocorrencia));
    }
    
    public function descricaoStatus(){
        $status = "";
        switch($this->status){
            case(1):
                $status = "Atendida";
                break;
            case(2):
                $status = "Finalizada";
                break;
            default:
                $status = "Em aberto";
        }
        
        return $status;
    }
}
