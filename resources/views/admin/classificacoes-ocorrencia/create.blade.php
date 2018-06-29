<script src="{{$js}}"></script>

<form id="formClassificacaoOcorrencia" method="POST">
{!! csrf_field() !!}
    <div class="box-body">
        <div class="form-group">
          <label for="descricao">Descrição</label>
          <input id="descricao" name="descricao" type="text" class="form-control" placeholder="Digite a descrição">
        </div>
    </div>     
</form>

