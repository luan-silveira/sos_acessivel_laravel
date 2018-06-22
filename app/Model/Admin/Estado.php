<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model{
    
    protected $table = 'estados';

    protected $guarded = ['id'];
    
    protected $fillable = ['nome', 'sigla'];
}
