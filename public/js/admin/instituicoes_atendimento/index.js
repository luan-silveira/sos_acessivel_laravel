$(document).ready(function(){
   $('#btSubmit').on('click', function(e){
       e.preventDefault();
        var url = "/instituicoes-atendimento";
        var data = $('#formModal').serialize();
        $.post(url, data)
                .done(function(ret){
                    $.notify(ret.message, 'success');
                    setTimeout(function(){location.reload();}, 1000);
                }
    );
  });

    editarInstituicao();
    excluirInstituicao();
    
});

function editarInstituicao(){
    $('.btn-editar').on('click', function() {
        var id = $(this).attr('data-id');
        var url = '/instituicoes-atendimento/' + id + '/edit';
        var data = {id: id};
        
        $.get(url, data, function(ret){
            $('#modal #id_instituicao').val(ret.id);
            $('#modal #nome').val(ret.nome);
            $('#modal #id_instituicao_orgao').val(ret.id_instituicao_orgao);
            $('#modal #id_estado').val(ret.id_estado);
            
            $('#modal').modal();
        })
    });
}

function excluirInstituicao(){
    $('.btn-excluir').on('click', function() {
       var id = $(this).attr('data-id');
       var url = '/instituicoes-atendimento/' + id;
       var data = {
           id: id,
       };

       dialogBox.confirm("", "Deseja realmente excluir?", function (confirm) {
            if(confirm){
                $.ajax({
                    url: url,
                    data: data, 
                    type: "delete"
                    
                }).done(function(ret){
                    $.notify(ret.message, "success");                    
                });
            }
        });

    });



} 