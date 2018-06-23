{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', $title.' - SOS Acessível')

@section('content_header')
    <h1>{{$title}}</h1>
@stop

@section('content')
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de instituicoes</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                   <div class="input-group-btn">
                    <a href="{{route('instituicoes-atendimento.create')}}" class="btn btn-default pull-right"><i class="fa fa-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
               @if (count($instituicoes) === 0)
               <div class=" box-comment center-block ">Não há registros cadastrados.</div>
               @else
                <tbody><tr>
                  <th>Código</th>
                  <th>Nome</th>
                  <th>Órgão da instituição</th>
                  <th>Estado</th>
                  <th>Ações</th>
                </tr>
                    @foreach($instituicoes as $instituicao)
                    <tr>
                      <td>{{$instituicao->id}}</td>
                      <td>{{$instituicao->nome}}</td>
                      <td>{{$instituicao->orgao->nome }}</td>
                      <td>{{$instituicao->estado->nome." (".$instituicao->estado->sigla.")"}}</td>
                      <td>{{$instituicao->ano}}</td>
                      <td>
                          <form action="{{route('instituicoes-atendimento.destroy', $instituicao->id)}}" method="POST">
                               <a class="btn btn-xs btn-warning" href="{{route('instituicoes.edit', $instituicao->id)}}">Editar</a>
                              {{method_field('DELETE')}}
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-xs btn-danger" href="">Excluir</button>
                          </form>
                      </td>
                    </tr>
                    @endforeach
                @endif
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
<div class=""></div>

<div class="footer">{{$instituicoes->links()}}</div> 
@stop
      

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   
@stop