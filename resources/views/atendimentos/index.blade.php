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
                  <th>Atendido por</th>
                  <th>Data</th>
                  <th>Status</th>
                  <th>Ações</th>
                </tr>
                    @foreach($atendimentos as $atendimento)
                    <tr>
                      <td>{{$atendimento->id}}</td>
                      <td>{{$atendimento->paciente->nome}}</td>
                      <td>{{$atendimento->user->name }}</td>
                      <td>{{$atendimento->dataAtendimento()}}</td>
                      <td>
                          @php
                            $color = "";
                            switch($atendimento->status){
                                case(1):
                                    $color = "green";
                                    break;
                                 default :
                                    $color = "red";
                            }                            
                          @endphp
                          <i class="fa fa-circle text-{{$color}}"></i>
                          <span>{{$atendimento->descricaoStatus()}}</span>
                      </td>
                      <td>
                         <a class="btn btn-xs btn-primary" href="{{route('ocorrencias.detalhes', $atendimento->ocorrencia->id)}}">
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
    
@stop

@section('js')
   
@stop
