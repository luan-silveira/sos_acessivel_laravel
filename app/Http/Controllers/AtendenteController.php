<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Atendente;
use App\Http\Controllers\Controller;

class AtendenteController extends Controller {
 
    public function index(){
        
        $atendentes = Atendente::all();
        return view('admin.atendente.index', compact('atendentes'));
    }
    
    
    public function create(){
        return $this->view('');
    }
    
    public function postAtendente(){
        
    }
}
