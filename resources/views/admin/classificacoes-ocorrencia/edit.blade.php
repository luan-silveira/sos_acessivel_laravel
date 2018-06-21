<script src="{{$js}}"></script>
        <form id="formClassificacaoOcorrencia" method="PUT">
            {!! csrf_field() !!}
          <div class="box-body">
            <div class="form-group">
              <label for="descricao">Descrição</label>
              <input name="descricao" id="descricao" type="text" class="form-control" placeholder="Digite a descrição" value="{{$classificacao->descricao}}">
            </div>
            
            </div>
          </div>
          <!-- /.box-body -->
        </form>
      </div>
