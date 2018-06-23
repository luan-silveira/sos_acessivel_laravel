<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\InstituicaoAtendimento;
use Illuminate\Http\Request;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \App\InstituicaoAtendimento  $instituicaoAtendimento
     * @return \Illuminate\Http\Response
     */
    public function edit(InstituicaoAtendimento $instituicaoAtendimento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InstituicaoAtendimento  $instituicaoAtendimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InstituicaoAtendimento $instituicaoAtendimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InstituicaoAtendimento  $instituicaoAtendimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstituicaoAtendimento $instituicaoAtendimento)
    {
        //
    }
}
