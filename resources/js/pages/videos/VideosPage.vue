<template>
    <section class="useful-materials">
        <title-section
            title="Корисні матеріали"
        >
        </title-section>
        <div class="container">
            <div class="link-useful-materials">
                <router-link to="/useful-materials/articles" class="to-component">Статті про нас</router-link>
                <router-link to="/useful-materials/videos" class="to-component">Відеотека</router-link>
            </div>
            <VideosLists/>
        </div>
    </section>
</template>

<script>
import VideosLists from "../../components/videos/VideosLists";

export default {
    name: "VideosPage",

    components: {
        VideosLists
    }
}
</script>

<style>

.link-useful-materials {
    padding-bottom: 30px;
    padding-top: 30px;
}

</style>
