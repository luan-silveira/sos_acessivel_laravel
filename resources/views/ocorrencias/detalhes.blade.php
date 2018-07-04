@extends('adminlte::page')

@section('title', $title.' - SOS Acessível')

@section('content_header')
    <h1>{{$title}}</h1>
@stop

@section('content')

  <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Dados da ocorrência</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <dl>
          <dt>Classificação</dt>
          <dd>{{$ocorrencia->tipo->classificacao->id.' - '.$ocorrencia->tipo->classificacao->descricao}}</dd>
          <dt>Tipo</dt>
          <dd>{{$ocorrencia->tipo->id.' - '.$ocorrencia->tipo->descricao}}</dd>
          <dt>Descrição da ocorrência</dt>
          <dd>{{$ocorrencia->descricao}}</dd>
          <dt>Descrição da localidade</dt>
          <dd>{{$ocorrencia->localizacao}}</dd>
          <dt>Data da solicitação</dt>
          <dd>{{$ocorrencia->dataOcorrencia()}}</dd>
        </dl>
      </div>
      <!-- /.box-body -->
  </div>


<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Localização no mapa</h3>
    </div>
    <div class="box-body">
        @if($ocorrencia->latitude == null || $ocorrencia->longitude == null)
        <p>Localização não disponível</p>
        @else
        <div id="mapa" style="height: 360px"></div>
        @endif
    </div>
</div>

<div class="box box-solid">
    <div class="box-footer">       
        <a href="/ocorrencias" class="btn btn-default">Voltar</a>
        <a href="javascript:enviarSocorro({{$ocorrencia->id}})" class="btn btn-danger pull-right">Enviar socorro</a>        
    </div>
</div>
@stop
      

@section('css')
    
@stop

@section('js')
   <script>
        function initMap() {

          var position = {lat: {{ $ocorrencia->latitude }}, lng: {{$ocorrencia->longitude }} };
          // The map, centered at position
          var map = new google.maps.Map(
                  document.getElementById('mapa'), {zoom: 16, center: position});
          // The marker, positioned at position
          var marker = new google.maps.Marker({position: position, map: map});
        }
    </script>
   
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW8GdR82WyvV2dLVrpsRlMy0_EPDh8wxI&callback=initMap">
    </script>
    <script src="{{asset('js/ocorrencias/atendimento.js')}}"></script>
@stop