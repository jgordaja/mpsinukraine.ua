export default {

    state() {
        return {

            articles: [],
            previewArticles: [],

            article: {
                title: '',
                description: '',
                link: '',
                image: '',
                top_id: '',
            },
            errorTitleArticle: false,
            errorDescriptionArticle: false,
            errorLinkArticle: false,
            errorImageArticle: false,
            errorTopIdArticle: false,

            isValidArticle: '',

        }
    },

    getters: {

        allArticles(state) {
            return state.articles
        },
        previewArticles(state) {
            return state.previewArticles
        },

        getErrorTitleArticle(state) {
            return state.errorTitleArticle
        },
        getErrorDescriptionArticle(state) {
            return state.errorDescriptionArticle
        },
        getErrorLinkArticle(state) {
            return state.errorLinkArticle
        },
        getErrorTopIdArticle(state) {
            return state.errorTopIdArticle
        },
        getErrorImageArticle(state) {
            return state.errorImageArticle
        },

        getIsValidArticle(state) {
            return state.isValidArticle
        },

    },

    mutations: {

        fillAllArticles(state, payload) {
            state.articles = payload
        },
        fillPreviewArticles(state, payload) {
            state.previewArticles = payload
        },

        setTitleArticle(state, payload){
            state.article.title = payload
        },
        setDescriptionArticle(state, payload){
            state.article.description = payload
        },
        setLinkArticle(state, payload){
            state.article.link = payload
        },
        setTopIdArticle(state, payload){
            state.article.top_id = payload
        },
        setImageArticle(state, payload){
            state.article.image = payload
        },

        //валидация, получение данных с формы
        validationArticle(state) {

            //сброс ошибок при каждой отправке формы и проверке полей
            state.errorTitleArticle = false
            state.errorDescriptionArticle = false
            state.errorLinkArticle = false
            state.errorImageArticle = false
            state.errorTopIdArticle = false

            //проверка полей на заполненность
            if (! state.article.title) {
                state.errorTitleArticle = true
            }

            if (! state.article.description) {
                state.errorDescriptionArticle = true
            }

            if (! state.article.link) {
                state.errorLinkArticle = true
            }

            if (! state.article.image) {
                state.errorImageArticle = true
            }

            if (! state.article.top_id) {
                state.errorTopIdArticle = true
            }

            if (!state.errorTitleArticle && !state.errorDescriptionArticle && !state.errorLinkArticle && !state.errorImageArticle && !state.errorTopIdArticle) {
                state.isValidArticle = true // поля не пустые
            } else {
                state.isValidArticle = false // одно из полей может быть пустым
            }

        },

    },

    actions: {

        validationArticle (context) {
            context.commit('validationArticle')
        },

        async loadPreviewArticles({commit}) {

            await axios.get('/api/preview-articles')
                .then(response =>
                    {
                        const previewArticles = response.data
                        commit('fillPreviewArticles', previewArticles)
                    }
                )
                .catch(error => {console.log('Помилка підключення до бази даних:',  error)});

        },

        async loadAllArticles({commit}, page) {

            await axios.get('/api/articles?page=' + page)
                .then(response =>
                    {
                        const allArticles = response.data
                        commit('fillAllArticles', allArticles)
                    }
                )
                .catch(error => {console.log('Помилка підключення до бази даних: ', error)});

        },

    }
}
