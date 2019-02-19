<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Paciente;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PacienteController extends Controller{
    
    /**
     * Sincroniza os dados do paciente do Firebase no banco de dados local MySQL.
     *
     * @param  Request  $request
     * @return Response
     */
    
    public function syncFirebase(Request $request){
        
        $dataNascimento = date_create_from_format('d/m/Y', $request->data_nascimento)->format('Y-m-d');
        $request->merge(['data_nascimento' => $dataNascimento]);
        $paciente = Paciente::where('_key', $request->_key)->first();
        $campos = $request->all();
        
        if(!$paciente){
            $paciente = Paciente::create($campos);
        } else if($this->isUpdate($paciente, $request)){
            $paciente->fill($campos);
            $paciente->save();
        }
        
        return response()->json($paciente);
        
    }
    
    public function bloquearPaciente(Request $request){
        $paciente = Paciente::where('_key', $request->_key)->first();
        $paciente->is_bloqueado = !$paciente->is_bloqueado;
        
        $paciente->save();
        
        $message = "O paciente foi ". ($paciente->is_bloqueado ? "" : "des") ."bloqueado";
        
        return response()->json(["message" => $message, "bloqueado" => $paciente->is_bloqueado]);
    }
    
    private function isUpdate(Paciente $paciente, $request){
        $isUpdate = false;
        $atributos = $paciente->getFillable();
        foreach ($atributos as $atributo) {
            $isUpdate = ($isUpdate || ($paciente->{$atributo} != $request->{$atributo}));
            if($isUpdate) { break; }
        }
        
        return $isUpdate;
    }
    
    public function createPacienteApi(Request $request){
        $dataNascimento = Carbon::parse($request->data_nascimento)->format('Y-m-d');
        $request->merge(['data_nascimento' => $dataNascimento]);
        $request->_key = $request->key;
        
        $paciente = Paciente::firstOrNew(['_key' => $request->key], $request->all());
        $request->validate($paciente->rules());
        $paciente->save();
        
        return response()->json($paciente, 200);
        
    }
    
}
