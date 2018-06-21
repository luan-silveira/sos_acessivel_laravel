<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class InstituicaoAtendimento extends Model{
    protected $table = 'instituicao_atendimentos';

    protected $guarded = ['id'];
    
    protected $fillable = ['nome'];
}
