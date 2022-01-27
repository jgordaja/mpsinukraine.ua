<template>
    <section class="preview-news">

        <title-section
            title="Наші новини"
        >
            <div>
                <button class="more-news__btn" @click="$router.push('/posts')">Більше новин<span></span></button>
            </div>
        </title-section>

        <section class="news container">
            <ul class="row flex">

                <template v-if="!previewPosts.length">
                    <h1>Тут поки що немає дописів!</h1>
                </template>

                <li class="col"  v-for="post in previewPosts" :key="post.id">
                    <router-link class="more-details__btn" :to="{
                        name: 'posts-item',
                        params: {
                            id: `${post.id}`,
                            date: `${post.date}`,
                            title: `${post.title}`,
                            content: `${post.content}`,
                            img_name: `${post.img_name}`,
                            img_path: `${post.img_path}`,
                         }
                    }">
                        <span><img :src="getPath+post.img_path" :alt="post.img_name"></span>
                        <span class="date-news">{{ post.date }}</span>
                        <span class="title-news">
                            <p>{{ post.title }}</p>
                        </span>
                        <span class="content-news">
                            <p>{{ shortContent(post.content) }}</p>
                        </span>
                        <span class="see-more__btn">Детальніше</span>
                        </router-link>
                </li>
            </ul>

            <section class="more-btn__section">
                <div class="more">
                    <span></span>
                </div>
                <div>
                    <button class="mobile-more-news__btn" @click="$router.push('/posts')">Більше новин<span></span></button>
                </div>
            </section>

        </section>
    </section>
</template>

<script>
import { methodsForPosts } from "../../mixins/methodsForPosts.js"
import { mapGetters, mapActions } from 'vuex'

export default {

    name: "PostsPreview",

    mixins: [ methodsForPosts ],

    computed: {

        previewPosts() {
            return this.getPreviewPosts
        },

        getPath() {
            return this.getPath
        },

        ...mapGetters(['getPreviewPosts', 'getPath'])

    },

    created() {
        this.loadPreviewPublishedPosts()
    },

    methods: {

        ...mapActions(['loadPreviewPublishedPosts']),

    },

}
</script>

<style>

    .news img {
        width: 100%;
        height: 225px;
    }

</style>
