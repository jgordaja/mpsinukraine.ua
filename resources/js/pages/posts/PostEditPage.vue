<template>
    <section class="post-edit">

        <title-section
            title="Редагувати допис"
        >
            <div>
                <button class="more-news__btn" @click="$router.back()">Повернутись до новин<span></span></button>
            </div>
        </title-section>

        <section class="news container">
            <div class="album py-5 bg-light">
                <div class="container">
                    <form id="new-post-form" @submit.prevent="update(id)">
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Заголовок допису</label>
                            <div class="col-sm-10">
                                <input type="text" v-focus class="form-control" id="title" name="title"
                                   :value="title"
                                    @input="post.title = $event.target.value; title = $event.target.value;"
                                >
                                <span v-show="errorTitlePost" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="content" class="col-sm-2 col-form-label">Контент</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content" name="content" style="height: 300px;"
                                   :value="content"
                                   @input="post.description = $event.target.value; content = $event.target.value;"
                                >
                                </textarea>
                                <span v-show="errorContentPost" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="status" class="form-label">Статус новини</label>
                                <select id="status" name="status_id" class="form-control"
                                     @input="post.status_id = $event.target.value; status_id = $event.target.value;"
                                >
                                    <option v-for="status in statuses">{{ status.name }}</option>
                                </select>
                                <span v-show="errorStatusPost" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                            <div class="col-md-6">
                                <label for="top" class="form-label">Додати в топ</label>
                                <select id="top" name="top_id" class="form-control"
                                    @input="post.top_id = $event.target.value; top_id = $event.target.value;"
                                >
                                    <option v-for="top in tops">{{ top.name }}</option>
                                </select>
                                <span v-show="errorTopPost" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date" class="col-sm-2 col-form-label">Дата публикації</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="date" name="date"
                                       :value="date"
                                       @input="post.date = $event.target.value; date = $event.target.value;"
                                >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Завантажити зображення</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="image" name="image" @change="selectFile"
                                   @input="post.image = $event.target.value; image = $event.target.value;"
                                >
                                <span v-show="errorImgPost" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                        </div>
                        <add-item-button>Зберегти</add-item-button>
                    </form>
                    <section class="more-btn__section">
                        <div>
                            <button class="mobile-more-news__btn" @click="$router.back()">Повернутись до новин<span></span></button>
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

    name: "PostEditPage",

    props: {
        id: BigInt,
        title: String,
        content: String,
        date: String,
        status_id: String,
        top_id: String,
    },

    data() {
        return {
            post: {
                title: '',
                description: '',//content
                status_id: '',
                top_id: '',
                date: '',
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

        statuses() {
            return this.allStatuses
        },

        tops() {
            return this.allTops
        },

        errorTitlePost() {
            return this.getErrorTitlePost
        },
        errorContentPost() {
            return this.getErrorContentPost
        },
        errorStatusPost() {
            return this.getErrorStatusIdPost
        },
        errorTopPost() {
            return this.getErrorTopIdPost
        },
        errorDatePost() {
            return this.getErrorDatePost
        },
        errorImgPost() {
            return this.getErrorImgPost
        },

        isValidPost() {
            return this.getIsValidPost
        },

        ...mapGetters([
            'getPath',
            'allStatuses',
            'allTops',
            'getErrorTitlePost',
            'getErrorContentPost',
            'getErrorStatusIdPost',
            'getErrorTopIdPost',
            'getErrorDatePost',
            'getErrorImgPost',
            'getIsValidPost'
        ])

    },

    methods: {

        ...mapMutations([
            'setTitlePost',
            'setContentPost',
            'setStatusIdPost',
            'setTopIdPost',
            'setUserIdPost',
            'setDatePost',
            'setImgPost'
        ]),
        ...mapActions([
            'validationPost',
            'validationEditPost',
            'loadStatuses',
            'loadTops',
            'loadPublishedPosts',
            'updatePost'
        ]),

        selectFile (event) {
            this.post.image = event.target.files[0]
        },

        update(id) {

            //передача параметров в хранилище для дальнейшей их валидации

            //статус перевести в число
            if (!this.post.status_id) {
                console.log('error status!!!!')
                this.post.status_id = ''
            } else {
                if (this.post.status_id === 'publish') {
                    this.post.status_id = '1'
                } else {
                    this.post.status_id = '0'
                }
            }

            //top перевести в число
            if (!this.post.top_id) {
                console.log('error top!!!!')
                this.post.top_id = ''
            } else {
                if (this.post.top_id === 'off') {
                    this.post.top_id = '1'
                } else {
                    this.post.top_id = '2'
                }
            }

            this.setTitlePost(this.post.title)
            this.setContentPost(this.post.description)//content
            this.setStatusIdPost(this.post.status_id)
            this.setTopIdPost(this.post.top_id)
            this.setDatePost(this.post.date)
            this.setImgPost(this.post.image)

            let myForm = new FormData()

            myForm.append('id', this.id)
            myForm.append('title', this.post.title)
            myForm.append('description', this.post.description)//content
            myForm.append('status_id', this.post.status_id)
            myForm.append('top_id', this.post.top_id)
            myForm.append('date', this.post.date)
            myForm.append('image', this.post.image)
            myForm.append('_method', 'PATCH')

            //вызов действий валидации
            this.validationPost()

            //если валидация успешна - добавляем запись в базу
            if (this.isValidPost) {

                axios.post(`/api/posts/${this.id}`, myForm, {
                    headers: {
                        'Authorization': `Bearer ${this.$store.state.token}`
                    }
                })
                    .then(response => {
                        //console.log(response)
                        this.loadPublishedPosts()
                        this.$swal.fire({title: 'Допис успішно змінено!', icon: 'success'}) // вывести сообщение об этом
                        this.$router.push('/posts') // вернуться на странницу со статьями
                    })
                    .catch(error => {
                        this.$swal.fire({
                            title: 'Помилка!',
                            text: 'Допис не додано в базу!',
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
