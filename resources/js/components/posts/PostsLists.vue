<template>
    <section class="posts-page">

        <title-section
            title="Наші новини"
        >
        </title-section>

        <section class="news container">

            <template v-if="publishedPosts.data && publishedPosts.data.length">
                <ul class="row flex">
                    <li class="col"  v-for="post in publishedPosts.data" :key="post.id">
                        <router-link class="more-details__btn" :to="{
                            name: 'posts-item',
                            params: {
                                id: `${post.id}`,
                                title: `${post.title}`,
                                content: `${post.content}`,
                                date: `${post.date}`,
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
                        <template v-if="user !== null">
                            <template v-if="user.role === 'admin'">
                                <div class="flex">
                                    <button type="button" class="btn btn-outline-danger" title="Редагувати публікацю"
                                        @click="$router.push({
                                            name: 'post-edit',
                                            params: {
                                                id: `${post.id}`,
                                                title: `${post.title}`,
                                                content: `${post.content}`,
                                                date: `${post.date}`,
                                                img_name: `${post.img_name}`,
                                                img_path: `${post.img_path}`,
                                                status_id: `${post.status_id}`,
                                                top_id: `${post.top_id}`,
                                            }
                                    })">
                                        <i class="bi-file-earmark-text"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger" title="видалити статтю" @click="delPost(post.id)">
                                        <i class="bi bi-file-earmark-x"></i>
                                    </button>
                                </div>
                            </template>
                        </template>
                    </li>
                </ul>

                <div class="paginator">
                    <pagination v-model="page" :records="publishedPosts.meta.total" :per-page="9" @paginate="loadPublishedPosts"/>
                </div>

            </template>

            <template v-else>
                <h1>Тут поки що немає дописів!</h1>
            </template>

            <template v-if="user !== null">
                <template v-if="user.role === 'admin'">
                    <router-link class-active="router-link-active" to="/posts/create" exact>
                        <add-item-button>Додати новину</add-item-button>
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

    name: "PostsLists",

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

        publishedPosts() {
            return this.getPublishedPosts
        },

        ...mapGetters(['getPublishedPosts', 'getPath', 'getUser'])

    },

    mounted() {
        this.loadPublishedPosts(this.page)
    },

    methods: {

        ...mapActions(['deletePost', 'loadPublishedPosts']),

        //удаление поста с БД

        delPost(id) {

            this.$swal.fire({
                title: 'Ви дійсно хочете видалити цей допис?',
                text: "Ви не зможете відмінити цю дію!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Відмінити',
                confirmButtonText: 'Так, видалити!'
            }).then((result) => {
                if (result.isConfirmed) {

                    axios.delete(`/api/posts/${id}`,{
                        headers: {
                            'Authorization': `Bearer ${this.$store.state.token}`
                        }
                    })
                    .then(response => {
                        //console.log(response)
                        this.loadPublishedPosts(this.page)
                        this.$swal.fire({title: 'Допис видалено з бази!', icon: 'success'})
                        this.$router.push('/posts') // вернуться на странницу со статьями
                    })
                    .catch(error => {
                        this.$swal.fire({
                            title: 'Помилка!',
                            text: 'Допис не видалено!',
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

    .btn {
        margin: 0 auto;
    }
    .paginator {
        width: fit-content;
        margin: 15px auto;
    }
    .VuePagination .page-link {
        width: 24px;
        height: 36px;
        border-radius: 8px;
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 19px;
        color: #505F6D;
        border: none;
        outline: none;
        padding: 0;
        margin: 0;
    }
    .VuePagination .page-item.active .page-link {
        width: 24px;
        height: 36px;
        background-color: #7649AD;
        border: none;
        border-radius: 8px;
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 19px;
        text-align: center;
        color: #FFFFFF;
        outline: none;
        padding: 0;
        margin: 0;
    }

</style>
