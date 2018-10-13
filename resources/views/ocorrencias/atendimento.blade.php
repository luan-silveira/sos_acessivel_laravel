<form role="form" id="formAtendimento" method="POST">
    {!! csrf_field() !!}      
    <textarea name="mensagem_atendente" id="mensagem_atendente" placeholder="Informe uma mensagem para o paciente..." style="width: 100%"></textarea>
    <input type="hidden" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
    <input type="hidden" name="nome_user" id="nome_user" value="{{ Auth::user()->name }}">
    <input type="hidden" name="key" id="key" value="{{ $ocorrencia->_key }}">  
    <input type="hidden" name="id_ocorrencia" id="id_ocorrencia" value="{{ $ocorrencia->id }}">            
    <input type="hidden" name="id_paciente" id="id_paciente" value="{{ $ocorrencia->paciente->id }}">
    <input type="hidden" name="id_instituicao" id="id_instituicao" value="{{ Auth::user()->instituicao->id }}">
    <input type="hidden" name="nome_instituicao" id="nome_instituicao" value="{{ Auth::user()->instituicao->nome }}">

</form>

<script src="{{$js}}"></script>