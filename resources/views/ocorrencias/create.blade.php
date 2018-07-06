
@extends('adminlte::page')

@section('title', $title.' - Nova - SOS Acessível')

@section('content_header')
 <h1>{{ $title }}</h1>
@stop

@section('content')
    <div class="box box-widget center-block" style="max-width: 800px;" >
        <div class="box-header with-border">
          <h3 class="box-title">Solicitar nova ocorrência</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('ocorrencias.store')}}" method="POST">
            {!! csrf_field() !!}
            
          <div class="box-body">
                          
             <div class="form-group">
                <label for="id_classificacao">Classificação</label>
                <select class ="form-control" id="id_classificacao">
                @foreach ($classificacoes as $classificacao)
                    <option value="{{ $classificacao->id }}">{{ $classificacao->descricao}}</option>
                @endforeach
                </select>
            </div>
            
            <div class="form-group has-feedback {{ $errors->has('id_tipo_ocorrencia') ? 'has-error' : '' }}">
                <label for="id_tipo_ocorrencia">Tipo</label>
                <select class ="form-control" name="id_tipo_ocorrencia" id="id_tipo">
                    @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->descricao}}</option>
                    @endforeach
                </select>
                @if ($errors->has('id_tipo_ocorrencia'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_tipo_ocorrencia') }}</strong>
                    </span>
                @endif
            </div>
              
            <div class="form-group has-feedback {{ $errors->has('descricao') ? 'has-error' : '' }}">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" id="descricao" class="form-control" value="{{ old('descricao') }}"
                       placeholder="Descrição da ocorrência">
                @if ($errors->has('descricao'))
                    <span class="help-block">
                        <strong>{{ $errors->first('descricao') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group has-feedback {{ $errors->has('localizacao') ? 'has-error' : '' }}">
                <label for="localizacao">Descrição da localização</label>
                <textarea name="localizacao" id="localizacao" class="form-control">{{ old('localizacao') }}</textarea>
                
                @if ($errors->has('localizacao'))
                    <span class="help-block">
                        <strong>{{ $errors->first('localizacao') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group">  
                <label for="mapa">Localização atual</label>
                <div id="mapa" name="mapa" style="height: 360px"></div>
            </div>
            
             <input type="hidden" name="id_paciente" value="{{Auth::user()->id}}">
             <input type="hidden" name="latitude" id ="latitude" value="-28.7419455">
             <input type="hidden" name="longitude" id ="longitude" value="-49.5005373">
        </div>
          <!-- /.box-body -->

          <div class="box-footer">
              <div class="box-group pull-right">
                <a href="/ocorrencias" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-danger">Solicitar socorro</button>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW8GdR82WyvV2dLVrpsRlMy0_EPDh8wxI&callback=initMap">
    </script>
@stop