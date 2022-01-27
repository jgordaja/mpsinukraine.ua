<template>
    <div class="container auth">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Реєстрація</div>
                    <div class="card-body">
                        <form @submit.prevent="submit">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Ім'я</label>
                                <div class="col-md-6">
                                    <input v-model="newUser.name" id="name" type="text" class="form-control" name="name" autocomplete="name" autofocus>
                                    <span v-if="errorName" class="invalid-feedback" role="alert">
                                        <strong>Поле є обов'язковим для заповнення!</strong>
                                    </span>
                                    <span v-if="errors && errors.name" class="invalid-feedback" role="alert">
                                        <strong>{{ errors.name[0] }}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Електронна адреса</label>
                                <div class="col-md-6">
                                    <input v-model="newUser.email" id="email" type="email" class="form-control" name="email" autocomplete="email">
                                    <span v-if="errorEmail" class="invalid-feedback" role="alert">
                                        <strong>Поле є обов'язковим для заповнення!</strong>
                                    </span>
                                    <span v-if="errors && errors.email" class="invalid-feedback" role="alert">
                                        <strong>{{ errors.email[0] }}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>
                                <div class="col-md-6">
                                    <input v-model="newUser.password" id="password" type="password" class="form-control" name="password" autocomplete="new-password">
                                    <span v-if="errorPassword" class="invalid-feedback" role="alert">
                                        <strong>Поле є обов'язковим для заповнення!</strong>
                                    </span>
                                    <span v-if="errors && errors.password" class="invalid-feedback" role="alert">
                                        <strong>{{ errors.password[0] }}</strong>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Підтвердьте пароль</label>
                                <div class="col-md-6">
                                    <input v-model="newUser.password_confirmation" id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                                <span v-if="errorPasswordConfirm" class="invalid-feedback" role="alert">
                                    <strong>Поле є обов'язковим для заповнення! Паролі повинні співпадати! </strong>
                                </span>
                                <span v-if="errors && errors.c_password" class="invalid-feedback" role="alert">
                                        <strong>{{ errors.c_password[0] }}</strong>
                                </span>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Реєстрація
                                    </button>
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
import {mapActions, mapGetters, mapMutations} from 'vuex'

export default {

    name: "RegisterForm",

    data() {
        return {
            newUser: {},
            errors: {},
            errorName: false,
            errorEmail: false,
            errorPassword: false,
            errorPasswordConfirm: false,
            success: false,
            isValid: false
        }
    },

    computed: {

        key() {
            return this.getKey
        },

        ...mapGetters(['getKey'])

    },

    methods: {

        ...mapActions(['register']),
        ...mapMutations(['setIsGuest', 'setUser', 'retrieveToken', 'setKey']),

        validation() {

            if (! this.newUser.name) {
                this.errorName = true
            }
            if (! this.newUser.email) {
                this.errorEmail = true
            }
            if (! this.newUser.password) {
                this.errorPassword = true
            }
            if (! this.newUser.password_confirmation || this.newUser.password_confirmation!==this.newUser.password) {
                this.errorPasswordConfirm = true
            }

            if (this.errorName || this.errorEmail || this.errorPassword || this.errorPasswordConfirm) {
                this.$swal.fire({
                    title: 'Помилка!',
                    text: 'Треба заповнити всі поля!',
                    icon: 'error',
                    confirmButtonText: 'ОК'
                })
                this.isValid = false

            } else  {
                this.isValid = true
            }

        },

        submit() {

            this.validation()

            if (this.isValid) {

                axios.post('/api/register', this.newUser)
                    .then(response => {

                        if (response.data.message === undefined) {

                            const token = response.data.access_token //взять из ответа из контроллера токен
                            localStorage.setItem('access_token', token) // положить его в localStorage
                            this.setUser(response.data.user)
                            localStorage.setItem('user', JSON.stringify(response.data.user))
                            this.setIsGuest(false)
                            localStorage.setItem('isGuest', false)
                            this.setKey(1) // for the re-render TheAuthentication and BannerOne
                            this.$swal.fire({title: 'Користувача успішно додано!', icon: 'success'})
                            this.newUser = {}
                            this.success = true
                            this.errors = {}
                            this.$router.push('/')

                        } else {
                            this.$swal.fire({
                                title: 'Помилка реєстрації!',
                                text: response.data.message,
                                icon: 'error',
                                confirmButtonText: 'ОК'
                            })
                        }
                    })
                    .catch(error => {
                        this.$swal.fire({
                            title: 'Помилка підключення до БД!',
                            text: error,
                            icon: 'error',
                            confirmButtonText: 'ОК'
                        })
                    })
            }

        }
    }
}
</script>

<style scoped>

</style>
