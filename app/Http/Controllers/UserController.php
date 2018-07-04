<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Model\Admin\InstituicaoAtendimento;
use App\Model\Admin\Paciente;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = 'Lista de usuários';
        $usuarios = User::where('id', '<>', Auth::user()->id)
                ->where('id_instituicao', '=', Auth::user()->instituicao->id)
                ->paginate(10);
        return view('admin.users.index', compact(['usuarios', 'title']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique'
        ]);

        if ($validator->fails()) {
            return redirect('admin/usuarios/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $usuario = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tipo' =>  $request->tipo,
            'id_instituicao' =>  $request->id_instituicao,
            'password' => bcrypt($request->password)
        ]);

        $usuario->save();
        Return Redirect::to('admin/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

  
    public function edit() {
        $user = Auth::user();
        $paciente = Paciente::findOrFail($user->id);
        $title = 'Usuário';

        return view('admin.users.edit')
                ->with('user', $user)
                ->with('paciente', $paciente)
                ->with('title', $title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)  {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/usuario')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $user = Auth::user();
        $paciente = Paciente::findOrFail($user->id);

        $paciente->nome = $request->name;
        $paciente->data_nascimento = $request->data_nascimento;
        $paciente->tipo_sanguineo = $request->tipo_sanguineo;
        $paciente->fator_rh_sanguineo = $request->fator_rh_sanguineo;
        $paciente->endereco = $request->endereco;
        $paciente->informacoes_medicas = $request->informacoes_medicas;
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        $paciente->save();

        Return Redirect::to('/');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
