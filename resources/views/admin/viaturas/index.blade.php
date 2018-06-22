{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', $title.' - SOS Acessível')

@section('content_header')
    <h1>{{$title}}</h1>
@stop

@section('content')
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de viaturas</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                   <div class="input-group-btn">
                    <a href="{{route('viaturas.create')}}" class="btn btn-default pull-right"><i class="fa fa-plus"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
               @if (count($viaturas) === 0)
               <div class=" box-comment center-block ">Não há registros cadastrados.</div>
               @else
                <tbody><tr>
                  <th>Código</th>
                  <th>Placa</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Ano</th>
                  <th>Ações</th>
                </tr>
                    @foreach($viaturas as $viatura)
                    <tr>
                      <td>{{$viatura->id}}</td>
                      <td>{{$viatura->placa}}</td>
                      <td>{{$viatura->modelo->marca->nome }}</td>
                      <td>{{$viatura->modelo->nome }}</td>
                      <td>{{$viatura->ano}}</td>
                      <td>
                          <form action="{{route('viaturas.destroy', $viatura->id)}}" method="POST">
                               <a class="btn btn-xs btn-warning" href="{{route('viaturas.edit', $viatura->id)}}">Editar</a>
                              {{method_field('DELETE')}}
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-xs btn-danger" href="">Excluir</button>
                          </form>
                      </td>
                    </tr>
                    @endforeach
                @endif
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
<div class=""></div>

<div class="footer">{{$viaturas->links()}}</div> 
@stop
      

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   
@stop