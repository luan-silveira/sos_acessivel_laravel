function excluirClassificacao(id){
    if(confirm("Deseja realmente excluir?")){
        location.href = "classificacoes-ocorrencia/" + id + "/destroy";
    }
}

