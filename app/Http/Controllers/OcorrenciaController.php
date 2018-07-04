<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Ocorrencia;
use App\Model\Admin\TipoOcorrencia;
use App\Model\Admin\ClassificacaoOcorrencia;
use Illuminate\Support\Facades\Auth;
use App\Model\Admin\Viatura;
use App\Http\Ajax;
use Illuminate\Support\Facades\Redirect;

class OcorrenciaController extends Controller {
    
    public function index(){
        $title = 'Ocorrências';
        $ocorrencias = Ocorrencia::where('id_paciente', '=', Auth::user()->id)->paginate(10);
        
        return view('ocorrencias.index')
                ->with('title', $title)
                ->with('ocorrencias', $ocorrencias);
    }
    
    public function create(){
        $title = 'Ocorrências';
        $classificacoes = ClassificacaoOcorrencia::all();
        $tipos = TipoOcorrencia::where('id_classificacao_ocorrencia', '=', 1)->get();
        $js = asset('js/ocorrencias/formNovaOcorrencia.js');
        
        return view('ocorrencias.create')
                ->with('title', $title)
                ->with('classificacoes', $classificacoes)
                ->with('tipos', $tipos)
                ->with('js', $js);
    }
    
    public function store(Request $request){
        Ocorrencia::create([
            'id_paciente' => $request->id_paciente,
            'id_tipo_ocorrencia' => $request->id_tipo_ocorrencia,
            'localizacao' => $request->localizacao,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => '0',            
        ]);
        
        return Redirect::to('ocorerncias');
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
