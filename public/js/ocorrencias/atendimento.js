$(document).ready(function(){
    $('#btnBloquearPaciente').on('click', function(){
        var key = $(this).attr('data-key');
        var bloqueado = $(this).attr('data-bloqueado');
        var msg = "Deseja realmente " + (bloqueado == 1 ? "des" : "") + "bloquear este paciente?";
        
        dialogBox.confirm("", msg,
            function(confirm){
                if(confirm) {
                    bloquearUsuarioFirebase(key);
                }
            });
    });
});

function enviarSocorro(id_ocorrencia) {
    formModal.criar({
        title: "Mensagem do atendente",        
        url: "/ocorrencias/" + id_ocorrencia + '/atendimento',
        
        onConfirm: function () {
           salvarAtendimento();
        }
    });


}

function bloquearUsuarioFirebase(key){
    var url = "/paciente/bloquear";
    var data = {
        _key: key
    };
    
    $.post(url, data)
            .done(function(ret){
                database.ref("usuarios").child(key).update({
                    isBloqueado: ret.bloqueado
                });
                
                $.notify(ret.message, "success");
                setTimeout(function(){location.reload();}, 800);
                
            }).fail(function(){
                $.notify("Erro ao bloquear!");
            });
}

function updateOcorrenciaFirebase(key, data){
    database.ref("ocorrencias").child(key).update(data);
    
    console.log("Status da ocorrência " + key + " alterado para " + data.status);
}

function finalizarAtendimento(id_ocorrencia) {
    var url = "/ocorrencias/" + id_ocorrencia + "/finalizar";
    var data = {id: id_ocorrencia};
    
    dialogBox.confirm("Finalizar atendimento", "Deseja realmente finalizar o atendimento?", 
        function(confirm){
            if(confirm){
                $.post(url, data, function(ret){
                    $.notify(ret.message, "success");
                    updateOcorrenciaFirebase($('#key').val(), {status: 2});
                    setTimeout(function(){
                        location.href = "/ocorrencias/" + id_ocorrencia;
                    }, 800);
                });
            }
        });
}

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
