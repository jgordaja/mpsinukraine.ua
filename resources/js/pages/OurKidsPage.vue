<template>
    <section class="our-kids-page">
        <title-section
            title="Інформація про пацієнтів"
        >
        </title-section>
        <OurKids/>
    </section>
</template>

<script>
import OurKids from "../components/ourkids/OurKids";

export default {

    name: "OurKidsPage",

    components: {
        OurKids
    }
}
</script>

<style>

.our-kids-page {
    margin-top: 80px;
}
@media (max-width: 1730px) {
    .our-kids-page {
        margin-top: 170px;
    }
}
@media (max-width: 767px) {
    .our-kids-page {
        margin-top: 100px;
    }
}

</style>
