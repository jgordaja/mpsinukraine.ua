<template>
    <TheHeader/>
    <main>
        <router-view></router-view>
    </main>
    <TheFooter/>
</template>

<script>
import TheHeader from "./components/header/TheHeader";
import TheFooter from "./components/footer/TheFooter";
import {mapGetters, mapMutations} from "vuex";

export default {

    name: "Index",

    components: {
        TheHeader,
        TheFooter,
    },

    computed: {

        isGuest() {
            return this.getIsGuest
        },

        user() {
            return this.getUser
        },

        key() {
            return this.getKey
        },

        token() {
            return this.getToken
        },

        ...mapGetters(['getUser', 'getIsGuest', 'getKey', 'getToken'])
    },

    methods: {

        ...mapMutations(['setKey', 'setUser', 'setIsGuest', 'retrieveToken']),

    },

    mounted() {
        this.setIsGuest(localStorage.getItem('isGuest') || true)
        this.setUser(JSON.parse(localStorage.getItem("user")) || null)
        this.retrieveToken(localStorage.getItem('access_token') || null)
    },

}
</script>

<style scoped>

</style>
