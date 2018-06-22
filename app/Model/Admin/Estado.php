<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model{

    protected $table = 'estados';

    public function instituicoes(){
        return $this->hasMany(InstituicaoAtendimento::class, 'id');
    }

}
