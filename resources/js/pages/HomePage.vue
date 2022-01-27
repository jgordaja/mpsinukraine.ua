<template>
    <BannerOne/>
    <PostsPreview/>
    <ArticlesPreview/>
    <DoctorsSlick/>
    <VideosPreview/>
    <PartnersBanners/>
</template>

<script>
import BannerOne from "../components/banners/BannerOne";
import DoctorsSlick from "../components/doctors/DoctorsSlick";
import PartnersBanners from "../components/partners/PartnersBanners";
import PostsPreview from "../components/posts/PostsPreview";
import ArticlesPreview from "../components/articles/ArticlesPreview";
import VideosPreview from "../components/videos/VideosPreview";

export default {

    name: "HomePage",

    components: {
        VideosPreview,
        ArticlesPreview,
        PostsPreview,
        PartnersBanners,
        DoctorsSlick,
        BannerOne
    }
}
</script>

<style scoped>

</style>
