
var ref = database.ref("ocorrencias");
ref.on("child_added", function(data){
    salvarOcorrencia(true, data.val());
    //add(data.val());
    
});

ref.on('child_changed', function(data) {
    salvarOcorrencia(true, data.val());
});

ref.on('child_removed', function(data) {
  
});

ref.on("value", function(snapshot){
//    snapshot.forEach(function(child){
//        console.log(child.val());
//    });
});


function salvarUsuario(usuario) {
    var url = "/ocorrencia-paciente-firebase/" + usuario.id;
    console.log(url);
    formAjax.send({
        url: url,
        data: {
            _token: $("input[name=_token]").val(),
            id: usuario.id,
            nome: usuario.nome,
            data_nascimento: usuario.dataNascimentoString,
            tipo_sanguineo: usuario.tipoSanguineo,
            fator_rh_sanguineo: usuario.rhSanguineo, 
            endereco: usuario.endereco,
            informacoes_medicas: usuario.infMedicas          
        },
        
        afterSuccess: function () {
           console.log("Atualizando paciente " + usuario.id);
        }
    });
  }

function salvarOcorrencia(update = false, data) {
    var url = "/ocorrencia-firebase";
    if(update){
        //$.extend(data, {_method: 'PUT'});
        url += "/" + data.key
    }
    
    salvarUsuario(data.usuario);
    
    formAjax.send({
        url: url,
        data: {
            _token: $("input[name=_token]").val(),
            _key: data.key,
            id_tipo_ocorrencia: data.tipoOcorrencia.id,
            id_paciente: data.usuario.id,
            descricao: data.descricao,
            localizacao: data.localizacao,
            latitude: data.latitude, 
            longitude: data.longitude,
            status: data.status,
            data_ocorrencia: data.dataOcorrencia            
        },
        afterSuccess: function (data) {
            console.log(data)            
        }
    });
}

function excluirOcorrencia(id) {
    formAjax.send({
        url: "ocorrencia/" + id ,
        data: {
            _method: "delete",
            _token: $("input[name=_token]").val()
        },
        afterSuccess: function () {
            location.href = location.href;
        }
    });
}
