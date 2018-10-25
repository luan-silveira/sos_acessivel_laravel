{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Atendentes - SOS Acessível')

@section('content_header')
    <h1>Atendentes</h1>
@stop

@section('content')
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de atendentes</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Código</th>
                  <th>Nome</th>
                  <th>Ação</th>
                </tr>
                @foreach($atendentes as $atendente)
                <tr>
                  <td>{{$atendente->id}}</td>
                  <td>{{$atendente->nome}}</td>
                  <td><input type="button" class="btn btn-xs btn-warning" value="Editar"></td>
                </tr>
                @endforeach
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
@stop

@section('css')

@stop

@push('js')