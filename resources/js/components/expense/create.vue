<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Expense</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link to="/">Dashboard</router-link>
                            </li>
                            <li class="breadcrumb-item active">Add Expense</li>
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
                                    to="/supplier"
                                    class="btn btn-primary"
                                    >All Expense</router-link
                                >
                            </div>
                            <div class="card-body">
                                <form
                                    class="user"
                                    @submit.prevent="expenseUpdate"
                                    enctype="multipart/form-data"
                                >
                                    <div class="row">
                                        <div
                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3"
                                        >
                                            <label for="">Details</label>
                                            <textarea
                                                v-model="form.details"
                                                class="form-control"
                                                id=""
                                            ></textarea>
                                            <small
                                                class="text-danger"
                                                v-if="errors.details"
                                            >
                                                {{ errors.details[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Amount</label>
                                            <input
                                                type="text"
                                                v-model="form.amount"
                                                id=""
                                                class="form-control"
                                                placeholder="Amount"
                                                required
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.amount"
                                            >
                                                {{ errors.amount[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Expense Date</label>
                                            <input
                                                type="date"
                                                v-model="form.expense_date"
                                                id=""
                                                class="form-control"
                                                required
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.expense_date"
                                            >
                                                {{ errors.expense_date[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3"
                                        >
                                            <button
                                                type="submit"
                                                class="btn btn-success btn-block"
                                            >
                                                Add Expense
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
                details: null,
                amount: null,
                expense_date: null,
            },
            errors: {},
        };
    },
    methods: {
        expenseInsert() {
            axios
                .post("/api/expense", this.form)
                .then(() => {
                    this.$router.push({ name: "expense" });
                    Notification.success();
                })
                .catch((error) => (this.errors = error.response.data.errors));
        },
    },
};
</script>

<style lang=""></style>
