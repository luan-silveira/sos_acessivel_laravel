$(document).ready(function () {
    $('.btnPeriodo').on('click', function () {
        var periodo = $(this).attr('data-periodo');
        getTotalOcorrencia(periodo);
    });
    
    getTotalOcorrencia(0);
});

function getTotalOcorrencia(periodo) {
    var url = '/get-total-ocorrencias';
    var data = {periodo: periodo};
    $.get(url, data, function (data) {
        $('#totalPendentes').text(data.totalPendentes);
        $('#totalAtendidas').text(data.totalAtendidas);
        $('#totalFinalizadas').text(data.totalFinalizadas);
    });
}
