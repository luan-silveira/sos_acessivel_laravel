<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Viatura;
use App\Model\Admin\ViaturaMarcas ;
use App\Model\Admin\ViaturaModelos ;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ViaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $viaturas = Viatura::paginate(15);
        $title = 'Viaturas';
        return view('admin.viaturas.index')
                ->with('title', $title)
                ->with('viaturas', $viaturas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
        $js = asset('js/admin/viaturas/formViatura.js');
        $marcas= ViaturaMarcas::orderBy('nome')->get();
        $modelos = ViaturaModelos::orderBy('nome')->get();
        $title = 'Viaturas';
        return view('admin.viaturas.create')
                ->with('js', $js)
                ->with('title', $title)
                ->with('marcas', $marcas)
                ->with('modelos', $modelos);
    }
    
    public function getModelos(Request $request){
        $idMarca = $request->id_marca;
        $modelos = ViaturaModelos::where('id_marca' ,'=', $idMarca )->orderBy('nome')->get();

        return view('admin.viaturas.create')
                ->with('modelos', $modelos)
                ->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $viatura = new Viatura();
        $viatura->placa = $request->placa;
        $viatura->ano = $request->ano;
        $viatura->id_modelo = $request->id_modelo;
        $viatura->save();
        
        Session::flash('message', 'Viatura cadastrada!');
        return Redirect::to('admin/viaturas');
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
    public function edit($id) {
        $viatura = Viatura::findOrFail($id);
        $js = asset('js/admin/viaturas/formViatura.js');
        $marcas= ViaturaMarcas::orderBy('nome')->get();
        $modelos = ViaturaModelos::where('id_marca', '=', $viatura->modelo->marca->id)->orderBy('nome')->get();
        $title = 'Viaturas';
        return view('admin.viaturas.edit')
                ->with('js', $js)
                ->with('title', $title)
                ->with('marcas', $marcas)
                ->with('modelos', $modelos)
                ->with('viatura', $viatura);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $viatura = Viatura::findOrFail($id);
        $viatura->placa = $request->placa;
        $viatura->ano = $request->ano;
        $viatura->id_modelo = $request->id_modelo;
        $viatura->save();
        
        Session::flash('message', 'Viatura cadastrada!');
        return Redirect::to('admin/viaturas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Viatura::destroy($id);
        Session::flash('message', 'Viatura excluída!');
        return Redirect::to('admin/viaturas');
    }
}
