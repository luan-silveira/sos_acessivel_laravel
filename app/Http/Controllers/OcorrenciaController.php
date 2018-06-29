<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Ocorrencia;
use App\Model\Admin\TipoOcorrencia;
use Illuminate\Support\Facades\Auth;
use App\Model\Admin\Viatura;
use App\Http\Ajax;

class OcorrenciaController extends Controller {
    
    public function index(){
        $title = 'Ocorrencias';
        $ocorrencias = Ocorrencia::paginate(10);
        
        return view('ocorrencias.index')
                ->with('title', $title)
                ->with('ocorrencias', $ocorrencias);
    }

    public function filtroStatus($status){
        $title = 'Ocorrências';
        $ocorrencias = Ocorrencia::where('status', '=', $status)->paginate(10);
        
        return view('ocorrencias.index')
                ->with('title', $title)
                ->with('ocorrencias', $ocorrencias);
    }
    
    public function detalhes($id){
        $title = 'Ocorrencias';
        $ocorrencia = Ocorrencia::findOrFail($id);
        $paciente = $ocorrencia->paciente;
        
        return view('ocorrencias.detalhes')
                ->with('title', $title)
                ->with('ocorrencia', $ocorrencia)
                ->with('paciente', $paciente);
    }
    
    public function atenderOcorrencia($id){
        $js = asset('js/ocorrencias/formOcorrenciaAtendimento.js');
        $id_instituicao = Auth::user()->instituicao->id;
        $title = 'Atendimento ocorrência '.$id;
        $ocorrencia = Ocorrencia::findOrFail($id);
        $paciente = $ocorrencia->paciente;
        $viaturas = Viatura::where('id_instituicao', '=', $id_instituicao)->get();
        
        $ocorrencia->status = 1;
        $ocorrencia->id_instituicao = $id_instituicao;
        $ocorrencia->save();
        
        return Ajax::modalView(
            view('ocorrencias.atendimento')
                ->with('js', $js)
                ->with('title', $title)
                ->with('ocorrencia', $ocorrencia)
                ->with('paciente', $paciente)
                ->with('viaturas', $viaturas)
        );
    }
}
