
var ref = database.ref("classificacao_ocorrencias");
ref.on("child_added", function(data){
    salvarClassificacaoOcorrencia(true, data.val());
    //addClassificacao(data.val());
    
});

ref.on('child_changed', function(data) {
    salvarClassificacaoOcorrencia(true, data.val());
});

ref.on('child_removed', function(data) {
  
});

ref.on("value", function(snapshot){
//    snapshot.forEach(function(child){
//        console.log(child.val());
//    });
});

function salvarClassificacaoOcorrencia(update = false, data) {
    console.log(data);
    var url = "classificacoes-ocorrencia-firebase";
    if(update){
        //$.extend(data, {_method: 'PUT'});
        url += "/" + data.id
    }    
    formAjax.send({
        url: url,
        data: $.extend({}, data, {_token: $("input[name=_token]").val()}),
        afterSuccess: function () {
            //Atualiza a página
            
        }
    });
}

function excluirClassificacaoOcorrencia(id) {
    formAjax.send({
        url: "classificacoes-ocorrencia/" + id ,
        data: {
            _method: "delete",
            _token: $("input[name=_token]").val()
        },
        afterSuccess: function () {
            location.href = location.href;
        }
    });
}

function addClassificacao(classificacao) {
    var html = "";
    html += "<tr>";
    html += "    <td>" + classificacao.id + "</td>";
    html += "    <td>" + classificacao.descricao + "</td>";
    html += '    <td>';
    html += '            <a class="btn btn-xs btn-warning" href="javascript:openModalEditarClassificacaoOcorrencia(' + classificacao.id + ')">Editar</a>';
    html += '            <a class="btn btn-xs btn-danger" href="javascript:excluirClassificacaoOcorrencia(' + classificacao.id + ')">Excluir</a>';
    html += '    </td>';
    html += '  </tr>"';
    
    $('#tableClassificacoes tbody').append(html);
}