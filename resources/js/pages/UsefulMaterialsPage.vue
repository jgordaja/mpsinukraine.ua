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
            <ArticlesPage/>
        </div>
    </section>
</template>

<script>

import ArticlesPage from "./articles/ArticlesPage";
import VideosPage from "./videos/VideosPage";

export default {

    name: "UsefulMaterialsPage",

    components: {
        ArticlesPage
    }
}
</script>

<style>

.useful-materials .link-useful-materials {
    display: flex;
    justify-content: space-around;
}

.to-component {
    font-style: normal;
    font-weight: 600;
    font-size: 22px;
    line-height: 26px;
    text-align: center;
    color: #7649AD;
}

.to-component:hover {
    color: #222222;
}

.useful-materials {
    margin-top: 80px;
}
@media (max-width: 1730px) {
    .useful-materials {
        margin-top: 170px;
    }
}
@media (max-width: 767px) {
    .useful-materials {
        margin-top: 100px;
    }
}

</style>
