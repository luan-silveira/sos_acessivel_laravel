<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ViaturaModelos extends Model{
    protected $table = 'viatura_modelos';
    protected $guarded = ['id'];    
    protected $fillable = ['id_marca', 'nome'];
    
    public function viaturas(){
        return $this->hasMany(Viatura::class, 'id');
    }
    
    public function marca(){
        return $this->belongsTo(ViaturaMarcas::class, 'id_marca');
    }
}
