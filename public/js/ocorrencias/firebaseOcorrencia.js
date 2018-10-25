
var ref = database.ref("ocorrencias");
ref.on("child_added", function(data){
    salvarOcorrencia(data.val());
    //add(data.val());
    
});

ref.on('child_changed', function(data) {
    salvarOcorrencia(data.val());
});

ref.on('child_removed', function(data) {
  
});

ref.on("value", function(snapshot){
//    snapshot.forEach(function(child){
//        console.log(child.val());
//    });
});


function salvarUsuario(usuario, callback) {
    var url = "/ocorrencia-paciente-firebase";
    $.post(url,{
            _key: usuario.key,
            nome: usuario.nome,
            data_nascimento: usuario.dataNascimentoString,
            tipo_sanguineo: usuario.tipoSanguineo,
            fator_rh_sanguineo: usuario.rhSanguineo, 
            endereco: usuario.endereco,
            informacoes_medicas: usuario.infMedicas          
        }).done(function (ret) {
            callback(ret.id);
           console.log(ret);
        });
  }

function salvarOcorrencia(data) {
    var url = "/ocorrencia-firebase";    
    salvarUsuario(data.usuario, function(idPaciente){
        $.post(url,{
            _key: data.key,
            id_tipo_ocorrencia: data.tipoOcorrencia.id,
            id_paciente: idPaciente,
            descricao: data.descricao,
            localizacao: data.localizacao,
            latitude: data.latitude, 
            longitude: data.longitude,
            status: data.status,
            data_ocorrencia: data.dataOcorrencia            
        }).done(function(data){
            console.log(data);
        });
    });
}

function excluirOcorrencia(id) {
    $.post("ocorrencias/" + id, {
            _method: "delete"
        }).done(function(ret){
            $.notify(ret.message, "success");
            location.href = location.href;
        });
}
