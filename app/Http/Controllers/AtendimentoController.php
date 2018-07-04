<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Atendimento;
use App\Model\Ocorrencia;

class AtendimentoController extends Controller{

    public function index(){
        $title = 'Atendimentos';
        $atendimentos = Atendimento::paginate(10);

        return view('atendimentos.index')
                ->with('title', $title)
                ->with('atendimentos', $atendimentos);
    }
    
    public function store(Request $request){
        $ocorrencia = Ocorrencia::findOrFail($request->id_ocorrencia);
        $ocorrencia->status = 2;
        $ocorrencia->save();

        $atendimento = new Atendimento($request->all());
        $atendmento->save();
    }
}
