<template>
    <section class="preview-videos">
        <title-section
            title="Відеотека"
        >
            <div>
                <router-link to="/useful-materials/videos">
                    <button class="more-news__btn">Більше відео<span></span></button>
                </router-link>
            </div>
        </title-section>
        <section class="videos container">

            <template v-if="!previewVideos && !previewVideos.length">
                <h1>Тут поки що немає відеороликів!</h1>
            </template>

            <template v-else>
                <ul class="row flex">
                    <li class="col" v-for="video in previewVideos" :key="video.id">
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
                    </li>
                </ul>
            </template>

            <section class="more-btn__section">
                <div class="more">
                    <span></span>
                </div>
                <div>
                    <button class="mobile-more-news__btn" @click="$router.push('/useful-materials/videos')">
                        Більше відео<span></span>
                    </button>
                </div>
            </section>

        </section>
    </section>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {

    name: "VideosPreview",

    computed: {

        previewVideos() {
            return this.previewVideos
        },

        ...mapGetters(['previewVideos'])

    },

    mounted() {
        this.loadPreviewVideos(this.page)
    },

    methods: {

        ...mapActions(['loadPreviewVideos']),
    }

}
</script>

<style scoped>

</style>
