function iniciarFirebaseOcorrencia(config){

    firebase.initializeApp(config);

    new Vue({
        el: 'body',

        data: {
            task: '',
            todos: []
        },

        ready: function() {
            var self = this;

            // Initialize firebase realtime database.
            firebase.database().ref('todos/').on('value', function(snapshot) {
                // Everytime the Firebase data changes, update the todos array.
                self.$set('todos', snapshot.val());
            });
        },

        methods: {

            /**
             * Create a new todo and synchronize it with Firebase
             */
            createTodo: function() {
                var self = this;

                // For the sake of simplicity, I'm using jQuery here
                $.post('/todo', {
                    _token: '{!! csrf_token() !!}',
                    task: self.task,
                    is_done: false
                });

                this.task = '';
            }
        }
    });
}