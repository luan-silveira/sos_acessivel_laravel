/**
 * Desenvolvido para tratar de maneira padrão as requisições ajax feitas no sistema
 */
formAjax = new function () {

    options = {};

    this.default = {
        type: "POST",
        data: {},
        confirmacao: false,
        tituloConfirmacao: "Tem certeza?",
        mensagemConfirmacao: "",
        target: false,
        showEffect: false,
        ajaxOptions: {},
        beforeSuccess: function () {},
        afterSuccess: function () {}
    };

    this.send = function (opts) {

        //Registra o evento em uma variável
        var e = this;
        options = $.extend(true, {}, this.default, opts);

        if (options.confirmacao) {

            swal({
                title: options.tituloConfirmacao,
                text: options.mensagemConfirmacao,
                icon: "warning",
                buttons:{
                    cancel: {
                        text: "Cancelar",
                        visible : true,
                        classname: "btn-default",
                        closeModal: true
                    },
                    confirm:{
                        text: "Sim",
                        className: "btn-danger"
                    }
                },
                className: "max-priority"
            }).then(function () {
                e.processaRequisicao();
            });

        } else {
            e.processaRequisicao();
        }

    };

    this.processaRequisicao = function () {

        var ajaxOptions = options.ajaxOptions;

        ajaxOptions.url = !ajaxOptions.url ? options.url : ajaxOptions.url;
        ajaxOptions.data = !ajaxOptions.data ? options.data : ajaxOptions.data;
        ajaxOptions.type = !ajaxOptions.type ? options.type : ajaxOptions.type;
        ajaxOptions.success = !ajaxOptions.success ? success : ajaxOptions.success;
        ajaxOptions.error = !ajaxOptions.error ? error : ajaxOptions.error;

        $.ajax(ajaxOptions);
    };



    success = function (response) {

        ajx_opts = options;
        var json_response = false;

        if (isJson(response)) {

            json_response = JSON.parse(response);
            ajx_opts.beforeSuccess(response, json_response);

            if (json_response.status === "sucesso") {
                if (json_response.message) {
                    $.notify(json_response.message, {
                        className: "success",
                        clickToHide: true
                    });
                }

                if ($.trim(json_response.content) !== "" && options.target) {
                    if (ajx_opts.showEffect) {
                        $(ajx_opts.target).hide().html(json_response.content).show(500);
                    } else {
                        $(ajx_opts.target).html(json_response.content);
                    }
                }

                ajx_opts.afterSuccess(response, json_response);

            } else {
                swal({
                    type: "error",
                    title: "Ops...",
                    html: json_response.message
                });
            }


        } else {
            console.log(response);
            swal({
                type: "error",
                title: "A resposta do servidor não é um JSON válido"
            });
        }


    };

    error = function (xhr, status, error) {
        switch (xhr.status) {
            case 500:

                console.log(xhr.responseText);

                $.notify("Erro interno do servidor", {
                    className: "error",
                    clickToHide: true
                });

                break;
            case 404:
                $.notify("Página não encontrada", {
                    className: "error",
                    clickToHide: true
                });

                break;
            default:
                $.notify("Ocorreu um erro ao processar a requisição", {
                    className: "error",
                    clickToHide: true
                });

                break;
        }
    };

    //Verifica se a string de retorno é um JSON válido
    isJson = function (str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    };


};