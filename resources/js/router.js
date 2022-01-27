import { createRouter, createWebHistory } from "vue-router";
import HomePage from "./pages/HomePage";
import UsefulMaterialsPage from "./pages/UsefulMaterialsPage";
import OurKidsPage from "./pages/OurKidsPage";
import MpsPage from "./pages/mps/MpsPage";
import PostsItemPage from "./pages/posts/PostsItemPage";
import PostsCreatePage from "./pages/posts/PostsCreatePage";
import ArticleCreatePage from "./pages/articles/ArticleCreatePage";
import ArticleItemPage from "./pages/articles/ArticleItemPage";
import ArticleEditPage from "./pages/articles/ArticleEditPage";
import VideosPage from "./pages/videos/VideosPage";
import VideoItemPage from "./pages/videos/VideoItemPage";
import VideoCreatePage from "./pages/videos/VideoCreatePage";
import PostsPage from "./pages/posts/PostsPage";
import PostEditPage from "./pages/posts/PostEditPage";
import NotFound from "./pages/404";
import LoginForm from "./components/auth/LoginForm";
import RegisterForm from "./components/auth/RegisterForm";
import VideoEditPage from "./pages/videos/VideoEditPage";

export default createRouter({

    history: createWebHistory(),

    routes: [
        { path: '/', component: HomePage },
        { path: '/posts', component: PostsPage },
        { path: '/posts/post-:id', name: 'posts-item', component: PostsItemPage, props: true },
        { path: '/posts/create', component: PostsCreatePage },
        { path: '/posts/edit-:id', name: 'post-edit', component: PostEditPage, props: true },
        { path: '/mps', component: MpsPage },
        { path: '/useful-materials/articles', component: UsefulMaterialsPage },
        { path: '/useful-materials/articles/article-:id', name: 'article-item', component: ArticleItemPage, props: true },
        { path: '/useful-materials/articles/create', component: ArticleCreatePage },
        { path: '/useful-materials/articles/edit-:id', name: 'article-edit', component: ArticleEditPage, props: true },
        { path: '/useful-materials/videos', component: VideosPage },
        { path: '/useful-materials/videos/video-:id', name: 'video-item', component: VideoItemPage, props: true },
        { path: '/useful-materials/videos/create', component: VideoCreatePage },
        { path: '/useful-materials/videos/edit-:id', name: 'video-edit', component: VideoEditPage, props: true },
        { path: '/our-kids', component: OurKidsPage },
        { path: '/:notFound(.*)', component: NotFound },
        { path: '/login', component: LoginForm },
        { path: '/register', component: RegisterForm },
    ],

    linkActiveClass: 'activ',
    linkExactActiveClass: 'activ'

})
