<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Estado;
use App\Model\Admin\InstituicaoOrgao;
use App\Model\Admin\InstituicaoAtendimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InstituicaoAtendimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $instituicoes = InstituicaoAtendimento::paginate(15);
        $title = 'Instituições de atendimento';
        return view('admin.instituicoes-atendimento.index')
                ->with('title', $title)
                ->with('instituicoes', $instituicoes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $orgaos= InstituicaoOrgao::orderBy('nome')->get();
        $estados = Estado::orderBy('nome')->get();
        $title = 'Instituições de atendimento';
        return view('admin.instituicoes-atendimento.create')
                ->with('title', $title)
                ->with('orgaos', $orgaos)
                ->with('estados', $estados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $instituicao = new InstituicaoAtendimento();
        $instituicao->nome = $request->nome;
        $instituicao->id_instituicao_orgao = $request->id_instituicao_orgao;
        $instituicao->id_estado = $request->id_estado;
        $instituicao->save();

        return Redirect::to('admin/instituicoes-atendimento');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InstituicaoAtendimento  $instituicaoAtendimento
     * @return \Illuminate\Http\Response
     */
    public function show(InstituicaoAtendimento $instituicaoAtendimento)
    {
        //
    }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $instituicao = InstituicaoAtendimento::findOrFail($id);
        $orgaos= InstituicaoOrgao::orderBy('nome')->get();
        $estados = Estado::orderBy('nome')->get();
        $title = 'Instituições de atendimento';
        return view('admin.instituicoes-atendimento.edit')
                ->with('title', $title)
                ->with('instituicao', $instituicao)
                ->with('orgaos', $orgaos)
                ->with('estados', $estados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $instituicao = InstituicaoAtendimento::findOrFail($id);
        $instituicao->nome = $request->nome;
        $instituicao->id_instituicao_orgao = $request->id_instituicao_orgao;
        $instituicao->id_estado = $request->id_estado;
        $instituicao->save();

        return Redirect::to('admin/instituicoes-atendimento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        InstituicaoAtendimento::destroy($id);
        return Redirect::to('admin/instituicoes-atendimento');
    }
}
