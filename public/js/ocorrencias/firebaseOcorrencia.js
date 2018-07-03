function iniciarFirebaseOcorrencia(config){

    firebase.initializeApp(config);

    new Vue({
        el: 'body',

        data: {
            ocorrencias: [],
            pacientes: [],
            tipo_ocorrencias: []

        },

        ready: function() {
            var self = this;

            // Initialize firebase realtime database.
            firebase.database().ref('ocorrencias/').on('value', function(snapshot) {
                // Everytime the Firebase data changes, update the todos array.
                self.$set('todos', snapshot.val());
            });
        },

    });
}