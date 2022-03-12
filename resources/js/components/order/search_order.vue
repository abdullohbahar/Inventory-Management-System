<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Search Order</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link to="/">Dashboard</router-link>
                            </li>
                            <li class="breadcrumb-item active">Search Order</li>
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
                                <router-link to="/order" class="btn btn-primary"
                                    >Today Order</router-link
                                >
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <form
                                        class="user"
                                        @submit.prevent="searchDate"
                                        enctype="multipart/form-data"
                                    >
                                        <div class="row">
                                            <div
                                                class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3"
                                            >
                                                <label for=""
                                                    >Search By Date</label
                                                >
                                                <input
                                                    type="date"
                                                    v-model="date"
                                                    id=""
                                                    class="form-control"
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
                                                    Search Order
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12 p-0">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Customer Name</th>
                                                    <th>Qty</th>
                                                    <th>Vat</th>
                                                    <th>Sub Total</th>
                                                    <th>Total</th>
                                                    <th>Due</th>
                                                    <th>Payment Method</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-for="order in orders"
                                                    :key="order.id"
                                                >
                                                    <td>
                                                        {{ order.name }}
                                                    </td>
                                                    <td>
                                                        {{ order.qty }}
                                                    </td>
                                                    <td>
                                                        {{ order.vat }}
                                                    </td>
                                                    <td>
                                                        {{ order.sub_total }}
                                                        $
                                                    </td>
                                                    <td>
                                                        {{ order.total }}
                                                        $
                                                    </td>
                                                    <td>{{ order.due }} $</td>
                                                    <td>
                                                        {{
                                                            order.payment_method
                                                        }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
            date: "",
            orders: {},
        };
    },
    methods: {
        searchDate() {
            var data = { date: this.date };
            axios
                .post("/api/search/order/", data)
                .then(({ data }) => (this.orders = data))
                .catch((error) => (this.errors = error.response.data.errors));
        },
    },
};
</script>

<style lang=""></style>
