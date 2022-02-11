<template>
    <div>
        <div class="register-box">
            <div class="register-logo">
                <router-link to="/register">REGISTRATION PAGE</router-link>
            </div>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Register a new account</p>

                    <form action="../../index.html" method="post">
                        <div class="input-group mb-3">
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                placeholder="Full name"
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
export default {};
</script>

<style lang=""></style>
