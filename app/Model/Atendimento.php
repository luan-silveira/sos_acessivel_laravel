<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\Paciente;

class Atendimento extends Model{

    protected $table = 'atendimentos';
    protected $fillable = ['id_ocorrencia', 'id_instituicao', 'id_paciente', 'id_user'];
    
    public function paciente(){
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
    
    public function ocorrencia(){
        return $this->belongsTo(Ocorrencia::class, 'id_ocorrencia');
    }
       
    public function user(){
        return $this->belongsTo(\App\User::class, 'id_user');
    }
    
    public function dataAtendimento(){
        return date('d/m/Y H:i:s', strtotime($this->data_atendimento));
    }
    
    public function descricaoStatus(){
        $status = "";
        switch($this->status){
            case(1):
                $status = "Finalizado";
                break;
            default:
                $status = "Em andamento";                
        }
        
        return $status;
    }
}
