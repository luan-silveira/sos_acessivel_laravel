function salvarAtendimento() {
    var url = "/atendimentos"
    formAjax.send({
        url: url,
        type: $("#formAtendimento").attr("method"),
        data: $("#formAtendimento").serialize(),
        afterSuccess: function () {
            location.href = url;
        }
    });
}
