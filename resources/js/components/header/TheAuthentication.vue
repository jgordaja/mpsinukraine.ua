<template>
    <div class="header__autorization flex" :key="key">
        <template v-if="$store.state.user !== null">
            <input type="button" class="authorization__btn" :value="user.name">
            <input type="button" class="registration__btn" value="Вийти" @click="exit()">
        </template>
        <template v-else-if="$store.state.isGuest">
            <input type="button" class="authorization__btn" value="Вхід" @click="$router.push('/login')">
            <input type="button" class="registration__btn" value="Реєстрація" @click="$router.push('/register')">
        </template>
    </div>
</template>

<script>
import {mapGetters, mapMutations, mapActions} from "vuex";
export default {

    name: "TheAuthentication",

    computed: {

        isGuest() {
            if (localStorage.isGuest) {
                return  localStorage.getItem('isGuest') // this.isGuest =  false
            } else {
                return true
            }
        },

        user() {
            if (localStorage.user) {
                return  JSON.parse(localStorage.getItem("user"))
            } else {
                return null
            }
        },

        key() {
            return this.getKey
        },

        ...mapGetters(['getUser', 'getIsGuest', 'getKey'])
    },

    methods: {

        ...mapActions(['destroyToken', 'destroyUser', 'destroyIsGuest']),
        ...mapMutations(['setKey', 'setUser', 'setIsGuest']),

        exit() {
            this.destroyToken() //destroy token and user, isGuest
            this.destroyUser()
            this.destroyIsGuest()
            this.setKey(1) // изменение ключа для ре-рендеринга страницы
        },
    },

}
</script>

<style scoped>
</style>
