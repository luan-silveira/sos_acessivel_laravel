<form role="form" id="formAtendimento"  method="POST">
    {!! csrf_field() !!}      
    <label for="id_viatura">Selecione a viatura a ser enviada</label>
    <select class ="form-control" id="id_viatura">
    @foreach ($viaturas as $viatura)
        <option value="{{ $viatura->id }}">{{$viatura->id." - ".$viatura->modelo->marca->nome." ".$viatura->modelo->nome." (".$viatura->placa.")"}}</option>
    @endforeach
    </select>
    
    <input type="hidden" name="id_ocorrencia" value="{{ $ocorrencia->id }}">   
    <input type="hidden" name="id_user" value="{{  Auth::user()->id }}">            
    <input type="hidden" name="id_paciente" value="{{ $paciente->id }}">
    <input type="hidden" name="id_instituicao" value="{{ Auth::user()->instituicao->id }}">

</form>

<script src="{{$js}}"></script>