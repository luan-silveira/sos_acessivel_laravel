<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Paciente;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Model\Admin\InstituicaoAtendimento;

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
    
    public function user() {
        $title = 'Perfil';
        $user = Auth::user();
        $instituicoes = InstituicaoAtendimento::where('id_instituicao_orgao', '=', $user->instituicao->orgao->id)
                 ->get();
        return view('admin.users.edit')
                ->with('title', $title)
                ->with('user', $user)
                ->with('alterarInstituicao', false)
                ->with('instituicoes', $instituicoes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
         $title = 'Criar usuário';
         $instituicoes = InstituicaoAtendimento::where('id_instituicao_orgao', '=', Auth::user()->instituicao->orgao->id)
                 ->get();
         
         return view('admin.users.create')
                 ->with('title', $title)
                 ->with('instituicoes', $instituicoes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required'
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
            'password' => Hash::make($request->password)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::findOrFail($id);
        $paciente = Paciente::findOrFail($user->id);
        $instituicoes = InstituicaoAtendimento::where('id_instituicao_orgao', '=', $user->instituicao->orgao->id)
                 ->get();
        $title = 'Usuário';

        return view('admin.users.edit')
                ->with('user', $user)
                ->with('paciente', $paciente)
                ->with('title', $title)
                ->with('instituicoes', $instituicoes)
                ->with('alterarInstituicao', true);
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
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->tipo =  $request->tipo;
        $user->id_instituicao =  $request->id_instituicao;

        $user->save();

        Return Redirect::to('/');
        //
    }
}
