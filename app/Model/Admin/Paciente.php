<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\Ocorrencia;
use Mpociot\Firebase\SyncsWithFirebase;

class Paciente extends Model{
    use SyncsWithFirebase;

    protected $table = 'pacientes';
    protected $guarded = ['id'];
    protected $fillable = ['nome','data_nascimento','tipo_sanguineo','fator_rh_sanguineo','endereco','informacoes_medicas'];

    public function ocorrencias(){
        return $this->hasMany(Ocorrencia::class, 'id');
    }

    public function dataNascimento(){
        return date('d/m/Y', strtotime($this->data_nascimento));
    }
}
