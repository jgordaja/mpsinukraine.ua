<template>
    <section class="partners">
        <section class="title container">
            <div class="title-section">Наші партнери</div>
            <div class="rectangle"></div>
        </section>
        <section class="title mobile container flex">
            <div class="rectangle"></div>
            <div class="title-section">Наші партнери</div>
        </section>
        <section class="banners container">
            <div class="wrap_banners flex">
                <div class="img-partners">
                    <a href="https://www.sanofi.com/" target="_blank">
                        <img src="assets/img/partners/sanofi_logo.png" alt="логотип партнера">
                    </a>
                </div>
                <div class="img-partners">
                    <a href="https://supportrare.com/" target="_blank">
                        <img src="assets/img/partners/logo-CA.png" alt="логотип партнера">
                    </a>
                </div>
                <div class="img-partners">
                    <a href="https://dobro.ua/" target="_blank">
                        <img src="assets/img/partners/dobro-ua-logo.png" alt="логотип партнера">
                    </a>
                </div>
                <div class="img-partners">
                    <a href="https://www.takeda.com/" target="_blank">
                        <img src="assets/img/partners/takeda_logo.png" alt="логотип партнера">
                    </a>
                </div>
                <div class="img-partners">
                    <a href="https://www.biomarin.com/" target="_blank">
                        <img src="assets/img/partners/biomarin-logo.png" alt="логотип партнера">
                    </a>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
export default {
    name: "PartnersBanners"
}
</script>

<style scoped>
    .partners {
        padding: 80px 15px;
    }
    @media (max-width: 767px) {
        .partners {
            padding: 30px 15px;
        }
    }
</style>
