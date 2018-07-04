@extends('adminlte::page')

@section('title', '404 - Página não encontrada')

@section('content')
<div class="error-page">
    <h2 class="headline text-yellow"> 404</h2>

    <div class="error-content">
      <h3><i class="fa fa-warning text-yellow"></i> Ops! Página não encontrada!</h3>

      <p>
        A página solicitada não foi encontrada ou simplesmente não existe!
        Verifique o link digitado e tente novamente. <br>
        <a href="/">Voltar à página inicial</a>
      </p>

    </div>
    <!-- /.error-content -->
  </div>
@stop
