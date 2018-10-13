function enviarSocorro(id_ocorrencia) {
    formModal.criar({
        title: "Mensagem do atendente",        
        url: "/ocorrencias/" + id_ocorrencia + '/atendimento',
        
        onConfirm: function () {
           salvarAtendimento();
        }
    });

//    formAjax.send({
//        url: "/ocorrencias/" + id_ocorrencia,
//        type: "POST",
//        data: {
//            _token: $('#_token').val(),
//            id: id_ocorrencia
//        },
//        afterSuccess: function () {
//            updateStatusOcorrenciaFirebase($('#key').val(), 1);
//            location.href = "/ocorrencias#" + id_ocorrencia;
//        }
//    });
}

function updateOcorrenciaFirebase(key, data){
    database.ref("ocorrencias").child(key).update(data);
    
    console.log("Status da ocorrência " + key + " alterado para " + data.status);
}

function finalizarAtendimento(id_ocorrencia) {
    formAjax.send({
        confirmacao: true,
        url: "/ocorrencias/" + id_ocorrencia + "/finalizar",
        type: "POST",
        data: {
            _token: $('#_token').val(),
            id: id_ocorrencia
        },
        afterSuccess: function () {
            updateOcorrenciaFirebase($('#key').val(), {status: 2});
            location.href = "/ocorrencias#" + id_ocorrencia;
        }
    });
}
