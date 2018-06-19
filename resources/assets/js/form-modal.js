/**
 * Plugin que renderiza um modal a partir de uma string html ou uma requisição em ajax
 */
var formModal = new function () {

    id = "";
    options = {};

    this.default = {
        html: false,
        url: "",
        data: {},
        title: "Modal",
        onConfirm: function (modal_id) {
            $("#" + modal_id).modal("hide");
        },
        modal_class: "",
        afterShow: function () {

        }
    };

    this.criar = function (opts) {

        options = $.extend(true, {}, this.default, opts);
        ids = renderModal();

        if (options.html) {
            $("#" + ids.modal_body_id).html(html);
            $("#" + ids.modal_id).modal("show");
            options.afterShow();
        } else {
            var afterShow = options.afterShow;
            formAjax.send({
                url: options.url,
                data: options.data,
                ajaxOptions: {type: "GET"},
                target: "#" + ids.modal_body_id,
                afterSuccess: function () {
                    $("#" + ids.modal_id).modal("show");
                    afterShow();
                },
                afterError: function () {
                    //Em caso de erro destrói o modal
                    $("#" + ids.modal_id).remove();
                }
            });
        }

    };

    renderModal = function () {

        var ids = {
            modal_id: "modal_" + new Date().getUTCMilliseconds(),
            modal_body_id: "modalBody_" + new Date().getUTCMilliseconds(),
            btn_confirm_id: "btnConfirm_" + new Date().getUTCMilliseconds()
        };

        html = '<div id="' + ids.modal_id + '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirm-modal" aria-hidden="true">';
        html += '   <div class="modal-dialog ' + options.modal_class + '">';
        html += '       <div class="modal-content">';
        html += '           <div class="modal-header">';
        html += '               <a class="close" data-dismiss="modal">×</a>';
        html += '               <h4>' + options.title + '</h4>';
        html += '           </div>';
        html += '           <div class="modal-body" id="' + ids.modal_body_id + '"></div>';
        html += '           <div class="modal-footer">';
        html += '               <span id="' + ids.btn_confirm_id + '" class="btn btn-success">Confirmar</span>';
        html += '               <span class="btn btn-danger" data-dismiss="modal">Cancelar</span>';
        html += '           </div>';
        html += '       </div>';
        html += '   </div>';
        html += '</div>';

        $('body').append(html);

        $("#" + ids.modal_id).data("options", options);

        $("#" + ids.btn_confirm_id).on('click', function () {
            $("#" + ids.modal_id).data("options").onConfirm(ids.modal_id);
        });

        $("#" + ids.modal_id).on('hidden.bs.modal', function () {
            $(this).remove();
        });

        $('.modal').on('show.bs.modal', function () {
            $(this).show();
            setModalMaxHeight(this);
        });

        return ids;
    };

    function setModalMaxHeight(element) {
        this.$element = $(element);
        this.$content = this.$element.find('.modal-content');
        var borderWidth = this.$content.outerHeight() - this.$content.innerHeight();
        var dialogMargin = $(window).width() < 768 ? 20 : 60;
        var contentHeight = $(window).height() - (dialogMargin + borderWidth);
        var headerHeight = this.$element.find('.modal-header').outerHeight() || 0;
        var footerHeight = this.$element.find('.modal-footer').outerHeight() || 0;
        var maxHeight = contentHeight - (headerHeight + footerHeight);

        this.$content.css({
            'overflow': 'hidden'
        });

        this.$element
                .find('.modal-body').css({
            'max-height': maxHeight,
            'overflow-y': 'auto'
        });
    }

    $(window).resize(function () {
        if ($('.modal.in').length != 0) {
            setModalMaxHeight($('.modal.in'));
        }
    });

};