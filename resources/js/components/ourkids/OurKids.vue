<template>
    <div class="ourkids">
        <div class="container">
            <p>Наші діти. Відео зроблено до дня орфанних захворювань в 2021 році</p>
            <div class="video-block">
                <iframe :src="linkVideo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <p>В Україні на сьогоднішній день налічується близько 100 діагностованих пацієнтів. Насправді їх значно більше. На карті відзначено близько 60-ти сімей, в яких є члени родини з мукополісахаридозом</p>
        </div>
        <div class="map-block">
            <iframe :src="linkMap"></iframe>
        </div>
    </div>
</template>

<script>
export default {

    name: "OurKids",

    data() {
        return {
            linkVideo: 'https://www.youtube.com/embed/AJv1eYu__RM',
            linkMap: 'https://www.google.com/maps/d/u/0/embed?mid=1dVX_MxhLcgvcRdJ5jgrwI2iHTZDU0z2v'
        }
    },
}
</script>

<style scoped>

</style>
