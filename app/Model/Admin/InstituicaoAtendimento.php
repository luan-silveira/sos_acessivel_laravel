<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class InstituicaoAtendimento extends Model{
    protected $table = 'instituicao_atendimentos';
    protected $guarded = ['id'];    
    protected $fillable = ['nome', 'orgao_instituicao', 'id_estado'];

    public function estado(){
        return $this->belongsTo(Estado::class, 'id_estado');
    }

    public function usuarios(){
        return $this->hasMany(\App\User::class, 'id');
    }
}
