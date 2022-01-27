<template>
    <section class="video-create">

        <title-section
            title="Додати новий відеоролик"
        >
            <div>
                <button class="more-news__btn" @click="$router.back()">Повернутись до відео<span></span></button>
            </div>
        </title-section>

        <section class="news container">
            <div class="album py-5 bg-light">
                <div class="container">
                    <form id="new-post-form" @submit.prevent="save()">
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Заголовок відеоролика</label>
                            <div class="col-sm-10">
                                <input v-model.trim="video.title" v-focus type="text" class="form-control" id="title" name="title">
                                <span v-show="errorTitleVideo" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="content" class="col-sm-2 col-form-label">Контент</label>
                            <div class="col-sm-10">
                                <textarea v-model.trim="video.description" class="form-control" id="content" name="content" style="height: 150px;"></textarea>
                                <span v-show="errorDescriptionVideo" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="date" class="form-label">Дата публикації</label>
                                <div class="form-label">
                                    <input v-model="video.date" class="form-control" type="date" id="date" name="date">
                                    <span v-show="errorDateVideo" class="errorText">*Поле є обов'язковим для заповнення!</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="top" class="form-label">Додати в топ</label>
                                <select v-model="video.top_id" id="top" name="top_id" class="form-control">
                                    <option v-for="top in tops">{{ top.name }}</option>
                                </select>
                                <span v-show="errorTopIdVideo" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="link" class="col-sm-2 col-form-label">Посилання на відео</label>
                            <div class="col-sm-10">
                                <input v-model="video.link" class="form-control" type="text" id="link" name="link">
                                <span v-show="errorLinkVideo" class="errorText">*Поле є обов'язковим для заповнення!</span>
                            </div>
                        </div>

                        <add-item-button>Зберегти</add-item-button>

                    </form>

                    <section class="more-btn__section">
                        <div>
                            <button class="mobile-more-news__btn" @click="$router.back()">
                                Повернутись до відеороликів<span></span>
                            </button>
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
    name: "VideoCreatePage",

    data() {
        return {
            video: {
                title: '',
                description: '',
                top_id: '',
                date: '',
                link: '',
            },
        }
    },

    created() {
        this.loadTops()
    },

    computed: {

        tops() {
            return this.allTops
        },

        errorTitleVideo() {
            return this.getErrorTitleVideo
        },
        errorDescriptionVideo() {
            return this.getErrorDescriptionVideo
        },
        errorTopIdVideo() {
            return this.getErrorTopIdVideo
        },
        errorDateVideo() {
            return this.getErrorDateVideo
        },
        errorLinkVideo() {
            return this.getErrorLinkVideo
        },

        isValidVideo() {
            return this.getIsValidVideo
        },

        ...mapGetters([
            'allTops',
            'getErrorTitleVideo',
            'getErrorDescriptionVideo',
            'getErrorTopIdVideo',
            'getErrorDateVideo',
            'getErrorLinkVideo',
            'getIsValidVideo'
        ])

    },

    methods: {

        ...mapMutations([
            'setTitleVideo',
            'setDescriptionVideo',
            'setTopIdVideo',
            'setDateVideo',
            'setLinkVideo'
        ]),
        ...mapActions([
            'loadAllVideos',
            'validationVideo',
            'loadTops'
        ]),

        save() {

            //передача параметров в хранилище для дальнейшей их валидации

            //top перевести в число
            if (!this.video.top_id) {
                this.video.top_id = ''
            } else {
                if (this.video.top_id === 'off') {
                    this.video.top_id = '1'
                } else {
                    this.video.top_id = '2'
                }
            }

            this.setTitleVideo(this.video.title)
            this.setDescriptionVideo(this.video.description)
            this.setTopIdVideo(this.video.top_id)
            this.setDateVideo(this.video.date)
            this.setLinkVideo(this.video.link)

            // //вызов действий валидации
            this.validationVideo()

            //если валидация успешна - добавляем запись в базу
            if (this.isValidVideo) {

                //добавление новой записи в базу

                axios.post(`/api/videos`, this.video, {
                    headers: {
                        'Authorization': `Bearer ${this.$store.state.token}`
                    }
                })
                    .then(response => {
                        this.$swal.fire({title: 'Новий відео-ролик успішно додано!', icon: 'success'})
                        this.loadAllVideos()
                        this.$router.push('/useful-materials/videos')
                    })
                    .catch(error => {
                        this.$swal.fire({
                            title: 'Помилка! Відео не додано в базу!',
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

    .video-create {
        margin-top: 80px;
    }
    @media (max-width: 1730px) {
        .video-create {
            margin-top: 170px;
        }
    }
    @media (max-width: 767px) {
        .video-create {
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
