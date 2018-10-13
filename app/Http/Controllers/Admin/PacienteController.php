<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Paciente;
use App\Http\Controllers\Controller;

class PacienteController extends Controller{
    
    /**
     * Sincroniza os dados do paciente do Firebase no banco de dados local MySQL.
     *
     * @param  Request  $request
     * @param  int $id
     * @return Response
     */
    
    public function syncFirebase(Request $request, $id){
        
        $dataNascimento = date_create_from_format('d/m/Y', $request->data_nascimento)->format('Y-m-d');
        $request->merge(['data_nascimento' => $dataNascimento]);
        $campos = $request->except('_token');
        $query = Paciente::where('id', $id);
        $paciente = $query->first();
        
        if($paciente == null){
            Paciente::create($campos);
        } else if($this->isUpdate($paciente, $request)){
            $query->update($campos);
        }
        
        return \App\Http\Ajax::modalView("");
        
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
    
}
