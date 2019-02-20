<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Ocorrencia;

class Paciente extends Model{
    protected $table = 'pacientes';
    protected $fillable = ['nome', 'data_nascimento', 'tipo_sanguineo',
        'fator_rh_sanguineo', 'endereco', 'informacoes_medicas', '_key'];

    public function ocorrencias(){
        return $this->hasMany(Ocorrencia::class, 'id');
    }

    public function dataNascimento(){
        return date('d/m/Y', strtotime($this->data_nascimento));
    }
    
    public function isBloqueado(): bool{
        return ($this->is_bloqueado == 1);
    }
    
    public function rules(){
        return [
            'nome' => 'required|string',
            '_key' => 'unique:pacientes,_key' . (!$this->id ?: ",$this->id")
        ];
    }
}
