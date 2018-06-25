
@extends('adminlte::page')

@section('title', $title.' - Novo - SOS Acessível')

@section('content_header')
 <h1>{{ $title }}</h1>
@stop

@section('content')
    <div class="box box-widget center-block" style="max-width: 800px;" >
        <div class="box-header with-border">
          <h3 class="box-title">Cadastrar nova instituição</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('instituicoes-atendimento.store')}}" method="POST">
            {!! csrf_field() !!}
            
          <div class="box-body">
            <div class="form-group has-feedback {{ $errors->has('nome') ? 'has-error' : '' }}">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="placa" class="form-control" value="{{ old('nome') }}"
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
                <a href="{{route('instituicoes-atendimento.index')}}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-danger">Salvar</button>
              </div>
          </div>
        </form>
      </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop