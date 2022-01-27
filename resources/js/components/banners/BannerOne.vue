<template>
    <section class="section-banner">
        <div class="container">
            <div class="moto">Орфанних багато. Орфанні - сильні!</div>
            <div class="center">
                <h1 class="title">
                    <span>Мукополісахаридоз</span>Україна
                </h1>
                <template v-if="$store.state.user === null" :key="key">
                    <div class="registration">
                        <input type="button" class="registration__btn-center" value="Зареєструватися" @click="$router.push('/register')">
                    </div>
                </template>
                <template v-else>
                    <div class="empty-rectangle"></div>
                </template>
            </div>
        </div>
        <div class="line"></div>
        <div class="description container"><span class="ico"></span>Діагноз підтвердженно більше ніж у <span>100</span> людей</div>
    </section>
</template>

<script>
import { mapGetters, mapMutations } from "vuex";
export default {

    name: "BannerOne",

    data() {
        return {
            isGuest: true
        }
    },

    computed: {

        globalIsGuest() {
            if (localStorage.isGuest) {
                return  localStorage.getItem('isGuest') // this.isGuest =  false
            } else {
                return true
            }
        },

        key() {
            return this.getKey
        },

        ...mapGetters(['getIsGuest', 'getKey'])
    },

    updated() {

        if (localStorage.isGuest) {
            this.isGuest = localStorage.getItem('isGuest') // this.isGuest =  false
        } else {
            this.isGuest = true
        }

        this.setKey(1)
    },

    methods: {
        ...mapMutations(['setKey', 'setUser', 'setIsGuest'])
    }
}
</script>

<style scoped>

    .empty-rectangle {
        height: 82px;
    }
    /*.registration {*/
    /*    display: none;*/
    /*}*/

</style>
