export default {

    state() {
        return {

            videos: [],
            previewVideos: [],

            video: {
                title: '',
                description: '',
                link: '',
                date: '',
                top_id: '',
            },
            errorTitleVideo: false,
            errorDescriptionVideo: false,
            errorLinkVideo: false,
            errorDateVideo: false,
            errorTopIdVideo: false,

            isValidVideo: '',

        }
    },

    getters: {

        allVideos(state) {
            return state.videos
        },
        previewVideos(state) {
            return state.previewVideos
        },

        getErrorTitleVideo(state) {
            return state.errorTitleVideo
        },
        getErrorDescriptionVideo(state) {
            return state.errorDescriptionVideo
        },
        getErrorLinkVideo(state) {
            return state.errorLinkVideo
        },
        getErrorTopIdVideo(state) {
            return state.errorTopIdVideo
        },
        getErrorDateVideo(state) {
            return state.errorDateVideo
        },

        getIsValidVideo(state) {
            return state.isValidVideo
        },

    },

    mutations: {

        fillAllVideos(state, payload) {
            state.videos = payload
        },
        fillPreviewVideos(state, payload) {
            state.previewVideos = payload
        },

        setTitleVideo(state, payload){
            state.video.title = payload
        },
        setDescriptionVideo(state, payload){
            state.video.description = payload
        },
        setLinkVideo(state, payload){
            state.video.link = payload
        },
        setTopIdVideo(state, payload){
            state.video.top_id = payload
        },
        setDateVideo(state, payload){
            state.video.date = payload
        },

        //валидация, получение данных с формы
        validationVideo(state) {

            //сброс ошибок при каждой отправке формы и проверке полей
            state.errorTitleVideo = false
            state.errorDescriptionVideo = false
            state.errorLinkVideo = false
            state.errorDateVideo = false
            state.errorTopIdVideo = false

            //проверка полей на заполненность
            if (! state.video.title) {
                state.errorTitleVideo = true
            }

            if (! state.video.description) {
                state.errorDescriptionVideo = true
            }

            if (! state.video.link) {
                state.errorLinkVideo = true
            }

            if (! state.video.date) {
                state.errorDateVideo = true
            }

            if (! state.video.top_id) {
                state.errorTopIdVideo = true
            }

            if (!state.errorTitleVideo && !state.errorDescriptionVideo && !state.errorLinkVideo && !state.errorDateVideo && !state.errorTopIdVideo) {
                state.isValidVideo = true // поля не пустые
            } else {
                state.isValidVideo = false // одно из полей может быть пустым
            }

        },

    },

    actions: {

        validationVideo (context) {
            context.commit('validationVideo')
        },

        async loadPreviewVideos({commit}) {

            await axios.get('/api/preview-videos')
                .then(response =>
                    {
                        const previewVideos = response.data
                        commit('fillPreviewVideos', previewVideos)
                    }
                )
                .catch(error => {console.log('Помилка підключення до бази даних:',  error)});

        },

        async loadAllVideos({commit}, page) {

            await axios.get('/api/videos?page=' + page)
                .then(response =>
                    {
                        const allVideos = response.data
                        commit('fillAllVideos', allVideos)
                    }
                )
                .catch(error => {console.log('Помилка підключення до бази даних: ', error)});

        },

    }
}
