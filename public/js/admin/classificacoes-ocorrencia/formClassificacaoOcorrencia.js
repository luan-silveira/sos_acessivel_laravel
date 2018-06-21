
function salvarClassificacaoOcorrencia() {
    formAjax.send({
        url: "classificacoes-ocorrencia",
        type: $("#formClassificacaoOcorrencia").attr("method"),
        data: $("#formClassificacaoOcorrencia").serialize(),
        afterSuccess: function () {
            //Atualiza a página
            location.href = location.href;
        }
    });
}

