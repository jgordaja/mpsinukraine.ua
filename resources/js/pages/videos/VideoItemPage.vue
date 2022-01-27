<template>
    <div class="container">
        <div class="video-block">
            <iframe :src="link" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <h1>{{ title }}</h1>
        <div class="date">Дата: {{ date }}</div>
        <p class="post">{{ description }}</p>
        <a class="link-return" @click="$router.back()">Повернутися</a>
    </div>
</template>

<script>

export default {

    name: "VideoItemPage",

    props: {
        id: String,
        link: String,
        title: String,
        description: String,
        date: String
    },

}

</script>

<style scoped>

</style>
