@extends('adminlte::page')

@section('title', $title.' - SOS Acessível')

@section('content_header')
    <h1>{{$title}}</h1>
@stop

@section('content')
<div class="row">
  <div class="box box-solid col-md-4">
      <div class="box-header with-border">
        <i class="fa fa-text-width"></i>

        <h3 class="box-title">Dados do paciente</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <dl>
          <dt>Nome</dt>
          <dd>{{$paciente->nome}}</dd>
          <dt>Data de nascimento</dt>
          <dd>{{$paciente->dataNascimento()}}</dd>
          <dt>Tipo sanguíneo</dt>
          <dd>{{$paciente->tipo_sanguineo .($paciente->fator_rh_sanguineo == 'P'? '+' : '-')}}</dd>
          <dt>Endereço</dt>
          <dd>{{$paciente->endereco}}</dd>
          <dt>Informações médicas</dt>
          <dd>{{$paciente->informacoes_medicas}}</dd>
        </dl>
      </div>
      <!-- /.box-body -->
  </div>

  <div class="box box-solid col-md-4">
      <div class="box-header with-border">
        <i class="fa fa-text-width"></i>

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
</div>
@stop
      

@section('css')
    
@stop

@section('js')
   
@stop