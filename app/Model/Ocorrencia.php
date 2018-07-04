<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\Paciente;
use App\Model\Admin\TipoOcorrencia;
use Mpociot\Firebase\SyncsWithFirebase;

class Ocorrencia extends Model {

    use SyncsWithFirebase;

    protected $table = 'ocorrencias';
    protected $guarded = ['id'];    

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
                $status = "Em atendimento";
                break;
            case(2):
                $status = "Socorro enviado";
                break;
            case(3):
                $status = "Atendida";
                break;
            default:
                $status = "Em aberto";
        }
        
        return $status;
    }
}
