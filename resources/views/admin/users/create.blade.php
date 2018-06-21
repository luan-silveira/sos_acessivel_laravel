
@extends('adminlte::page')

@section('title', $title.' - Novo - SOS Acessível')

@section('content_header')
<!--    <h1>Cadastrar Usuário</h1>-->
@stop

@section('content')
    <div class="box box-widget center-block" style="max-width: 800px;" >
        <div class="box-header with-border">
          <h3 class="box-title">{{ $title }}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('usuarios.store')}}" method="POST">
            {!! csrf_field() !!}
            
          <div class="box-body">
            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                       placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group has-feedback {{ $errors->has('tipo') ? 'has-error' : '' }}">
                <select class ="form-control">
                    <option value="0" {{ old('email')=== 0 ? 'selected' : '' }}>Usuário padrão</option>
                    <option value="1" {{ old('email')=== 1 ? 'selected' : '' }}>Administrador</option>
                </select>
                @if ($errors->has('tipo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tipo') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
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

        </div>
          <!-- /.box-body -->

          <div class="box-footer">
              <div class="box-group pull-right">
                <a href="{{route('usuarios.index')}}" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-danger">Salvar</button>
              </div>
          </div>
        </form>
      </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@push('js')