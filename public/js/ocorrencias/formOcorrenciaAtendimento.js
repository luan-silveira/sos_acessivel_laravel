function salvarAtendimento() {
    formAjax.send({
        url: "atendimentos",
        type: $("#formAtendimento").attr("method"),
        data: $("#formAtendimento").serialize(),
        afterSuccess: function () {
            //Atualiza a página
            location.href = location.href;
        }
    });
}
