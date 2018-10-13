function salvarAtendimento() {
    var id_ocorrencia = $('#id_ocorrencia').val();
    formAjax.send({
        url: "/ocorrencias/" + id_ocorrencia + "/atendimento",
        type: $("#formAtendimento").attr("method"),
        data: $("#formAtendimento").serialize(),
        afterSuccess: function () {
            updateOcorrenciaFirebase($('#key').val(), {
                status: 1,
                mensagemAtendente: $('#mensagem_atendente').val(),
                atendente:{
                    id: parseInt($('#id_user').val()),
                    nome: $('#nome_user').val(),
                    instituicao: $('#nome_instituicao').val()
                }
            });
            location.href = "/ocorrencias/" + id_ocorrencia;
        }
    });
}
