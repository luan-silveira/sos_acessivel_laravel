function enviarSocorro(id_ocorrencia) {
    formModal.criar({
        title: "Enviar socorro à ocorrência",        
        url: "/ocorrencias/" + id_ocorrencia + "/atendimento",
        onConfirm: function () {
           salvarAtendimento();
        }
    });
}

function finalizarAtendimento(id_ocorrencia) {
    formAjax.send({
        url: "/ocorrencias/" + id_ocorrencia + "/finalizar",
        type: "POST",
        data: {
            _token: $('#_token').val(),
            id: id_ocorrencia
        },
        afterSuccess: function () {
            location.href = "/ocorrencia/" + id_ocorrencia;
        }
    });
}
