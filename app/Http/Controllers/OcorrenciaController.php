<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Ocorrencia;
use Illuminate\Support\Facades\Auth;
use App\Http\Ajax;
use App\Model\Atendimento;
use Illuminate\Http\Request;

class OcorrenciaController extends Controller {
    
    public function index(){
        $id_orgao = Auth::user()->instituicao->id_instituicao_orgao;
        $title = 'Ocorrencias';
        $ocorrencias = Ocorrencia::whereIn('id_tipo_ocorrencia', function($query) use ($id_orgao){
            $query->select('id')
                  ->from('tipo_ocorrencias')
                  ->where('id_instituicao_orgao', '=', $id_orgao);
        })->paginate(10);
        
        return view('ocorrencias.index')
                ->with('title', $title)
                ->with('ocorrencias', $ocorrencias);
    }

    public function filtroStatus($status){
        if(!in_array($status, ['0', '1', '2', '3'])){
            abort(404);
        } else {
            $title = 'Ocorrências';
            $id_orgao = Auth::user()->instituicao->id_instituicao_orgao;
            $ocorrencias = Ocorrencia::whereIn('id_tipo_ocorrencia', function($query) use ($id_orgao){
                $query->select('id')
                      ->from('tipo_ocorrencias')
                      ->where('id_instituicao_orgao', '=', $id_orgao);
            })->where('status', '=', $status)
              ->paginate(10);

            return view('ocorrencias.index')
                    ->with('title', $title)
                    ->with('ocorrencias', $ocorrencias);
        }
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
        
        $ocorrencia->status = '1';
        $ocorrencia->id_instituicao = $id_instituicao;
        $ocorrencia->save();
        
        return Ajax::modalView(
            view('ocorrencias.atendimento')
                ->with('js', $js)
                ->with('title', $title)
                ->with('ocorrencia', $ocorrencia)
                ->with('paciente', $paciente)
        );
    }
    
    public function finalizarOcorrencia(Request $request){
        $ocorrencia = Ocorrencia::findOrFail($request->id);
        $atendimento = Atendimento::where('id_ocorrencia', '=', $request->id)->first();
        
        $ocorrencia->status = '3';
        $atendimento->status = 1;
        
        $ocorrencia->save();
        $atendimento->save();
        
        return Ajax::modalView("", null, "Atendimento finalizado para esta ocorrência!");
    }
}
