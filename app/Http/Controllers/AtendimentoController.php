<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Atendimento;
use App\Model\Ocorrencia;
use App\Http\Ajax;

class AtendimentoController extends Controller{

    public function index(){
        $title = 'Atendimentos';
        $atendimentos = Atendimento::paginate(10);

        return view('atendimentos.index')
                ->with('title', $title)
                ->with('atendimentos', $atendimentos);
    }
    
    public function filtroStatus($status){
        if(!in_array($status, ['0', '1'])){
            abort(404);
        } else {
            $title = 'Atendimentos';
            $atendimentos = Atendimento::where('status', '=', $status)->paginate(10);

            return view('atendimentos.index')
                    ->with('title', $title)
                    ->with('atendimentos', $atendimentos);
        }
    }
    
    public function store(Request $request){
        $ocorrencia = Ocorrencia::findOrFail($request->id_ocorrencia);
        $ocorrencia->status = '2';
        $ocorrencia->save();

        Atendimento::create($request->all());

        return Ajax::modalView("", null, "Socorro enviado!");
    }
}
