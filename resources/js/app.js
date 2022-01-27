require('./bootstrap');
import AddItemButton from "./components/global/AddItemButton";
import { createApp } from 'vue'
import App from "./Index";
import TitleSection from "./components/global/TitleSection";
import NavBar from "./components/global/NavBar";
import focus from "./components/directive/focus.vue"
import router from "./router";
import store from "./stores/store"
//import axios from "axios";
import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css'

window.axios = axios

const app = createApp(App)

    .component('title-section', TitleSection)
    .component('add-item-button', AddItemButton)
    .component('nav-bar', NavBar)

    .directive('focus', focus)

    .use(VueSweetalert2)
    .use(router)
    .use(store)

    .mount('#app')
