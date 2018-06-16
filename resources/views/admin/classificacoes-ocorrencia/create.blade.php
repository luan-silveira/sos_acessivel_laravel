{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', $title.' - '.config('app.name'))

@section('content_header')
    <h1>Cadastrar classificação</h1>
@stop

@section('content')
    <div class="box box-widget">
        <div class="box-header with-border">
          <h3 class="box-title">Quick Example</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('classificacoes-ocorrencia.store')}}" method="POST">
            {!! csrf_field() !!}
          <div class="box-body">
            <div class="form-group">
              <label for="descricao">Descrição</label>
              <input name="descricao" type="text" class="form-control" placeholder="Digite a descrição">
               <label for="descricao">teste</label>
            </div>
            
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
              <div class="box-group pull-right">
                <button type="button" class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-danger">Salvar</button>
              </div>
          </div>
        </form>
      </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop