export default {

    state() {
        return {

            doctors: [],

            // doctor: {
            //     lastname: '',
            //     name: '',
            //     post: '',
            //     hospital: '',
            //     image: '',
            // },
            //
            // errorLastnameDoctor: false,
            // errorNameDoctor: false,
            // errorPostDoctor: false,
            // errorHospitalDoctor: false,
            // errorImageDoctor: false,
            //
            // isValidDoctor: '',

        }
    },

    getters: {

        allDoctors(state) {
            return state.doctors
        },

        // getErrorLastnameDoctor(state) {
        //     return state.errorLastnameDoctor
        // },
        // getErrorNameDoctor(state) {
        //     return state.errorNameDoctor
        // },
        // getErrorPostDoctor(state) {
        //     return state.errorPostDoctor
        // },
        // getErrorHospitalDoctor(state) {
        //     return state.errorHospitalDoctor
        // },
        // getErrorImageDoctor(state) {
        //     return state.errorImageDoctor
        // },
        //
        // getIsValidDoctor(state) {
        //     return state.isValidDoctor
        // },

    },

    mutations: {

        fillAllDoctors(state, payload) {
            state.doctors = payload
        },

    },

    actions: {

        async loadDoctors({commit}) {

            await axios.get('/api/doctors')
                .then(response =>
                    {
                        const doctors = response.data
                        commit('fillAllDoctors', doctors)
                    }
                )
                .catch(error => {console.log('Помилка підключення до бази даних:',  error)});

        },

    }
}
