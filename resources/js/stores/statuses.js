export default {

    state() {
        return {
            statuses: []
        }
    },

    getters: {

        //все статусы
        allStatuses(state) {
            return state.statuses
        },

    },

    mutations: {

        //заполнить статусы
        fillStatuses(state, payload) {
            state.statuses = payload
        },

    },

    actions: {

        //загрузить статусы
        async loadStatuses({commit}) {

            await axios.get('/api/statuses')
                .then(response =>
                    {
                        const statuses = response.data
                        commit('fillStatuses', statuses)
                    }
                )
                .catch(error => console.log('Помилка підключення до бази даних: ' . error));

        },

    }

}
