<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ClassificacaoOcorrencia;
use Illuminate\Support\Facades\Redirect;

use App\Http\Ajax;

class ClassificacaoOcorrenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $js = asset('js/admin/classificacoes-ocorrencia/index.js');
        $classificacoes = ClassificacaoOcorrencia::all();
        $title = 'Classificações de Ocorrências';
        return view('admin.classificacoes-ocorrencia.index')
                ->with('title', $title)
                ->with('js', $js)
                ->with('classificacoes', $classificacoes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $js = asset('js/admin/classificacoes-ocorrencia/formClassificacaoOcorrencia.js');
        $title = 'Classificações de Ocorrências';
        return Ajax::modalView(view('admin.classificacoes-ocorrencia.create')
                ->with('title', $title)
                ->with('js', $js)
                );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {   
       
        $classsificacao = new ClassificacaoOcorrencia();
        $classsificacao->descricao = $request->descricao;
        $classsificacao->save();
        
        
    return Ajax::modalView(Redirect::to('admin/classificacao-ocorrencia'));
        //return response()->json(['ajaxMessage' => 'Cadastrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $js = asset('js/admin/classificacoes-ocorrencia/formClassificacaoOcorrencia.js');
        $title = 'Classificações de Ocorrências';
        $classificacao = ClassificacaoOcorrencia::findOrFail($id);
        return Ajax::modalView(view('admin.classificacoes-ocorrencia.edit')
                ->with('title', $title)
                ->with('js', $js)
                ->with('classificacao', $classificacao)
                );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
         $rules = array(
            'descricao' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/classificacoes-ocorrencia/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $classificacao = ClassificacaoOcorrencia::find($id);
            $classificacao->descricao = Input::get('descricao');
            $classificacao->save();

            // redirect
            Session::flash('message', 'Classificação atualizada!');
            return Redirect::to('admin/classificacao-ocorrencia');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)  {
        ClassificacaoOcorrencia::destroy($id);
        
         return Redirect::to('admin/classificacao-ocorrencia');
    }
}
