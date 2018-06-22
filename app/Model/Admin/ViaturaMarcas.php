<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ViaturaMarcas extends Model {
    protected $table = 'viatura_marcas';
    protected $guarded = ['id'];    
    protected $fillable = ['nome'];
        
    public function modelos(){
        return $this->hasMany(ViaturaModelos::class, 'id');
    }
}
