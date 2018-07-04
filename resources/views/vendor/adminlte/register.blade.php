@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'register-page')

@section('body')
<div class="register-box box-solid" style="width: 500px">
        <div class="register-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>

        <div class="register-box-body">
            <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
                {!! csrf_field() !!}
                <div class='box-header'>
                    <h1 class='box-title'>Dados pessoais</h1>
                </div>
                <label for='name'>Nome</label>
                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                           placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group has-feedback {{ $errors->has('data_nascimento') ? 'has-error' : '' }}">
                    <label for='data_nascimento'>Data de nascimento</label>
                    <input type="date" name="data_nascimento" class="form-control" value="{{ old('data_nascimento') }}"
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
                            <option>A</option>
                            <option>B</option>
                            <option>AB</option>
                            <option>O</option>
                        </select>
                        <select class="form-control " name="fator_rh_sanguineo" style="width: 49.5%">
                            <option value="P">Positivo</option>
                            <option value="N">Negativo</option>
                        </select>
                    </div>
                    
                </div>
                <label for='endereco'>Endereço</label>
                <div class="form-group has-feedback {{ $errors->has('endereco') ? 'has-error' : '' }}">
                    
                    <textarea name="endereco" class="form-control"
                              placeholder="(logradouro/bairro/cidade/estado)">{{ old('endereco') }}</textarea>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('endereco') }}</strong>
                        </span>
                    @endif
                </div>
                
                <label for='informacoes_medicas'>Informações médicas</label>
                <div class="form-group has-feedback {{ $errors->has('informacoes_medicas') ? 'has-error' : '' }}">
                    
                    <textarea name="informacoes_medicas" class="form-control" 
                              placeholder="(alergias, medicamentos controlados, doenças crônicas, etc.)">{{old('informacoes_medicas')}}</textarea>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('informacoes_medicas') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class='box-header'>
                    <h1 class='box-title'>Autenticação</h1>
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
                <button type="submit"
                        class="btn btn-primary btn-block btn-flat"
                >{{ trans('adminlte::adminlte.register') }}</button>
            </form>
            <div class="auth-links">
                <a href="{{ url(config('adminlte.login_url', 'login')) }}"
                   class="text-center">{{ trans('adminlte::adminlte.i_already_have_a_membership') }}</a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

@section('adminlte_js')
    @yield('js')
@stop
