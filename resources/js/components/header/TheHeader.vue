<template>
    <header>
        <div class="menu-container">
            <div class="menu__wrapper flex">
                <div class="header__logo flex">
                    <div class="logo-mps">
                        <a href="/">
                            <img src="assets/img/logo/logo-mps.svg" class="visible-big-screen" alt="логотоп">
                        </a>
                        <a href="/">
                            <img src="assets/img/logo/logo-mps-footer.svg" class="visible-mobile" alt="логотоп">
                        </a>
                    </div>
                    <div class="logo-orphan">
                        <a href="https://www.facebook.com/orphandisua" target="_blank">
                            <img src="assets/img/logo/logo-orphan.svg" class="visible-big-screen" alt="логотоп">
                        </a>
                        <a href="https://www.facebook.com/orphandisua" target="_blank">
                            <img src="assets/img/logo/logo-orphan-footer.svg" class="visible-mobile" alt="логотоп">
                        </a>
                    </div>
                </div>
                <nav class="header__menu container">
                    <nav-bar></nav-bar>
                </nav>
                <TheAuthentication/>
            </div>
            <div class="menu__icon">
                <span></span>
            </div>
            <div class="menu__mobile">
                <div class="header__logo flex">
                    <div class="logo-mps">
                        <a href="/">
                            <img src="assets/img/logo/logo-mps.svg" alt="логотоп">
                        </a>
                    </div>
                    <div class="logo-orphan">
                        <a href="https://www.facebook.com/orphandisua" target="_blank">
                            <img src="assets/img/logo/logo-orphan.svg" alt="логотоп">
                        </a>
                    </div>
                </div>
                <nav class="header__menu container">
                    <ul>
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
                </nav>
                <TheAuthentication/>
            </div>
            <nav class="header__menu2">
                <nav-bar></nav-bar>
            </nav>
        </div>
    </header>
</template>

<script>
import TheAuthentication from "./TheAuthentication";
import NavBar from "../global/NavBar";

export default {

    name: "TheHeader",

    components: {
        NavBar,
        TheAuthentication
    }

}
</script>

<style scoped>

</style>
