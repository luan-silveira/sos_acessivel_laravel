<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Ocorrencia;
use Illuminate\Support\Facades\Auth;
use App\Http\Ajax;
use App\Model\Atendimento;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    
    public function mensagemAtendente(Request $request, $id){
        $js = asset('js/ocorrencias/formOcorrenciaAtendimento.js');
        $title = 'Atendimento ocorrência '.$id;
        $ocorrencia = Ocorrencia::findOrFail($id);
        
        return Ajax::modalView(
            view('ocorrencias.atendimento')
                ->with('js', $js)
                ->with('title', $title)
                ->with('ocorrencia', $ocorrencia)
        );
    }
    
    public function atenderOcorrencia(Request $request){
        $ocorrencia = Ocorrencia::findOrFail($request->id_ocorrencia);
        $ocorrencia->status = '1';
        $ocorrencia->mensagem_atendente = $request->mensagem_atendente;
        $ocorrencia->id_user = Auth::user()->id;
        $ocorrencia->save();
        
        return Ajax::modalView("", null, "Ocorrência atendida");
    }
    
    public function finalizarOcorrencia(Request $request){
        $ocorrencia = Ocorrencia::findOrFail($request->id);
        
        $ocorrencia->status = '2';
        
        $ocorrencia->save();
        
        return Ajax::modalView("", null, "Atendimento finalizado para esta ocorrência!");
    }
    
    /**
     * Sincroniza os dados com o Firebase.
     * 
     * @param Request $request
     * @param string $key
     * @return Response
     */    
    public function syncFirebase(Request $request){
        
        $dataOcorrencia = date_create_from_format('d/m/Y H:i:s', $request->data_ocorrencia)->format('Y-m-d H:i:s');
        $request->merge(['data_ocorrencia' => $dataOcorrencia]);
        $ocorrencia = Ocorrencia::where("_key",  $request->_key)->first();
        $campos = $request->all();
        
        if(!$ocorrencia){
            $ocorrencia = Ocorrencia::create($campos);
        } else if ($this->isUpdate($ocorrencia, $request)){
            $ocorrencia->fill($campos);
            $ocorrencia->save();
        }
        
        return response()->json($ocorrencia);
    }
    
    
    private function isUpdate(Ocorrencia $ocorrencia, $request){
        $isUpdate = false;
        $atributos = $ocorrencia->getFillable();
        foreach ($atributos as $atributo) {
            $isUpdate = ($isUpdate || ($ocorrencia->{$atributo} != $request->{$atributo}));
            if($isUpdate) { break; }
        }
        
        return $isUpdate;
    }
    
}
