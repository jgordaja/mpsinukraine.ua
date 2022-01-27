<template>
    <section class="post-edit">

        <title-section
            title="Редагувати статтю"
        >
            <div>
                <button class="more-news__btn" @click="$router.back()">Повернутись до статтей<span></span></button>
            </div>
        </title-section>

        <section class="news container">
            <div class="album py-5 bg-light">
                <div class="container">
                    <form id="new-post-form" @submit.prevent="update()">
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Заголовок статті</label>
                            <div class="col-sm-10">
                                <input type="text" v-focus class="form-control" id="title" name="title"
                                   :value="title"
                                    @input="article.title = $event.target.value; title = $event.target.value;"
                                >
                                <span v-show="errorTitleArticle" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="content" class="col-sm-2 col-form-label">Контент</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content" name="content" style="height: 300px;"
                                   :value="description"
                                   @input="article.description = $event.target.value; content = $event.target.value;"
                                >
                                </textarea>
                                <span v-show="errorDescriptionArticle" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="top" class="col-sm-2 col-form-label">Додати в топ</label>
                            <div class="col-sm-10">
                                <select v-model="article.top_id" id="top" name="top_id" class="form-control"
                                        @input="article.top_id = $event.target.value; top_id = $event.target.value;"
                                >
                                    <option v-for="top in tops">{{ top.name }}</option>
                                </select>
                            </div>
                            <span v-show="errorTopArticle" class="errorText">*Поле є обов'язковим для заповнення!</span>
                        </div>
                        <div class="row mb-3">
                            <label for="link" class="col-sm-2 col-form-label">Посилання на джерело</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="link" name="image"
                                   :value="link"
                                   @input="article.link = $event.target.value; link = $event.target.value;"
                                >
                                <span v-show="errorLinkArticle" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Завантажити зображення</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="image" name="image" @change="selectFile"
                                   @input="article.image = $event.target.value; image = $event.target.value;"
                                >
                                <span v-show="errorImageArticle" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                        </div>
                        <add-item-button>Зберегти</add-item-button>
                    </form>
                    <section class="more-btn__section">
                        <div>
                            <button class="mobile-more-news__btn" @click="$router.back()">Повернутись до статтей<span></span></button>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
import {mapActions, mapGetters, mapMutations} from "vuex";

export default {

    name: "ArticleEditPage",

    props: {
        id: String,
        link: String,
        title: String,
        description: String,
    },


    data() {
        return {
            article: {
                title: '',
                description: '',
                top_id: '',
                image: null,
            },
        }
    },

    created() {
        this.loadStatuses()
        this.loadTops()
    },

    computed: {

        getPath() {
            return this.getPath
        },

        tops() {
            return this.allTops
        },

        errorTitleArticle() {
            return this.getErrorTitleArticle
        },
        errorDescriptionArticle() {
            return this.getErrorDescriptionArticle
        },
        errorLinkArticle() {
            return this.getErrorLinkArticle
        },
        errorTopArticle() {
            return this.getErrorTopIdArticle
        },
        errorImageArticle() {
            return this.getErrorImageArticle
        },

        isValidArticle() {
            return this.getIsValidArticle
        },

        ...mapGetters([
            'allStatuses',
            'allTops',
            'getErrorTitleArticle',
            'getErrorDescriptionArticle',
            'getErrorLinkArticle',
            'getErrorTopIdArticle',
            'getErrorImageArticle',
            'getIsValidArticle'
        ])

    },

    methods: {

        ...mapMutations([
            'setTitleArticle',
            'setDescriptionArticle',
            'setLinkArticle',
            'setTopIdArticle',
            'setImageArticle',
        ]),
        ...mapActions([
            'loadAllArticles',
            'validationArticle',
            'loadStatuses',
            'loadTops'
        ]),

        selectFile (event) {
            this.article.image = event.target.files[0]
        },

        update() {

            //top перевести в число
            if (!this.article.top_id) {
                this.article.top_id = ''
            } else {
                if (this.article.top_id === 'off') {
                    this.article.top_id = '1'
                } else {
                    this.article.top_id = '2'
                }
            }

            this.setTitleArticle(this.article.title)
            this.setDescriptionArticle(this.article.description)//content
            this.setLinkArticle(this.article.link)
            this.setTopIdArticle(this.article.top_id)
            this.setImageArticle(this.article.image)

            let myForm = new FormData()

            myForm.append('id', this.id)
            myForm.append('title', this.article.title)
            myForm.append('description', this.article.description)
            myForm.append('top_id', this.article.top_id)
            myForm.append('link', this.article.link)
            myForm.append('image', this.article.image)
            myForm.append('_method', 'PATCH')

            // //вызов действий валидации
            this.validationArticle()

            //если валидация успешна - добавляем запись в базу
            if (this.isValidArticle) {

                axios.post(`/api/articles/${this.id}`, myForm, {
                    headers: {
                        'Authorization': `Bearer ${this.$store.state.token}`
                    }
                })
                    .then(response => {
                        //console.log('response', response);
                        this.$swal.fire({title: 'Статтю успішно відредаговано!', icon: 'success'})
                        this.loadAllArticles()
                        this.$router.push('/useful-materials/articles') // вернуться на странницу со статьями
                    })
                    .catch(error => {
                        this.$swal.fire({
                            title: 'Помилка! Статтю не вдалось відредагувати!',
                            text: error,
                            icon: 'error',
                            confirmButtonText: 'ОК'
                        })
                    });

            } else {

                this.$swal.fire({
                    title: 'Помилка!',
                    text: 'Треба заповнити всі поля!',
                    icon: 'error',
                    confirmButtonText: 'ОК'
                })

            }

        },

    }

}

</script>

<style scoped>

    .post-edit {
        margin-top: 80px;
    }
    @media (max-width: 1730px) {
        .post-edit {
            margin-top: 170px;
        }
    }
    @media (max-width: 767px) {
        .post-edit {
            margin-top: 100px;
        }
    }
    .errorText {
        color: darkred;
    }

</style>
