
@extends('adminlte::page')

@section('title', $title.' - Novo - SOS Acessível')

@section('content_header')
<!--    <h1>Cadastrar Usuário</h1>-->
@stop

@section('content')
<div class="box box-widget center-block" style="max-width: 800px;" >
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('usuario.update')}}" method="POST">
            <div class="box-body">
                {{method_field('PUT')}}
                {!! csrf_field() !!}
                <div class='box-header with-border'>
                    <h1 class='box-title'>Dados pessoais</h1>
                </div>
                <label for='name'>Nome</label>
                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                           placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group has-feedback {{ $errors->has('data_nascimento') ? 'has-error' : '' }}">
                    <label for='data_nascimento'>Data de nascimento</label>
                    <input type="date" name="data_nascimento" class="form-control" value="{{ $paciente->data_nascimento }}"
                           placeholder="Data de nascimento">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('data_nascimento') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group has-feedback {{ $errors->has('data_nascimento') ? 'has-error' : '' }}">
                    <label for='tipo_sanguineo'>Tipo sanguíneo</label>
                    <div class="form-inline">
                        <select class="form-control " name="tipo_sanguineo" style="width: 49.5%">
                            <option {{ $paciente->tipo_sanguineo == 'A' ? 'selected' : '' }}>A</option>
                            <option {{ $paciente->tipo_sanguineo == 'B' ? 'selected' : '' }}>B</option>
                            <option {{ $paciente->tipo_sanguineo == 'AB' ? 'selected' : '' }}>AB</option>
                            <option {{ $paciente->tipo_sanguineo == 'O' ? 'selected' : '' }}>O</option>
                        </select>
                        <select class="form-control " name="fator_rh_sanguineo" style="width: 49.5%">
                            <option value="P" {{ $paciente->fator_rh_sanguineo == 'P' ? 'selected' : '' }}>Positivo</option>
                            <option value="N" {{ $paciente->fator_rh_sanguineo == 'N' ? 'selected' : '' }}>Negativo</option>
                        </select>
                    </div>
                    
                </div>
                <label for='endereco'>Endereço</label>
                <div class="form-group has-feedback {{ $errors->has('endereco') ? 'has-error' : '' }}">
                    
                    <textarea name="endereco" class="form-control"
                              placeholder="(logradouro/bairro/cidade/estado)">{{ $paciente->endereco }}</textarea>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('endereco') }}</strong>
                        </span>
                    @endif
                </div>
                
                <label for='informacoes_medicas'>Informações médicas</label>
                <div class="form-group has-feedback {{ $errors->has('informacoes_medicas') ? 'has-error' : '' }}">
                    
                    <textarea name="informacoes_medicas" class="form-control" 
                              placeholder="(alergias, medicamentos controlados, doenças crônicas, etc.)">{{ $paciente->informacoes_medicas }}</textarea>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('informacoes_medicas') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class='box-header with-border'>
                    <h1 class='box-title'>Autenticação</h1>
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit"
                        class="btn btn-primary btn-danger pull-right"
                >Editar</button>
            </div>
        </form>
      </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@push('js')