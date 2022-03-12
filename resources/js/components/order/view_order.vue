<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Order Details</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link to="/">Dashboard</router-link>
                            </li>
                            <li class="breadcrumb-item active">
                                Order Details
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
                                <router-link to="/order" class="btn btn-primary"
                                    >Go Back</router-link
                                >
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header">
                                                Order Details
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <b>Name :</b>
                                                        {{ orders.name }}
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Phone :</b>
                                                        {{ orders.phone }}
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Address :</b>
                                                        {{ orders.address }}
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Date :</b>
                                                        {{ orders.order_date }}
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Payment Method :</b>
                                                        {{
                                                            orders.payment_method
                                                        }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header">
                                                Order Details
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <b>Sub Total :</b>
                                                        {{ orders.sub_total }} $
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Vat :</b>
                                                        {{ orders.vat }} $
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Total Amount :</b>
                                                        {{ orders.total }} $
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Pay Amount :</b>
                                                        {{ orders.pay }} $
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Due Amount :</b>
                                                        {{ orders.due }} $
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Product Code</th>
                                            <th>Image</th>
                                            <th>Qty</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="detail in details"
                                            :key="detail.id"
                                        >
                                            <td>
                                                {{ detail.product_name }}
                                            </td>
                                            <td>
                                                {{ detail.product_code }}
                                            </td>
                                            <td>
                                                <img
                                                    :src="'/' + detail.image"
                                                    alt=""
                                                    srcset=""
                                                    id="em_photo"
                                                />
                                            </td>
                                            <td>
                                                {{ detail.pro_quantity }}
                                            </td>
                                            <td>
                                                {{ detail.product_price }} $
                                            </td>
                                            <td>
                                                {{ detail.sub_total }} $
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
            orders: {},
            details: {},
        };
    },
    created() {
        let id = this.$route.params.id;
        axios
            .get("/api/order/details/" + id)
            .then(({ data }) => (this.orders = data))
            .catch(console.log("Error"));

        axios
            .get("/api/order/orderDetails/" + id)
            .then(({ data }) => (this.details = data))
            .catch(console.log("Error"));
    },
    methods: {},
};
</script>

<style lang=""></style>
