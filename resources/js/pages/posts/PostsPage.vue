<template>
    <section class="news-page">
        <PostsLists/>
    </section>
</template>

<script>
import PostsLists from "../../components/posts/PostsLists";

export default {

    name: "PostsPage",

    components: {
        PostsLists,
    }
}
</script>

<style>

.news-page .row {
    flex-wrap: wrap;
    justify-content: flex-start;
}

@media (max-width: 767px) {
    .news-page .row {
        display: block;
    }
}

.news-page {
    margin-top: 80px;
}
@media (max-width: 1730px) {
    .news-page {
        margin-top: 170px;
    }
}
@media (max-width: 767px) {
    .news-page {
        margin-top: 100px;
    }
}
</style>
