<template>
    <section class="faq">
        <div class="container">
            <template v-if="!types.length">
                <h1 class="description">Тут поки що немає опису типів мукополісахаридозу!</h1>
            </template>
            <template v-else>
                <div class="collapsible" v-for="(type, index) in types" :key="type.id">
                    <div @click="changeClass(index)" :class="updateClass[index]" >{{ type.title }}</div>
                    <transition name="typeList">
                        <template v-if="show[index]">
                            <div class="content">
                                {{ type.content }}
                                <p v-show="type.link_booklet" class="link-booklet"><a :href="type.link_booklet" target="_blank">Посилання на Посібник із розуміння даного типу</a></p>
                                <p v-show="type.link_protocol" class="link-booklet"><a :href="type.link_protocol" target="_blank">Посилання на УНІФІКОВАНИЙ КЛІНІЧНИЙ ПРОТОКОЛ для даного типу</a></p>
                            </div>
                        </template>
                    </transition>
                </div>
            </template>
            <template v-if="anesthesiaBooklet">
                <div class="description">
                    <p>Вашій дитині робитимуть анестезію? Цей буклет надає загальне уявлення про те, що таке
                        анестезія та які потенційні проблеми вона несе для людей з МПС.</p>
                    <p class="link-booklet"><a :href="anesthesiaBooklet" target="_blank">Посилання на Посібник "МПС - Анестезія"</a></p>
                </div>
            </template>
        </div>
    </section>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {

    name: "TypesLists",

    data() {
        return {
            show: [],
            updateClass: []
        }
    },

    computed: {

        anesthesiaBooklet() {
            return this.bookletAnesthesia
        },

        types() {
            return this.allTypes
        },

        ...mapGetters(['bookletAnesthesia', 'allTypes'])

    },

    created() {
        this.loadTypes()
    },

    mounted() {
        for (let i = 0; i < this.types.length; i++) {
            this.show.push(false)
            this.updateClass.push('arrow arrow-no-activ')
        }
    },

    methods: {

        ...mapActions(['loadTypes']),

        changeClass(i) {
            this.show[i] = !this.show[i]
            if (this.show[i]) {
                this.updateClass[i] = 'arrow arrow-activ'
            } else {
                this.updateClass[i] = 'arrow arrow-no-activ'
            }
        }
    }

}
</script>

<style scoped>

    .content, p.link-booklet {
        font-size: 16px;
    }

</style>

