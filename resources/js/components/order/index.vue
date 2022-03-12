<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Today Orders</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link to="/">Dashboard</router-link>
                            </li>
                            <li class="breadcrumb-item active">Today Orders</li>
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
                                <div class="card-tools">
                                    <div
                                        class="input-group input-group-sm"
                                        style="width: 150px"
                                    >
                                        <input
                                            type="text"
                                            v-model="searchTerm"
                                            name="table_search"
                                            class="form-control float-right mt-2"
                                            placeholder="Search Here"
                                            style="width: 100px"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Total</th>
                                            <th>Pay</th>
                                            <th>Due</th>
                                            <th>Payment Method</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="order in filtersearch"
                                            :key="order.id"
                                        >
                                            <td>
                                                {{ order.name }}
                                            </td>
                                            <td>
                                                {{ order.total }}
                                            </td>
                                            <td>
                                                {{ order.pay }}
                                            </td>
                                            <td>
                                                {{ order.due }}
                                            </td>
                                            <td>
                                                {{ order.payment_method }}
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <router-link
                                                        :to="{
                                                            name: 'view-order',
                                                            params: {
                                                                id: order.id,
                                                            },
                                                        }"
                                                        type="button"
                                                        class="btn btn-warning"
                                                    >
                                                        <i
                                                            class="far fa-eye"
                                                        ></i>
                                                    </router-link>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                <ul
                                    class="pagination pagination-sm m-0 float-right"
                                >
                                    <li class="page-item">
                                        <a class="page-link" href="#">«</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">»</a>
                                    </li>
                                </ul>
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
            orders: [],
            searchTerm: "",
        };
    },
    computed: {
        filtersearch() {
            return this.orders.filter((order) => {
                return order.name.match(this.searchTerm);
            });
        },
    },
    methods: {
        allOrder() {
            axios
                .get("/api/orders/")
                .then(({ data }) => (this.orders = data))
                .catch();
        },
    },
    created() {
        this.allOrder();
    },
};
</script>

<style type="text/css">
#em_photo {
    height: 50%;
    width: 50%;
}
</style>
