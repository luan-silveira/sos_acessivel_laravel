@extends('adminlte::page')

@section('title', $title.' - SOS Acessível')

@section('content_header')
<h1>{{$title}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Dados do paciente</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <dl>
                    <dt>Nome</dt>
                    <dd>{{$paciente->nome}}</dd>
                    <dt>Data de nascimento</dt>
                    <dd>{{$paciente->dataNascimento()}}</dd>
                    <dt>Tipo sanguíneo</dt>
                    <dd>{{$paciente->tipo_sanguineo .($paciente->fator_rh_sanguineo == 'P'? '+' : '-')}}</dd>
                    <dt>Endereço</dt>
                    <dd>{{$paciente->endereco}}</dd>
                    <dt>Informações médicas</dt>
                    <dd>{{$paciente->informacoes_medicas}}</dd>
                </dl>
                <button type="button" class="btn btn-{{$paciente->isBloqueado() ? "success" : "danger"}}" data-key="{{$paciente->_key}}" data-bloqueado="{{$paciente->isBloqueado() ? 1 : 0}}" id="btnBloquearPaciente">
                    {{$paciente->isBloqueado() ? "Desbloquear" : "Bloquear"}}
                </button>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

    <div class="col-md-6">  
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Dados da ocorrência</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <dl>
                    <dt>Status</dt>
                    <dd>{{$ocorrencia->descricaoStatus()}}</dd>
                    <dt>Classificação</dt>
                    <dd>{{$ocorrencia->tipo->classificacao->id.' - '.$ocorrencia->tipo->classificacao->descricao}}</dd>
                    <dt>Tipo</dt>
                    <dd>{{$ocorrencia->tipo->id.' - '.$ocorrencia->tipo->descricao}}</dd>
                    <dt>Descrição da ocorrência</dt>
                    <dd>{{$ocorrencia->descricao}}</dd>
                    <dt>Descrição da localidade</dt>
                    <dd>{{$ocorrencia->localizacao}}</dd>
                    <dt>Data da solicitação</dt>
                    <dd>{{$ocorrencia->dataOcorrencia()}}</dd>
                </dl>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>


<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Localização do paciente no mapa</h3>
    </div>
    <div class="box-body">
        @if($ocorrencia->latitude == null || $ocorrencia->longitude == null)
        <p>Localização não disponível</p>
        @else
        <div id="mapa" style="height: 360px"></div>
        @endif
    </div>
</div>

<div class="box box-solid">
    <div class="box-footer">
        <input type="hidden" name="key" id="key" value="{{$ocorrencia->_key}}">
        <a href="/ocorrencias" class="btn btn-default">Voltar</a>

        @if(!$paciente->isBloqueado())
            @switch($ocorrencia->status)
            @case('0')
            <button type="button" id="btEnviarSocorro" data-toggle="modal" data-target="#modalMensagemAtendente" class="btn btn-danger pull-right">Enviar socorro</button> 
            @break    
            @case('1')
            <button type="button" id="btFinalizarAtendimento" class="btn btn-success pull-right">Finalizar atendimento</button>
            @endswitch
        @endif
    </div>
</div>

<div class="modal fade" id="modalMensagemAtendente">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formMensagemAtendente"> 
                <div class="modal-header">
                    <h4 class="modal-title">Mensagem para o paciente</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="nome_user" id="nome_user" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="key" id="key" value="{{ $ocorrencia->_key }}">  
                    <input type="hidden" name="id_ocorrencia" id="id_ocorrencia" value="{{ $ocorrencia->id }}">            
                    <input type="hidden" name="id_paciente" id="id_paciente" value="{{ $ocorrencia->paciente->id }}">
                    <input type="hidden" name="id_instituicao" id="id_instituicao" value="{{ Auth::user()->instituicao->id }}">
                    <input type="hidden" name="nome_instituicao" id="nome_instituicao" value="{{ Auth::user()->instituicao->nome }}">
                    <input type="hidden" name="id_orgao" id="id_orgao" value="{{ Auth::user()->instituicao->orgao->id }}">
                    <textarea name="mensagem_atendente" id="mensagem_atendente" placeholder="Informe uma mensagem para o paciente..." style="width: 100%"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop


@section('css')

@stop

@section('js')
<script>
    function initMap() {

    var position = {lat: {{ $ocorrencia->latitude }}, lng: {{$ocorrencia->longitude }} };
    // The map, centered at position
    var map = new google.maps.Map(
            document.getElementById('mapa'), {zoom: 16, center: position});
    // The marker, positioned at position
    var marker = new google.maps.Marker({position: position, map: map, draggable: true});
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW8GdR82WyvV2dLVrpsRlMy0_EPDh8wxI&callback=initMap">
</script>
<script src="{{asset('js/ocorrencias/atendimento.js')}}"></script>
@stop