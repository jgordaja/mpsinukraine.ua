export default {

    state() {
        return {

            publishedPosts: [],
            previewPosts: [],

            news: {
                title: '',
                content: '',
                status_id: '',
                top_id: '',
                date: '',
                image: ''
            },
            errorTitlePost: false,
            errorContentPost: false,
            errorStatusIdPost: false,
            errorTopIdPost: false,
            errorDatePost: false,
            errorImgPost: false,

            isValidPost: '',

        }
    },

    getters: {

        getPublishedPosts(state) {
            return state.publishedPosts
        },

        //3 поста на главную страницу
        getPreviewPosts(state) {
            return state.previewPosts
        },

        getErrorTitlePost(state) {
            return state.errorTitlePost
        },
        getErrorContentPost(state) {
            return state.errorContentPost
        },
        getErrorStatusIdPost(state) {
            return state.errorStatusIdPost
        },
        getErrorTopIdPost(state) {
            return state.errorStatusIdPost
        },
        getErrorDatePost(state) {
            return state.errorDatePost
        },
        getErrorImgPost(state) {
            return state.errorImgPost
        },

        getIsValidPost(state) {
            return state.isValidPost
        },

    },

    mutations: {

        //заполнить массив опубликованных постов
        fillPublishedPosts(state, payload) {
            state.publishedPosts = payload
        },
        //заполнить массив с 3-мя постами на главную страницу
        fillPreviewPosts(state, payload) {
            state.previewPosts = payload
        },

        setTitlePost(state, payload){
            state.news.title = payload
        },
        setContentPost(state, payload){
            state.news.content = payload
        },
        setStatusIdPost(state, payload){
            state.news.status_id = payload
        },
        setTopIdPost(state, payload){
            state.news.top_id = payload
        },
        setUserIdPost(state, payload){
            state.news.user_id = payload
        },
        setDatePost(state, payload){
            state.news.date = payload
        },
        setImgPost(state, payload){
            state.news.image = payload
        },

        //валидация, получение данных с формы

        validationPost(state) {

            //сброс ошибок при каждой отправке формы и проверке полей

            state.errorTitlePost = false
            state.errorContentPost = false
            state.errorStatusIdPost = false
            state.errorTopIdPost = false
            state.errorDatePost = false
            state.errorImgPost = false

            //проверка полей на заполненность

            if (! state.news.title) {
                state.errorTitlePost = true
                console.log('state.errorTitlePost', state.errorTitlePost)
            }

            if (! state.news.content) {
                state.errorContentPost = true
                console.log('state.errorContentPost', state.errorContentPost)
            }

            if (! state.news.status_id) {
                state.errorStatusIdPost = true
                console.log('state.errorStatusIdPost', state.errorStatusIdPost)
            }

            if (! state.news.top_id) {
                state.errorTopIdPost = true
                console.log('state.errorTopIdPost', state.errorTopIdPost)
            }

            if (! state.news.date) {
                state.errorDatePost = true
                console.log('state.errorDatePost', state.errorDatePost)
            }

            if (! state.news.image) {
                state.errorImgPost = true
                console.log('state.errorImgPost', state.errorImgPost)
            }

            if (!state.errorTitlePost && !state.errorContentPost && !state.errorStatusIdPost && !state.errorTopIdPost && !state.errorDatePost && !state.errorImgPost) {
                state.isValidPost = true // поля не пустые
            } else {
                state.isValidPost = false // хотя бы одно из полей оказалось пустым
            }

        },

    },

    actions: {

        // действие валидации
        validationPost (context) {
            context.commit('validationPost')
        },

        //загрузить 3 posts из БД
        async loadPreviewPublishedPosts ({commit}) {

            await axios.get('/api/preview-posts')
             .then(response =>
                {
                    const previewPosts = response.data
                    commit('fillPreviewPosts', previewPosts)
                }
            )
            .catch(error => {console.log('Помилка підключення до бази даних: ' . error)});

        },

        //загрузить posts со статусом published из БД
        async loadPublishedPosts({commit}, payload) {

            await axios.get('/api/published-posts?page=' + payload)
             .then(response =>
                {
                    const publishedPosts = response.data
                    commit('fillPublishedPosts', publishedPosts)
                }
            )
            .catch(error => console.log('Помилка підключення до бази даних: ' . error));

        },

    }

}
