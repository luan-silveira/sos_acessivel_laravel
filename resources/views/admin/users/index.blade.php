{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', $title.' - '.config('app.name'))

@section('content_header')
    <h1>Usuários</h1>
@stop

@section('content')
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de usuários</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">

                  <div class="input-group-btn">
                    <a href="{{route('usuarios.create')}}" class="btn btn-default pull-right"><i class="fa fa-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Código</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Tipo de usuário</th>
                  <th>Ações</th>
                </tr>
                @foreach($usuarios as $usuario)
                <tr>
                  <td>{{$usuario->id}}</td>
                  <td>{{$usuario->name}}</td>
                  <td>{{$usuario->email}}</td>
                  <td>{{$usuario->tipo == 1 ? 'Administrador' : 'Usuário padrão'}}</td>
                  <td>
                    <form action="{{route('usuarios.destroy', $usuario->id)}}" method="POST">
                       {{method_field('DELETE')}}
                       <a href="{{route('usuarios.edit', $usuario->id)}}" class="btn btn-xs btn-warning">Editar</a>
                      <button type="submit" class="btn btn-xs btn-danger">Excluir</button>
                  </form>
                  </td>
                </tr>
                @endforeach
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
<footer>
    {{$usuarios->links()}}
</footer>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

