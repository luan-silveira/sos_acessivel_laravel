@extends('adminlte::page')

@section('title', $title.' - SOS Acessível')

@section('content_header')
    <h1>{{$title}}</h1>
@stop

@section('content')
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Atendimentos</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                   <div class="input-group-btn">
                    <a href="#" class="btn btn-default pull-right"><i class="fa fa-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
               @if (count($atendimentos) === 0)
               <div class=" box-comment center-block ">Não há registros cadastrados.</div>
               @else
                <tbody><tr>
                  <th>Código</th>
                  <th>Paciente</th>
                  <th>Tipo de atendimento</th>
                  <th>Descricao</th>
                  <th>Data</th>
                  <th style="text-align: center">Status</th>
                  <th>Ações</th>
                </tr>
                    @foreach($atendimentos as $atendimento)
                    <tr>
                      <td>{{$atendimento->id}}</td>
                      <td>{{$atendimento->paciente->nome}}</td>
                      <td>{{$atendimento->tipo->classificacao->id.".".$atendimento->tipo->id." - ".$atendimento->tipo->descricao }}</td>
                      <td>{{$atendimento->descricao }}</td>
                      <td>{{$atendimento->dataatendimento()}}</td>
                      <td style="text-align: center">
                          @php
                            $color = "";
                            switch($atendimento->status){
                                case(1):
                                    $color = "warning";
                                    break;
                                case(2) :
                                    $color = "info";
                                    break;
                                case(3) :
                                    $color = "success";
                                    break;
                                 default :
                                    $color = "red";
                            }                            
                          @endphp
                          <i class="fa fa-circle text-{{$color}}" data-toggle="tooltip" title="{{$atendimento->descricaoStatus()}}"></i>
                      </td>
                      <td>
                         <a class="btn btn-xs btn-primary" href="{{route('atendimentos.detalhes', $atendimento->id)}}">
                              <i class="fa fa-eye"></i>Detalhes
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

<div class="footer">{{$atendimentos->links()}}</div> 
@stop
      

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   
@stop
