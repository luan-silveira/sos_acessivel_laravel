{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')  

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Ocorrências</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-clock-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pendentes</span>
                        <span class="info-box-number" id="totalPendentes">0</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>

            <div class="col-md-4">                  
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="ion ion-ios-gear-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Atendidas</span>
                        <span class="info-box-number" id="totalAtendidas">0</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>

            <div class="col-md-4">                  
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-gear-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Finalizadas</span>
                        <span class="info-box-number" id="totalFinalizadas">0</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
        <div class="row">
            <div class="col-md-5">
                <div class="btn-group" data-toggle="buttons" style="display: flex">
                    <label class="btn btn-default btn-block btn-sm btnPeriodo active" data-periodo="0" style="margin-top: 5px">
                        <input type="radio" name="periodo" value="0" autocomplete="off" checked='checked'>Dia
                    </label>
                    <label class="btn btn-default btn-block btn-sm btnPeriodo" data-periodo="1">
                        <input type="radio" name="periodo" value="1" autocomplete="off">Semana
                    </label>
                    <label class="btn btn-default btn-block btn-sm btnPeriodo" data-periodo="2">
                        <input type="radio" name="periodo" value="2" autocomplete="off">Mês
                    </label>
                    <label class="btn btn-default btn-block btn-sm btnPeriodo" data-periodo="3">
                        <input type="radio" name="periodo" value="3" autocomplete="off">Ano
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
    <script src='{{asset('js/admin/index.js')}}'></script>
@stop
