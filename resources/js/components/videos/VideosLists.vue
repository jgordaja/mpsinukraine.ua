<template>
    <section class="preview-videos">
        <section class="videos container">

            <template v-if="!videos.data && !videos.length">
                <h1>Тут поки що немає відеороликів!</h1>
            </template>

            <template v-else>
                <ul class="row flex">
                    <li class="col" v-for="video in videos.data" :key="video.id">
                        <router-link class="more-details__btn" :to="{
                            name: 'video-item',
                            params: {
                                id: `${video.id}`,
                                description: `${video.description}`,
                                title: `${video.title}`,
                                link: `${video.link}`,
                                date: `${video.date}`,
                             }
                        }">
                            <span class="date-videos">{{ video.date }}</span>
                            <span class="video-block">
                                <iframe :src="video.link" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </span>
                            <span class="title-videos">
                                <p>{{ video.title }}</p>
                            </span>
                            <span class="content-videos">
                                <p>{{ video.description }}</p>
                            </span>
                        </router-link>

                        <template v-if="user !== null">
                            <template v-if="user.role === 'admin'">
                                <div class="flex">
                                    <button type="button" class="btn btn-outline-danger" title="Редагувати"
                                        @click="$router.push({
                                        name: 'video-edit',
                                            params: {
                                                id: `${video.id}`,
                                                description: `${video.description}`,
                                                title: `${video.title}`,
                                                link: `${video.link}`,
                                                date: `${video.date}`,
                                             }
                                    })">
                                        <i class="bi-file-earmark-text"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger" title="видалити відеоролик" @click="delVideo(video.id)">
                                        <i class="bi bi-file-earmark-x"></i>
                                    </button>
                                </div>
                            </template>
                        </template>
                    </li>
                </ul>

                <div class="paginator">
                    <pagination v-model="page" :records="videos.meta.total" :per-page="6" @paginate="loadAllVideos"/>
                </div>

            </template>

            <template v-if="user !== null">
                <template v-if="user.role === 'admin'">
                    <router-link class-active="router-link-active" to="/useful-materials/videos/create" exact>
                        <add-item-button>Додати відео</add-item-button>
                    </router-link>
                </template>
            </template>

        </section>
    </section>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import Pagination from 'v-pagination-3';

export default {

    name: "VideosLists",

    components: {
        Pagination
    },

    data() {
        return {
            page: 1
        }
    },

    computed: {

        user() {
            return this.getUser
        },

        videos() {
            return this.allVideos
        },

        ...mapGetters(['allVideos', 'getUser'])

    },

    mounted() {
        this.loadAllVideos(this.page)
    },

    methods: {

        ...mapActions(['loadAllVideos']),

        //удаление видео с БД

        delVideo(id) {

            this.$swal.fire({
                title: 'Ви дійсно хочете видалити цей відеоролик?',
                text: "Ви не зможете відмінити цю дію!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Відмінити',
                confirmButtonText: 'Так, видалити!'
            }).then((result) => {
                if (result.isConfirmed) {

                    axios.delete(`/api/videos/${id}`,{
                        headers: {
                            'Authorization': `Bearer ${this.$store.state.token}`
                        }
                    })
                        .then(response => {
                            //console.log(response)
                            this.loadAllVideos(this.page)
                            this.$swal.fire({title: 'Відео видалено з бази!', icon: 'success'})
                            this.$router.push("/useful-materials/videos") // вернуться на странницу со статьями
                        })
                        .catch(error => {
                            this.$swal.fire({
                                title: 'Помилка!',
                                text: 'Відео не видалено!',
                                icon: 'error',
                                confirmButtonText: 'ОК'
                            })
                        });

                }
            })

        },
    }


}
</script>

<style>

    @media (max-width: 767px) {
        .row {
            display: block;
        }
    }

</style>
