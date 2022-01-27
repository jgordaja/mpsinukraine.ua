<template>
    <section class="post-create">

        <title-section
            title="Додати новий допис"
        >
            <div>
                <button class="more-news__btn" @click="$router.back()">Повернутись до новин<span></span></button>
            </div>
        </title-section>

        <section class="news container">
            <div class="album py-5 bg-light">
                <div class="container">
                    <form id="new-post-form" @submit.prevent="save()">
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Заголовок допису</label>
                            <div class="col-sm-10">
                                <input v-model.trim="post.title" v-focus type="text" class="form-control" id="title" name="title">
                                <span v-show="errorTitlePost" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="content" class="col-sm-2 col-form-label">Контент</label>
                            <div class="col-sm-10">
                                <textarea v-model.trim="post.description" class="form-control" id="content" name="content" style="height: 300px;"></textarea>
                                <span v-show="errorContentPost" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="status" class="form-label">Статус новини</label>
                                <select v-model="post.status_id" id="status" name="status_id" class="form-control">
                                    <option v-for="status in statuses">{{ status.name }}</option>
                                </select>
                                <span v-show="errorStatusPost" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                            <div class="col-md-6">
                                <label for="top" class="form-label">Додати в топ</label>
                                <select v-model="post.top_id" id="top" name="top_id" class="form-control">
                                    <option v-for="top in tops">{{ top.name }}</option>
                                </select>
                                <span v-show="errorTopPost" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date" class="col-sm-2 col-form-label">Дата публикації</label>
                            <div class="col-sm-10">
                                <input v-model="post.date" type="date" class="form-control" id="date" name="date">
                                <span v-show="errorDatePost" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Завантажити зображення</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="image" name="image" @change="selectFile">
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
import { mapGetters, mapMutations, mapActions } from 'vuex'

export default {

    name: "PostsCreatePage",

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

        user() {
            return this.getUser
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
            'allStatuses',
            'allTops',
            'getErrorTitlePost',
            'getErrorContentPost',
            'getErrorStatusIdPost',
            'getErrorTopIdPost',
            'getErrorDatePost',
            'getErrorImgPost',
            'getIsValidPost',
            'getUser'
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
            'loadPublishedPosts',
            'validationPost',
            'loadStatuses',
            'loadTops'
        ]),

        selectFile (event) {
            this.post.image = event.target.files[0]
        },

        save() {

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

            myForm.append('title', this.post.title)
            myForm.append('description', this.post.description)//content
            myForm.append('status_id', this.post.status_id)
            myForm.append('top_id', this.post.top_id)
            myForm.append('date', this.post.date)
            myForm.append('image', this.post.image)

            // for (var key of myForm.entries())
            // {
            //     console.log(key[0]+ ', '+ key[1]);
            // }

            // //вызов действий валидации
            this.validationPost()

            //если валидация успешна - добавляем запись в базу
            if (this.isValidPost) {

                //добавление новой записи в базу

                axios.post(`/api/posts`, myForm, this.user, {
                    headers: {
                        Authorization: `Bearer ${this.$store.state.token}`,
                    }
                })
                    .then(response => {
                        this.$swal.fire({title: 'Новий допис успішно додано!', icon: 'success'})
                        this.loadPublishedPosts()
                        this.$router.push('/posts') // вернуться на странницу со статьями
                    })
                    .catch(error => {

                        //лучше объявить глоб массив, записывать туда ошибки и выводить их под каждым полем
                        let errorsArray = []

                        //вывод ошибки даты, как один из пунктов
                        console.log('error', error.response.data)
                        console.log('errors', error.response.data.errors)

                        //если есть ошибка валидации даты
                        if (error.response.data.errors.date) {
                            console.log('errors date', error.response.data.errors.date)
                            errorsArray.push(error.response.data.errors.date)
                        }
                        //и так для каждого поля нужно сделать

                        this.$swal.fire({
                            title: 'Помилка! Допис не додано в базу!',
                            text: errorsArray,
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

<style>

    .post-create {
        margin-top: 80px;
    }
    @media (max-width: 1730px) {
        .post-create {
            margin-top: 170px;
        }
    }
    @media (max-width: 767px) {
        .post-create {
            margin-top: 100px;
        }
    }
    .errorText {
        color: darkred;
    }
    @media (max-width: 767px) {
        .more-news__btn {
            display: none;
        }
    }

</style>
