<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PacienteApiController extends Controller {
    
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
