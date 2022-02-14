<template>
    <div>
        <div class="register-box">
            <div class="register-logo">
                <router-link to="/register">REGISTRATION PAGE</router-link>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Register a new account</p>

                    <form class="user" @submit.prevent="signup">
                        <div class="input-group mb-3">
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                placeholder="Full name"
                                v-model="form.name"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Email"
                                name="email"
                                v-model="form.email"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input
                                type="password"
                                class="form-control"
                                placeholder="Password"
                                name="password"
                                v-model="form.password"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input
                                type="password"
                                class="form-control"
                                placeholder="Retype password"
                                name="password_confirmation"
                                v-model="form.password_confirmation"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-12">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-block"
                                >
                                    Register
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <router-link to="/">I already have a acoount</router-link>
                </div>
                <!-- /.form-box -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</template>

<script>
export default {
    created() {
        if (User.loggedIn()) {
            this.$router.push({ name: "home" });
        }
    },

    data() {
        return {
            form: {
                name: null,
                email: null,
                password: null,
                confirm_password: null,
            },
            errors: {},
        };
    },
    methods: {
        signup() {
            axios
                .post("/api/auth/signup", this.form)
                .then((res) => {
                    User.responseAfterLogin(res);

                    Toast.fire({
                        icon: "success",
                        title: "Signed in successfully",
                    });

                    this.$router.push({ name: "home" });
                })
                .catch((error) => (this.errors = error.response.data.errors));
        },
    },
};
</script>

<style lang=""></style>
