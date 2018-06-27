@extends('adminlte::page')

@section('title', $title.' - SOS Acessível')

@section('content_header')
    <h1>{{$title}}</h1>
@stop

@section('content')
    <div class="box box-widget center-block" style="max-width: 800px;" >
        <div class="box-header with-border">
          <h3 class="box-title">Atender ocorrência</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('ocorrencias.store')}}" method="POST">
            {!! csrf_field() !!}
            
          <div class="box-body">
            <div class="form-group has-feedback {{ $errors->has('placa') ? 'has-error' : '' }}">
                <label for="placa">Placa do veículo</label>
                <input type="text" name="placa" id="placa" class="form-control" value="{{ old('placa') }}"
                       placeholder="Digite a placa do veículo">
                @if ($errors->has('placa'))
                    <span class="help-block">
                        <strong>{{ $errors->first('placa') }}</strong>
                    </span>
                @endif
            </div>
              
            
           <input type="hidden" name="id_instituicao" value="{{ Auth::user()->instituicao->id }}">
        </div>
          <!-- /.box-body -->

          <div class="box-footer">
              <div class="box-group pull-right">
                <a href="{{route('ocorrencias.index')}}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-danger">Salvar</button>
              </div>
          </div>
        </form>
      </div>

<div class="footer">{{$ocorrencias->links()}}</div> 
@stop
      

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   
@stop
