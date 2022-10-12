<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 pt-3">
                <h1>Registration</h1>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input
                            v-model="name"
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="name"
                            autocomplete="username"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"
                            >Email address</label
                        >
                        <input
                            v-model="email"
                            type="email"
                            class="form-control"
                            id="email"
                            placeholder="name@example.com"
                            autocomplete="useremail"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"
                            >Password</label
                        >
                        <input
                            v-model="password"
                            type="password"
                            class="form-control"
                            id="password"
                            placeholder="password"
                            autocomplete="current-password"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label"
                            >Confirm Password</label
                        >
                        <input
                            v-model="password_confirmation"
                            type="password"
                            class="form-control"
                            id="password_confirmation"
                            placeholder="confirm password"
                            autocomplete="current-password"
                        />
                    </div>
                    <button
                        @click.prevent="register"
                        type="submit"
                        class="btn btn-primary"
                    >
                        Register
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
        };
    },

    methods: {
        register() {
            axios
                .get("/sanctum/csrf-cookie")
                .then(() => {
                    axios
                        .post("/register", {
                            name: this.name,
                            email: this.email,
                            password: this.password,
                            password_confirmation: this.password_confirmation,
                        })
                        .then((response) => {
                            localStorage.setItem(
                                "x_xsrf_token",
                                response.config.headers["X-XSRF-TOKEN"]
                            );
                            this.$router.push({ name: "user.account" });
                        })
                        .catch((err) => {
                            console.log(err.response.data.message);
                        });
                })
                .catch()
                .finally();
        },
    },
};
</script>
