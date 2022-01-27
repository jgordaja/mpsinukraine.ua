<template>
    <section class="error-page">
        <div class="container">
            <img src="/assets/img/not-found.jpg">
        </div>
    </section>
</template>

<script>
export default {
name: "NotFound"
}
</script>

<style scoped>

    .error-page {
        margin-top: 80px;
    }
    @media (max-width: 1730px) {
        .error-page {
            margin-top: 170px;
        }
    }

</style>
