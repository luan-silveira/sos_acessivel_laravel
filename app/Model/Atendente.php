<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Atendente extends Model {
    protected $table = 'atendentes';

    protected $guarded = ['id'];
    
    protected $fillable = ['nome', 'id_instituicao_atendimento'];
}
