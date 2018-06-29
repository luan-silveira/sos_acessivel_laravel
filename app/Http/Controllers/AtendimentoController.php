<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Atendimento;

class AtendimentoController extends Controller{
    
    public function novoAtendimento(){
        $atendimento = new Atendimento();
        
    }
}
