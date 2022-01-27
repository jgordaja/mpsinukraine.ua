export default {

    state() {
        return {
            tops: []
        }
    },

    getters: {

        //все top-значения
        allTops(state) {
            return state.tops
        },

    },

    mutations: {

        //заполнить
        fillTops(state, payload) {
            state.tops = payload
        },

    },

    actions: {

        //загрузить топ-значения
        async loadTops({commit}) {

            await axios.get('/api/tops')
                .then(response =>
                    {
                        const tops = response.data

                        //заменить top-значения на "нет", "да"
                        for (let i=0; i<tops.length; i++) {
                            if (tops[i].name === 'off') {
                                tops[i].name ='нет'
                            } else if (tops[i].name === 'on') {
                                tops[i].name ='да'
                            }
                        }

                        commit('fillTops', tops)
                    }
                )
                .catch(error => console.log('Помилка підключення до бази даних: ' . error));

        },

    }

}
