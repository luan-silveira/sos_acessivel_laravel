function enviarSocorro(id_ocorrencia) {
    formModal.criar({
        title: "Enviar socorro à ocorrência",        
        url: "/ocorrencias/" + id_ocorrencia + "/atendimento",
        onConfirm: function () {
           salvarAtendimento();
        }
    });
}
