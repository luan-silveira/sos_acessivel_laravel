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
        type: "delete",
//        data: {
//            id: id
//        },
         url: "classificacoes-ocorrencia/" + id ,
        afterSuccess: function () {
            location.href = location.href;
        }
    });
}