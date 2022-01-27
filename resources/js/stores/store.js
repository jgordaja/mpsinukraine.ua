import { createStore } from "vuex";
import articles from "./articles";
import posts from "./posts.js";
import videos from "./videos.js";
import types from "./types.js";
import tops from "./tops.js";
import statuses from "./statuses.js";
import doctors from "./doctors.js";

export default createStore ({
    modules: {
        articles,
        posts,
        types,
        tops,
        statuses,
        videos,
        doctors
    },

    state() {
        return {
            path: 'http://mpsinukraine.ua/storage/',
            token: localStorage.getItem('access_token') || null,
            user: JSON.parse(localStorage.getItem("user")) || null,
            isGuest: localStorage.getItem('isGuest') || true,
            key: 1
        }
    },

    getters: {

        getPath(state) {
            return state.path
        },

        loggedIn(state) {
            return state.token !== null
        },

        getToken(state) {
            return state.token
        },

        getUser(state) {
            return state.user
        },

        getIsGuest(state) {
            return state.isGuest
        },

        getKey(state) {
            return state.key
        }

    },

    mutations: {

        retrieveToken(state, token) {
            state.token = token
        },

        destroyToken(state) {
            state.token = null
        },

        setUser(state, user) {
            state.user = user
        },

        setIsGuest(state, val) {
            state.isGuest = val
        },

        setKey(state, val) {
            state.key += val
        }

    },

    actions: {

        destroyUser(context) {
            localStorage.removeItem('user')
            context.commit('setUser', null)
        },

        destroyIsGuest(context) {
            localStorage.removeItem('isGuest')
            context.commit('setIsGuest', true)
        },

        destroyToken(context) {
            localStorage.removeItem('access_token')
            context.commit('destroyToken')
        },

    }
})
