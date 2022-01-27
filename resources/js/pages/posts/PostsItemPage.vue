<template>
    <div class="container">
        <p><img :src="getPath+img_path" :alt="img_name"></p>
        <h1>{{ title }}</h1>
        <div class="date">Дата: {{ date }}</div>
        <p class="post">{{ content }}</p>
        <a class="link-return" @click="$router.back()">Повернутися</a>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {

    name: "PostItemPage",

    props: {
        id: String,
        date: String,
        title: String,
        content: String,
        img_name: String,
        img_path: String
    },

    computed: {

        getPath() {
            return this.getPath
        },

        ...mapGetters(['getPath'])

    },

}
</script>

<style>
    .link-return {
        padding: 35px;
        font-style: normal;
        font-weight: 600;
        font-size: 20px;
        line-height: 26px;
        text-align: center;
        color: #7649AD;
        cursor: pointer;
        display: block;
    }
    h1 {
        padding: 15px;
        font-style: normal;
        font-weight: bold;
        font-size: 36px;
        line-height: 44px;
        color: #222222;
        text-align: center;
    }
    div .date{
        padding: 15px;
        font-style: normal;
        font-weight: bold;
        font-size: 16px;
        line-height: 20px;
        color: #505F6D;
        text-align: left;
    }
    p.post {
        padding-bottom: 15px;
        font-style: normal;
        font-weight: 600;
        font-size: 20px;
        line-height: 24px;
        color: #222222;
    }

</style>
