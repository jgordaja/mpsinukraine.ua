<template>
    <ul class="flex">
        <slot></slot>
        <li>
            <router-link class-active="router-link-active" to="/">
                Головна
            </router-link>
        </li>
        <li>
            <router-link class-active="router-link-active" to="/posts">
                Новини
            </router-link>
        </li>
        <li>
            <router-link class-active="router-link-exact" to="/mps" exact>
                Типи МПС
            </router-link>
        </li>
        <li>
            <router-link class-active="router-link-exact" to="/useful-materials/articles" exact>
                Корисні матеріали
            </router-link>
        </li>
        <li>
            <router-link class-active="router-link-exact" to="/our-kids" exact>
                Наші діти
            </router-link>
        </li>
    </ul>
</template>

<script>
export default {
name: "NavBar"
}
</script>

<style scoped>

</style>
