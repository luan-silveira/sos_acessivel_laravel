<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model{

    protected $table = 'atendimentos';
    protected $fillable = ['id_ocorrencia', 'id_paciente', 'id_viatura'];
    
}
