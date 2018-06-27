
@extends('adminlte::page')

@section('title', $title.' - Novo - SOS Acessível')

@section('content_header')
 <h1>{{ $title }}</h1>
@stop

@section('content')
    <div class="box box-widget center-block" style="max-width: 800px;" >
        <div class="box-header with-border">
          <h3 class="box-title">Cadastrar nova viatura</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('viaturas.store')}}" method="POST">
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
              
             <div class="form-group">
                <label for="id_marca">Marca</label>
                <select class ="form-control" id="id_marca">
                    <option>Selecione a marca...</option>
                @foreach ($marcas as $marca)
                    <option value="{{ $marca->id }}">{{ $marca->nome}}</option>
                @endforeach
                </select>
            </div>
            
            <div class="form-group has-feedback {{ $errors->has('id_modelo') ? 'has-error' : '' }}">
                <label for="id_modelo">Modelo</label>
                <select class ="form-control" name="id_modelo" id="id_modelo">
                    <option value=""></option>
                </select>
                @if ($errors->has('id_modelo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_modelo') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group has-feedback {{ $errors->has('ano') ? 'has-error' : '' }}">
                <label for="ano">Ano</label>
                <input type="number" name="ano" id="ano" class="form-control" value="{{ old('ano') }}">
                
                @if ($errors->has('data_aquisição'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ano') }}</strong>
                    </span>
                @endif
            </div>
            
           <input type="hidden" name="id_instituicao" value="{{ Auth::user()->instituicao->id }}">
        </div>
          <!-- /.box-body -->

          <div class="box-footer">
              <div class="box-group pull-right">
                <a href="{{route('viaturas.index')}}" class="btn btn-default">Cancelar</a>
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
    <script src="{{ $js }}"></script>
@stop