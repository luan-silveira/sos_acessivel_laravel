<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Viatura extends Model{
    protected $table = 'viaturas';
    protected $guarded = ['id'];    
    protected $fillable = ['placa', 'id_modelo', 'ano'];
    
    public function modelo(){
        return $this->belongsTo(ViaturaModelos::class, 'id_modelo');
    }
    
    public function marca(){
        return $this->modelo()->marca();
    }
}
