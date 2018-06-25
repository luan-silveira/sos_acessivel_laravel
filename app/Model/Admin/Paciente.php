<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\Ocorrencia;

class Paciente extends Model{
    protected $table = 'pacientes';
    protected $guarded = ['id'];    

    public function ocorrencias(){
        return $this->hasMany(Ocorrencia::class, 'id');
    }
}
