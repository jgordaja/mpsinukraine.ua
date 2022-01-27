<template>
    <section class="title flex container">
        <h2 class="flex">
            <div class="rectangle"></div>
            <div class="title-section">{{ title }}</div>
        </h2>
        <slot></slot>
    </section>
</template>

<script>
export default {

    name: "TitleSection",

    props: {
        title: {
            type: String,
            required: true
        },

    },

}
</script>

<style scoped>

</style>
