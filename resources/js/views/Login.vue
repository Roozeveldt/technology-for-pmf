<template>
    <form>
        <h1 class="h3 mb-3 fw-normal">Вход в систему</h1>

        <div v-if="hasErrors" class="alert alert-danger">
            <ul class="list-unstyled mb-0 text-start">
                <li v-for="error in errors" :key="error">
                    {{ error[0] }}
                </li>
            </ul>
        </div>

        <div class="form-floating">
            <input
                v-model="email"
                type="email"
                class="form-control"
                id="email"
                placeholder="name@example.com"
                autocomplete="email"
            >
            <label for="email">Email</label>
        </div>
        <div class="form-floating">
            <input
                v-model="password"
                type="password"
                class="form-control"
                id="password"
                placeholder="Пароль"
                autocomplete="password"
            >
            <label for="password">Пароль</label>
        </div>

        <button @click.prevent="login" class="mt-2 w-100 btn btn-lg btn-primary" type="submit">Войти</button>
        <p class="mt-5 mb-3 text-muted">&copy; 1997–2023</p>
    </form>
</template>

<script>
export default {

    data() {
        return {
            email: null,
            password: null,
            hasErrors: false,
            errors: {},
        };
    },

    methods: {
        login() {
            axios
                .get('/sanctum/csrf-cookie')
                .then(() => {
                    axios
                        .post('/login', {
                            email: this.email,
                            password: this.password,
                        })
                        .then((response) => {
                            localStorage.setItem(
                                'x_xsrf_token',
                                response.config.headers['X-XSRF-TOKEN'],
                            );
                            this.$router.push({ name: 'dashboard' });
                        })
                        .catch((err) => {
                            this.hasErrors = !!err.response.data.errors;
                            this.errors = err.response.data.errors;
                        });
                })
                .catch()
                .finally();
        },
    },
};
</script>

<style scoped>
.form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
</style>
