<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Atendimento;
use App\Model\Ocorrencia;
use App\Model\Admin\Viatura;
use Illuminate\Support\Facades\Redirect;
use App\Http\Ajax;

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
        $ocorrencia->status = '2';
        $ocorrencia->save();

        Atendimento::create([
            'id_ocorrencia' => $request->id_ocorrencia,
            'id_paciente' => $request->id_paciente,
            'id_viatura' => $request->id_viatura,
            'id_instituicao_atendimento' => $request->id_instituicao,
        ]);

        return Ajax::modalView("", null, "Socorro enviado!");
    }
}
