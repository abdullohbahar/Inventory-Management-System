<template>
    <div>
        <div class="login-box">
            <div class="login-logo">
                <router-link to="/"><b>LOGIN PAGE</b></router-link>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form @submit.prevent="login">
                        <div class="input-group mb-3">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Email"
                                name="email"
                                v-model="form.email"
                                required
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <small class="text-danger" v-if="errors.email">
                            {{ errors.email[0] }}
                        </small>
                        <div class="input-group mb-3">
                            <input
                                type="password"
                                class="form-control"
                                placeholder="Password"
                                name="password"
                                v-model="form.password"
                                required
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <small class="text-danger" v-if="errors.password">
                            {{ errors.password[0] }}
                        </small>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember" />
                                    <label for="remember"> Remember Me </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-block"
                                >
                                    Sign In
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <p class="mb-1">
                        <router-link to="/forgot-password"
                            >I forgot my password</router-link
                        >
                    </p>
                    <p class="mb-0">
                        <router-link to="/register" class="text-center"
                            >Register New Account</router-link
                        >
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
export default {
    created() {
        if (User.loggedIn()) {
            this.$router.push({ name: "home" });
        }
    },

    data() {
        return {
            form: {
                email: null,
                password: null,
            },
            errors: {},
        };
    },
    methods: {
        login() {
            axios
                .post("/api/auth/login", this.form)
                .then((res) => {
                    User.responseAfterLogin(res);

                    Toast.fire({
                        icon: "success",
                        title: "Signed in successfully",
                    });

                    this.$router.push({ name: "home" });
                })
                .catch((error) => (this.errors = error.response.data.errors))
                .catch(
                    Toast.fire({
                        icon: "warning",
                        title: "Email Or Password Is Invalid",
                    })
                );
        },
    },
};
</script>

<style lang=""></style>
