@extends('adminlte::page')

@section('title', '403 - Página proibida')

@section('content')
<div class="error-page">
    <h2 class="headline text-red"> 403</h2>

    <div class="error-content">
      <h3><i class="fa fa-danger text-red"></i> Proibido!</h3>

      <p>
        Você solicitou uma página na qual o seu usuário atual não possui acesso.
        Verifique o link digitado e tente novamente. <br>
        <a href="/">Voltar à página inicial</a>
      </p>

    </div>
    <!-- /.error-content -->
  </div>
@stop
