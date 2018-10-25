<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\Ocorrencia;

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
}
