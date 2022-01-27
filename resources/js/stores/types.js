export default {

    state() {
        return {
            anestez: 'https://drive.google.com/file/d/17P3tTiw8ptINy9teC0HSvJAV5WKq66xS/view?usp=sharing',
            types: []
        }
    },

    getters: {

        allTypes(state) {
            return state.types
        },

        bookletAnesthesia(state) {
            return state.anestez
        }
    },

    mutations: {

        fillTypes(state, types) {
            state.types = types
        },
        fillAnestez(state, anestez) {
            state.anestez = anestez
        }

    },

    actions: {

        loadTypes({commit}) {

            const axios = require('axios')
            axios.get('/api/mps')
                .then(response =>
                    {
                        const types = response.data
                        commit('fillTypes', types)
                    }
                )
                .catch(error => console.log(error));

        },

        // loadAnestez({commit}) {
        //
        //     const axios = require('axios')
        //     axios.get('/api/anestez')
        //         .then(response =>
        //             {
        //                 const anestaz = response.data
        //                 commit('fillAnestez', anestaz)
        //             }
        //         )
        //         .catch(error => console.log(error));
        //
        // }

    }

}
