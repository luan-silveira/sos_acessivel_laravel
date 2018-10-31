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
                       <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal "id="bt-novo"><i class="fa fa-plus"></i></button>
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
                      <td>
                          <form action="{{route('instituicoes-atendimento.destroy', $instituicao->id)}}" method="POST">
                              <button type="button" class="btn btn-xs btn-warning btn-editar" data-id="{{$instituicao->id}}">Editar</button>
                              {!! csrf_field() !!}
                              <button type="button" class="btn btn-xs btn-danger btn-excluir" data-id="{{$instituicao->id}}">Excluir</button>
                          </form>
                      </td>
                    </tr>
                    @endforeach
                @endif
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>

<!--Modal--> 
<div class="modal fade" id="modal">
    <div class="modal-body">    
        <div class="modal-content box box-widget center-block" style="max-width: 800px;" >
        <div class="box-header with-border">
          <h3 id="titulo" class="box-title">Cadastrar nova instituição</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form id="formModal" role="form">
            {!! csrf_field() !!}
            
          <div class="box-body">
          <input type="hidden" id="id_instituicao">
            <div class="form-group has-feedback {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}"
                       placeholder="Digite o nome">
                @if ($errors->has('nome'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nome') }}</strong>
                    </span>
                @endif
            </div>
              
             <div class="form-group">
                <label for="id_instituicao_orgao">Órgão da instituição</label>
                <select class ="form-control" name="id_instituicao_orgao" id="id_instituicao_orgao">
                    <option>Selecione a instituição...</option>
                @foreach ($orgaos as $orgao)
                    <option value="{{ $orgao->id }}">{{ $orgao->nome}}</option>
                @endforeach
                </select>
            </div>
              
             <div class="form-group">
                <label for="id_estado">Estado</label>
                <select class ="form-control" name="id_estado" id="id_estado">
                    <option>Selecione o estado...</option>
                @foreach ($estados as $estado)
                    <option value="{{ $estado->id }}">{{ $estado->nome}}</option>
                @endforeach
                </select>
            </div>
                       
        </div>
          <!-- /.box-body -->

          <div class="box-footer">
              <div class="box-group pull-right">
                  <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button id="btSubmit" type="button" class="btn btn-danger">Salvar</button>
              </div>
          </div>
        </form>
      </div>
    </div>
</div>

<div class="modal fade" id="modalExcluir">

<form id="formModalExcluir" role="form">
            {!! csrf_field() !!}
       <div class="box-body">
       </div>
</form>

</div>

<div class="footer">{{$instituicoes->links()}}</div> 
@stop
      

@section('css')
   
@stop

@section('js')
<script src="{{asset('js/admin/instituicoes_atendimento/index.js')}}"></script>
@stop