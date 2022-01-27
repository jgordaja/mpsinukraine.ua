<template>
    <section class="preview-articles">

        <title-section
            title="Статті про нас"
        >
            <div>
                <button class="more-news__btn" @click="$router.push('/useful-materials/articles')">Більше статтей<span></span></button>
            </div>
        </title-section>

        <section class="articles container">
            <ul class="row flex">

                <template v-if="!previewArticles.length">
                    <h1>Тут поки що немає статтей!</h1>
                </template>

                <li class="col" v-for="article in previewArticles" :key="article.id">
                    <div>
                        <router-link class="more-details__btn" :to="{
                            name: 'article-item',
                            params: {
                                id: `${article.id}`,
                                description: `${article.description}`,
                                title: `${article.title}`,
                                link: `${article.link}`,
                                img_name: `${article.img_name}`,
                                img_path: `${article.img_path}`,
                             }
                        }">
                            <span class="img-articles"></span>
                            <span class="title-articles">
                                <p>{{ article.title }}</p>
                            </span>
                            <span class="content-articles">
                                <p>{{ shortContent(article.description) }}</p>
                            </span>
                            <span class="see-more__btn">Читати</span>
                        </router-link>
                    </div>
                </li>
            </ul>
            <section class="more-btn__section">
                <div class="more">
                    <span></span>
                </div>
                <div>
                    <button class="mobile-more-news__btn" @click="$router.push('/useful-materials/articles')">
                        Більше статтей<span></span>
                    </button>
                </div>
            </section>
        </section>
    </section>
</template>

<script>
import { methodsForPosts } from "../../mixins/methodsForPosts.js"
import { mapGetters, mapActions } from 'vuex'

export default {

    name: "ArticlesPreview",

    mixins: [ methodsForPosts ],

    computed: {

        previewArticles() {
            return this.previewArticles
        },

        ...mapGetters(['previewArticles'])

    },

    created() {
        this.loadPreviewArticles()
    },

    methods: {

        ...mapActions(['loadPreviewArticles']),

    },
}
</script>

<style scoped>

</style>
