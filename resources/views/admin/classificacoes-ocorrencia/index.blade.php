{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', $title.' - SOS Acessível')

@section('content_header')
    <h1>Classificações de Ocorrência</h1>
@stop

@section('content')
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de classificações</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                   <div class="input-group-btn">
                    <a href="javascript:openModalNovaClassificacaoOcorrencia()" class="btn btn-default pull-right"><i class="fa fa-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
               @if (count($classificacoes) === 0)
               <div class=" box-comment ">Não há registros cadastrados.</div>
               @else
                <tbody><tr>
                  <th>Código</th>
                  <th>Descrição</th>
                  <th>Ação</th>
                </tr>
                    @foreach($classificacoes as $classificacao)
                    <tr>
                      <td>{{$classificacao->id}}</td>
                      <td>{{$classificacao->descricao}}</td>
                      <td>
                          <a class="btn btn-xs btn-warning" href="javascript:openModalEditarClassificacaoOcorrencia({{ $classificacao->id}})">Editar</a>
                          <a class="btn btn-xs btn-danger" href="javascript:excluirClassificacaoOcorrencia({{ $classificacao->id}})">Excluir</a>
                      </td>
                    </tr>
                    @endforeach
                @endif
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ $js }}"></script>
@stop