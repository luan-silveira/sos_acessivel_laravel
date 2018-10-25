$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

dialogBox = new function(){
   this.confirm = function(title, text, callback){
       
       swal({
            title: title,
            text: text,
            icon: "warning",
            dangerMode: true,
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
        }).then(callback);
   };
};




