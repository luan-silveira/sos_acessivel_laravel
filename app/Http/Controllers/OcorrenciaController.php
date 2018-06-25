<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Ocorrencia;
use App\Model\Admin\TipoOcorrencia;
use Illuminate\Support\Facades\Auth;

class OcorrenciaController extends Controller {
    
    public function index(){
        $title = 'Ocorrencias';
        $ocorrencias = Ocorrencia::paginate(10);
        
        return view('ocorrencias.index')
                ->with('title', $title)
                ->with('ocorrencias', $ocorrencias);
    }
    
    public function detalhes($id){
        
    }
}
