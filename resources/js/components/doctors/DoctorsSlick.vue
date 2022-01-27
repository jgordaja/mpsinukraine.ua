<template>
    <section class="doctors">

        <title-section
            title="Наші лікарі"
        >
        </title-section>

        <section class="slider container">
        <div class="slider4">
            <carousel :items-to-show="4" wrap-around="true">
                <slide v-for="doctor in doctors" :key="doctor.id">
                    <div class="slider__item">
                        <div class="avatar">
                            <img :src="getPath+doctor.img_path" :alt="doctor.img_name">
                        </div>
                        <div class="name">
                            <span>{{ doctor.lastname }}</span>
                            <div>{{ doctor.name }}</div>
                        </div>
                        <div class="description">
                            <span>{{ doctor.post }}</span>
                            <div>{{ doctor.hospital }}</div>
                        </div>
                    </div>
                </slide>
                <template #addons>
                    <navigation />
                    <pagination />
                </template>
            </carousel>
        </div>
        <div class="slider3">
            <carousel :items-to-show="3" wrap-around="true">
                <slide v-for="doctor in doctors" :key="doctor.id">
                    <div class="slider__item">
                        <div class="avatar">
                            <img :src="getPath+doctor.img_path" :alt="doctor.img_name">
                        </div>
                        <div class="name">
                            <span>{{ doctor.lastname }}</span>
                            <div>{{ doctor.name }}</div>
                        </div>
                        <div class="description">
                            <span>{{ doctor.post }}</span>
                            <div>{{ doctor.hospital }}</div>
                        </div>
                    </div>
                </slide>
                <template #addons>
                    <navigation />
                    <pagination />
                </template>
            </carousel>
        </div>
            <div class="slider2">
                <carousel :items-to-show="2" wrap-around="true" >
                    <slide v-for="doctor in doctors" :key="doctor.id">
                        <div class="slider__item">
                            <div class="avatar">
                                <img :src="getPath+doctor.img_path" :alt="doctor.img_name">
                            </div>
                            <div class="name">
                                <span>{{ doctor.lastname }}</span>
                                <div>{{ doctor.name }}</div>
                            </div>
                            <div class="description">
                                <span>{{ doctor.post }}</span>
                                <div>{{ doctor.hospital }}</div>
                            </div>
                        </div>
                    </slide>
                    <template #addons>
                        <navigation />
                        <pagination />
                    </template>
                </carousel>
            </div>
        <div class="slider1">
            <carousel :items-to-show="1" wrap-around="true" >
                <slide v-for="doctor in doctors" :key="doctor.id">
                    <div class="slider__item">
                        <div class="avatar">
                            <img :src="getPath+doctor.img_path" :alt="doctor.img_name">
                        </div>
                        <div class="name">
                            <span>{{ doctor.lastname }}</span>
                            <div>{{ doctor.name }}</div>
                        </div>
                        <div class="description">
                            <span>{{ doctor.post }}</span>
                            <div>{{ doctor.hospital }}</div>
                        </div>
                    </div>
                </slide>
                <template #addons>
                    <navigation />
                    <pagination />
                </template>
            </carousel>
        </div>
        </section>
    </section>
</template>

<script>
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
import {mapActions, mapGetters} from "vuex";

export default {

    name: "DoctorsSlick",

    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },

    computed: {

        doctors() {
            return this.allDoctors
        },

        getPath() {
            return this.getPath
        },

        ...mapGetters(['allDoctors', 'getPath'])

    },

    created() {
        this.loadDoctors()
    },

    methods: {

        ...mapActions(['loadDoctors']),

    },

}
</script>

<style>

    .slider1, .slider2, .slider3 {
        display: none;
    }
    @media(max-width: 1200px){
        .slider1, .slider2, .slider4 {
            display: none;
        }
        .slider3 {
            display: block;
        }
    }
    @media(max-width: 900px){
        .slider1, .slider3, .slider4 {
            display: none;
        }
        .slider2 {
            display: block;
        }
    }
    @media(max-width: 650px){
        .slider2, .slider3, .slider4 {
            display: none;
        }
        .slider1 {
            display: block;
        }
    }
    .carousel__slide {
        padding: 15px;
    }
    .doctors .container {
        max-width: 1140px;
    }
    .carousel {
        max-width: 1180px;
    }
    .doctors .slider .carousel .carousel__next {
        right: -15px;
        background-color: rgba(255, 255, 255, 0);
    }
    .doctors .slider .carousel .carousel__prev {
        left: -15px;
        background-color: rgba(255, 255, 255, 0);
    }
    .carousel__icon {
        width: 50px;
        height: 50px;
    }
    .navigation {
        display: flex;
    }
    .carousel__pagination-button {
        margin: 10px;
        cursor: pointer;
        width: 10px;
        height: 10px;
        border: 1px solid #FFFFFF;
        box-sizing: border-box;
        background-color: rgba(255, 255, 255, 0);
        border-radius: 50%;
    }
    .carousel__pagination-button--active {
        background-color: white;
    }
    .carousel .carousel__viewport .carousel__track{
        align-items: stretch;
    }
    .carousel .carousel__viewport .carousel__slide {
        align-items: inherit;
    }

</style>
