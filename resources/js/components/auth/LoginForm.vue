<template>
    <div class="container auth">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Вхід</div>
                    <div class="card-body">
                        <form @submit.prevent="submit">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Електронна адреса</label>
                                <div class="col-md-6">
                                    <input v-model="user.email" id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus>
                                    <span v-if="errors && errors.email" class="invalid-feedback" role="alert">
                                        <strong>{{ errors.email[0] }}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>
                                <div class="col-md-6">
                                    <input v-model="user.password" id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                                    <span v-if="errors && errors.password" class="invalid-feedback" role="alert">
                                        <strong>{{ errors.password[0] }}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Ввійти</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters, mapMutations} from 'vuex'

export default {

    name: "LoginForm",

    data() {
        return {
            user: {},
            errors: {},
        }
    },

    computed: {

        key() {
            return this.getKey
        },

        ...mapGetters(['getKey'])

    },

    methods: {

        ...mapMutations(['retrieveToken', 'setUser', 'setIsGuest', 'setKey']),

        submit() {

            axios.post('/api/login', this.user)
                .then ( response => {

                    if (response.data.message === undefined) {

                        const token = response.data.access_token //взять из ответа из контроллера токен
                        this.retrieveToken(response.data.access_token) // положить в store.js
                        localStorage.setItem('access_token', token) // положить его в localStorage
                        this.setUser(response.data.user)
                        localStorage.setItem('user', JSON.stringify(response.data.user))
                        this.setIsGuest(false)
                        localStorage.setItem('isGuest', false)

                        this.$swal.fire({title: 'Ви успішно увійшли! Вітаємо на нашому сайті.', icon: 'success'})
                        this.newUser = {}
                        this.success = true
                        this.errors = {}

                        this.setKey(1) // for the re-render TheAuthentication and BannerOne
                        this.$router.push('/')

                    } else {

                        this.$swal.fire({
                            title: 'Помилка авторизації!',
                            text: response.data.message,
                            icon: 'error',
                            confirmButtonText: 'ОК'
                        })

                    }

                })
                .catch( error => {
                    this.$swal.fire({
                        title: 'Помилка підключення до БД!',
                        text: error,
                        icon: 'error',
                        confirmButtonText: 'ОК'
                    })
                    console.log(error)
                })

        }
    }
}
</script>

<style>

    .auth {
        margin-top: 80px;
        margin-bottom: 80px;
    }
    @media (max-width: 1730px) {
        .auth {
            margin-top: 170px;
            margin-bottom: 30px;
        }
    }

</style>
