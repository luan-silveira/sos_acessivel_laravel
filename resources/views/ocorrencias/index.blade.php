@extends('adminlte::page')

@section('title', $title.' - SOS Acessível')

@section('content_header')
    <h1>{{$title}}</h1>
@stop

@section('content')
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de ocorrencias</h3>

              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
               @if (count($ocorrencias) === 0)
               <div class=" box-comment center-block ">Não há registros cadastrados.</div>
               @else
                <tbody><tr>
                  <th>Código</th>
                  <th>Paciente</th>
                  <th>Tipo de ocorrencia</th>
                  <th>Descricao</th>
                  <th>Data</th>
                  <th>Status</th>
                  <th>Ações</th>
                </tr>
                    @foreach($ocorrencias as $ocorrencia)
                    <tr>
                      <td id="{{$ocorrencia->id}}">{{$ocorrencia->id}}</td>
                      <td>{{$ocorrencia->paciente->nome}}</td>
                      <td>{{$ocorrencia->tipo->classificacao->id.".".$ocorrencia->tipo->id." - ".$ocorrencia->tipo->descricao }}</td>
                      <td>{{$ocorrencia->descricao }}</td>
                      <td>{{$ocorrencia->dataOcorrencia()}}</td>
                      <td>
                          @php
                            $color = "";
                            switch($ocorrencia->status){
                                case(1):
                                    $color = "warning";
                                    break;
                                case(2) :
                                    $color = "success";
                                    break;
                                 default :
                                    $color = "red";
                            }                            
                          @endphp
                          <i class="fa fa-circle text-{{$color}}"></i>
                          <span>{{$ocorrencia->descricaoStatus()}}</span>
                      </td>
                      <td>
                         <a class="btn btn-xs btn-primary" href="{{route('ocorrencias.detalhes', $ocorrencia->id)}}">
                              <i class="fa fa-eye"></i>
                              <span>Detalhes</span>
                         </a>      
                      </td>
                    </tr>
                    @endforeach
                @endif
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
<div class=""></div>

<div class="footer">{{$ocorrencias->links()}}</div> 
@stop
      

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
