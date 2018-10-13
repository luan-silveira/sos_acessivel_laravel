function openModalNovaClassificacaoOcorrencia() {
    formModal.criar({
        title: "Adicione uma nova classificação",        
        url: "classificacoes-ocorrencia/create",
        onConfirm: function () {
           salvarClassificacaoOcorrencia();
        }
    });
}

function openModalEditarClassificacaoOcorrencia(id) {
    formModal.criar({
        title: "Editar uma classificação",
        url: "classificacoes-ocorrencia/" + id + "/edit",
        onConfirm: function () {
            salvarClassificacaoOcorrencia();
        }
    });
}

function excluirClassificacaoOcorrencia(id) {
    formAjax.send({
        confirmacao: true,
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