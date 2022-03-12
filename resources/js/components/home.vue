<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard v3</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard v3</li>
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
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>
                                    {{ todaysell }}
                                    <sup style="font-size: 20px">$</sup>
                                </h3>

                                <p>Today Sell</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <router-link to="/order" class="small-box-footer"
                                >More info
                                <i class="fas fa-arrow-circle-right"></i
                            ></router-link>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>
                                    {{ income
                                    }}<sup style="font-size: 20px">$</sup>
                                </h3>

                                <p>Today Income</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer"
                                >More info
                                <i class="fas fa-arrow-circle-right"></i
                            ></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>
                                    {{ due }}
                                    <sup style="font-size: 20px">$</sup>
                                </h3>

                                <p>Today Due</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer"
                                >More info
                                <i class="fas fa-arrow-circle-right"></i
                            ></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>
                                    {{ expense }}
                                    <sup style="font-size: 20px">$</sup>
                                </h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer"
                                >More info
                                <i class="fas fa-arrow-circle-right"></i
                            ></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">Out Of Stock Products</div>
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="product in products"
                                            :key="product.id"
                                        >
                                            <td>
                                                {{ product.product_name }}
                                            </td>
                                            <td
                                                v-if="
                                                    product.product_quantity >=
                                                    1
                                                "
                                            >
                                                <span
                                                    class="badge badge-success"
                                                    >Available</span
                                                >
                                            </td>
                                            <td v-else>
                                                <span class="badge badge-danger"
                                                    >Out Of Stock</span
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
</template>

<script>
export default {
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "/" });
        }
    },

    data() {
        return {
            todaysell: "",
            income: "",
            due: "",
            expense: "",
            products: "",
        };
    },
    mounted() {
        this.todaySell();
        this.todayIncome();
        this.todayDue();
        this.todayExpense();
        this.outOfStock();
    },
    methods: {
        todaySell() {
            axios
                .get("/api/today/sell")
                .then(({ data }) => (this.todaysell = data))
                .catch();
        },
        todayIncome() {
            axios
                .get("/api/today/income")
                .then(({ data }) => (this.income = data))
                .catch();
        },
        todayDue() {
            axios
                .get("/api/today/due")
                .then(({ data }) => (this.due = data))
                .catch();
        },
        todayExpense() {
            axios
                .get("/api/today/expense")
                .then(({ data }) => (this.expense = data))
                .catch();
        },
        outOfStock() {
            axios
                .get("/api/today/stockOut")
                .then(({ data }) => (this.products = data))
                .catch();
        },
    },
};
</script>

<style></style>
