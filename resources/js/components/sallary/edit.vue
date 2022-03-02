<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Sallary</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link to="/">Dashboard</router-link>
                            </li>
                            <li class="breadcrumb-item active">
                                Update Sallary
                            </li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <router-link
                                    to="/sallary"
                                    class="btn btn-primary"
                                    >Go Back</router-link
                                >
                            </div>
                            <div class="card-body">
                                <form
                                    class="user"
                                    @submit.prevent="sallaryUpdate"
                                >
                                    <input
                                        type="hidden"
                                        v-model="form.employee_id"
                                    />
                                    <div class="row">
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Fullname</label>
                                            <input
                                                type="text"
                                                v-model="form.name"
                                                id=""
                                                class="form-control"
                                                placeholder="Fullname"
                                                required
                                            />
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Email</label>
                                            <input
                                                type="email"
                                                v-model="form.email"
                                                id=""
                                                class="form-control"
                                                placeholder="Email"
                                                required
                                            />
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <div class="form-group">
                                                <label>Months</label>
                                                <select
                                                    v-model="form.sallary_month"
                                                    class="form-control"
                                                >
                                                    <option value="January">
                                                        January
                                                    </option>
                                                    <option value="February">
                                                        February
                                                    </option>
                                                    <option value="March">
                                                        March
                                                    </option>
                                                    <option value="April">
                                                        April
                                                    </option>
                                                    <option value="May">
                                                        May
                                                    </option>
                                                    <option value="June">
                                                        June
                                                    </option>
                                                    <option value="July">
                                                        July
                                                    </option>
                                                    <option value="August">
                                                        August
                                                    </option>
                                                    <option value="September">
                                                        September
                                                    </option>
                                                    <option value="October">
                                                        October
                                                    </option>
                                                    <option value="November">
                                                        November
                                                    </option>
                                                    <option value="December">
                                                        December
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Sallary Amount</label>
                                            <input
                                                type="text"
                                                v-model="form.amount"
                                                id=""
                                                class="form-control"
                                                placeholder="Sallary"
                                                required
                                            />
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3"
                                        >
                                            <button
                                                type="submit"
                                                class="btn btn-success btn-block"
                                            >
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
</template>

<script type="text/javascript">
export default {
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "/" });
        }
    },

    data() {
        return {
            form: {
                name: "",
                email: "",
                sallary_month: "",
                amount: "",
                employee_id: "",
            },
            errors: {},
        };
    },
    created() {
        let id = this.$route.params.id;
        axios
            .get("/api/edit/sallary/" + id)
            .then(({ data }) => (this.form = data))
            .catch(console.log("Error"));
    },
    methods: {
        sallaryUpdate() {
            let id = this.$route.params.id;
            axios
                .post("/api/sallary/update/" + id, this.form)
                .then(() => {
                    this.$router.push({ name: "sallary" });
                    Notification.success();
                })
                .catch((error) => (this.errors = error.response.data.errors));
        },
    },
};
</script>

<style lang=""></style>
