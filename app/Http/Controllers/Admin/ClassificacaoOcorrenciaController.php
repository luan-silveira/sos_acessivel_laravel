<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ClassificacaoOcorrencia;

class ClassificacaoOcorrenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $classificacoes = ClassificacaoOcorrencia::all();
        $title = 'Classificações de Ocorrências';
        $data = ['title', 'classificacoes'];
        return view('admin.classificacoes-ocorrencia.index', compact($data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Classificações de Ocorrências';
        return view('admin.classificacoes-ocorrencia.create', compact('title'));
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
        
        return $this->index();
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
    public function edit($id)
    {
        $title = 'Classificações de Ocorrências';
        $classificacao = ClassificacaoOcorrencia::findOrFail($id);
        return view('admin.classificacoes-ocorrencia.edit', compact(['title', 'classificacao']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
