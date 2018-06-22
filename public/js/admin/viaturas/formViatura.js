
$('#id_marca').on('change', function(e){
    console.log(e);
    var id_marca = e.target.value;

    $.get("ajax/" + id_marca, function(data) {
        console.log(data);
        $('#id_modelo').empty();
        $.each(data, function(index,modeloObj){
            teste = $('#id_modelo').append('<option value="' + modeloObj.id + '">'+modeloObj.nome + '</option>');
        });
    });
});