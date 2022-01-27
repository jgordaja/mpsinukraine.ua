<template>
    <section class="articles-page">
        <section class="news container">

            <template v-if="!articles.data && !articles.length">
                <h1>Тут поки що немає статтей!</h1>
            </template>

            <template v-else>
                <ul class="row flex">
                    <li class="col" v-for="article in articles.data" :key="article.id">
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
                            <span><img :src="getPath+article.img_path" :alt="article.img_name"></span>
                            <span class="title-news">
                                <p>{{ article.title }}</p>
                            </span>
                            <span class="content-news">
                                <p>{{ shortContent(article.description) }}</p>
                            </span>
                            <span class="see-more__btn">Детальніше</span>
                        </router-link>
                        <a :href="article.link" target="_blank">
                            <span class="see-more__btn link-booklet">Посилання на оригінальну статтю</span>
                        </a>

                        <template v-if="user !== null">
                            <template v-if="user.role === 'admin'">
                                <div class="flex">
                                    <button type="button" class="btn btn-outline-danger" title="Редагувати публікацю"
                                        @click="$router.push({
                                            name: 'article-edit',
                                            params: {
                                                id: `${article.id}`,
                                                title: `${article.title}`,
                                                description: `${article.description}`,
                                                img_name: `${article.img_name}`,
                                                img_path: `${article.img_path}`,
                                                link: `${article.link}`,
                                                top_id: `${article.top_id}`,
                                            }
                                    })">
                                        <i class="bi-file-earmark-text"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger" title="видалити статтю" @click="delArticle(article.id)">
                                        <i class="bi bi-file-earmark-x"></i>
                                    </button>
                                </div>
                            </template>
                        </template>
                    </li>
                </ul>

                <div class="paginator">
                    <pagination v-model="page" :records="articles.meta.total" :per-page="6" @paginate="loadAllArticles"/>
                </div>

            </template>

            <template v-if="user !== null">
                <template v-if="user.role === 'admin'">
                    <router-link class-active="router-link-active" to="/useful-materials/articles/create" exact>
                        <add-item-button>Додати статтю</add-item-button>
                    </router-link>
                </template>
            </template>

        </section>
    </section>
</template>

<script>
import { methodsForPosts } from "../../mixins/methodsForPosts.js"
import { mapGetters, mapActions } from 'vuex'
import Pagination from 'v-pagination-3';

export default {

    name: "ArticlesLists",

    mixins: [ methodsForPosts ],

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

        getPath() {
            return this.getPath
        },

        articles() {
            return this.allArticles
        },

        ...mapGetters(['allArticles', 'getPath', 'getUser'])

    },

    mounted() {
        this.loadAllArticles(this.page)
    },

    methods: {

        ...mapActions(['loadAllArticles']),

        //удаление статьи с БД

        delArticle(id) {

            this.$swal.fire({
                title: 'Ви дійсно хочете видалити цю статтю?',
                text: "Ви не зможете відмінити цю дію!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Відмінити',
                confirmButtonText: 'Так, видалити!'
            }).then((result) => {
                if (result.isConfirmed) {

                    axios.delete(`/api/articles/${id}`,{
                        headers: {
                            'Authorization': `Bearer ${this.$store.state.token}`
                        }
                    })
                        .then(response => {
                            //console.log(response)
                            this.loadAllArticles(this.page)
                            this.$swal.fire({title: 'Статтю видалено з бази!', icon: 'success'})
                            this.$router.push("/useful-materials/articles") // вернуться на странницу со статьями
                        })
                        .catch(error => {
                            this.$swal.fire({
                                title: 'Помилка!',
                                text: 'Статтю не видалено!',
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

<style scoped>

    span.see-more__btn.link-booklet::after {
        content: '';
    }
    span.link-booklet {
        text-align: center;
        padding-bottom: 15px;
    }

    section .news .content-news {
        padding-bottom: 0;
    }

    .btn {
        margin: 0 auto;
    }

</style>
