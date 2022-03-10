<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">POS</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link to="/">Dashboard</router-link>
                            </li>
                            <li class="breadcrumb-item active">POS</li>
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
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                Expense Insert
                                <div class="card-tools">
                                    <router-link
                                        to=""
                                        class="btn btn-sm btn-primary"
                                        >Add Customer</router-link
                                    >
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Unit</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="cart in carts"
                                            :key="cart.id"
                                        >
                                            <td>{{ cart.pro_name }}</td>
                                            <td>
                                                <input
                                                    type="text"
                                                    :value="cart.pro_quantity"
                                                    readonly
                                                    style="
                                                        width: 30px !important;
                                                    "
                                                />
                                                <div class="btn-group-vertical">
                                                    <button
                                                        class="btn btn-info btn-sm"
                                                        @click.prevent="
                                                            increment(cart.id)
                                                        "
                                                    >
                                                        <i
                                                            class="fas fa-angle-up"
                                                        ></i></button
                                                    ><button
                                                        class="btn btn-warning btn-sm"
                                                        @click.prevent="
                                                            decrement(cart.id)
                                                        "
                                                        v-if="
                                                            cart.pro_quantity >=
                                                            2
                                                        "
                                                    >
                                                        <i
                                                            class="fas fa-angle-down"
                                                        ></i>
                                                    </button>
                                                    <button
                                                        class="btn btn-warning btn-sm"
                                                        @click.prevent="
                                                            decrement(cart.id)
                                                        "
                                                        v-else
                                                        disabled
                                                    >
                                                        <i
                                                            class="fas fa-angle-down"
                                                        ></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>{{ cart.product_price }}</td>
                                            <td>{{ cart.sub_total }}</td>
                                            <td>
                                                <a
                                                    @click="removeItem(cart.id)"
                                                    class="btn btn-danger btn-sm"
                                                    >X</a
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <ul class="list-group">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center"
                                    >
                                        Total Quantity:
                                        <strong>{{ qty }}</strong>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center"
                                    >
                                        Sub Total: <strong>{{ subtotal }} $</strong>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center"
                                    >
                                        Vat: <strong>{{ vats.vat }} %</strong>
                                    </li>
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center"
                                    >
                                        Total Amount: <strong>{{ subtotal * vats.vat/100 + subtotal }}$</strong>
                                    </li>
                                </ul>
                                <br />
                                <br />
                                <form action="">
                                    <label for="">Customer Name</label>
                                    <select
                                        v-model="customer_id"
                                        class="form-control"
                                        id=""
                                    >
                                        <option
                                            v-for="customer in customers"
                                            :key="customer.id"
                                            value=""
                                        >
                                            {{ customer.name }}
                                        </option>
                                    </select>
                                    <label for="">Pay</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        required
                                        v-model="pay"
                                    />
                                    <label for="">Due</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        required
                                        v-model="due"
                                    />
                                    <label for="">Payment Method</label>
                                    <select
                                        v-model="payment_method"
                                        class="form-control"
                                        id=""
                                    >
                                        <option value="cash">Cash</option>
                                        <option value="check">Check</option>
                                        <option value="gift card">
                                            Gift Card
                                        </option>
                                    </select>
                                    <br />
                                    <button
                                        type="submit"
                                        class="btn btn-success"
                                    >
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header mb-2">Products Sold</div>
                            <!-- Tab Category -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a
                                        class="nav-link active"
                                        id="home-tab"
                                        data-toggle="tab"
                                        href="#home"
                                        role="tab"
                                        aria-controls="home"
                                        aria-selected="true"
                                        >All Product</a
                                    >
                                </li>
                                <li
                                    class="nav-item"
                                    v-for="category in categories"
                                    :key="category.id"
                                >
                                    <a
                                        class="nav-link"
                                        id="profile-tab"
                                        data-toggle="tab"
                                        href="#profile"
                                        role="tab"
                                        aria-controls="profile"
                                        aria-selected="false"
                                        @click="subProduct(category.id)"
                                        >{{ category.category_name }}</a
                                    >
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div
                                    class="tab-pane fade show active"
                                    id="home"
                                    role="tabpanel"
                                    aria-labelledby="home-tab"
                                >
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <input
                                                type="text"
                                                v-model="searchTerm"
                                                name="table_search"
                                                class="form-control float-right mt-2 mb-3"
                                                placeholder="Search Here"
                                            />
                                        </div>
                                    </div>
                                    <div class="row mt-2 ml-1">
                                        <div
                                            class="col-lg-3 col-sm-6 col-md-3 col-xl-3"
                                            v-for="product in filtersearch"
                                            :key="product.id"
                                        >
                                            <button
                                                class="btn btn-sm"
                                                @click.prevent="
                                                    AddToCart(product.id)
                                                "
                                            >
                                                <div
                                                    class="card"
                                                    style="width: 7rem"
                                                >
                                                    <img
                                                        class="card-img-top"
                                                        :src="product.image"
                                                        alt="Card image cap"
                                                    />
                                                    <div class="card-body">
                                                        <h5 class="card-title">
                                                            {{ product.name }}
                                                        </h5>
                                                        <p
                                                            v-if="
                                                                product.product_quantity >=
                                                                1
                                                            "
                                                        >
                                                            <span
                                                                class="badge badge-success"
                                                                >Available
                                                                {{
                                                                    product.product_quantity
                                                                }}</span
                                                            >
                                                        </p>
                                                        <p v-else>
                                                            <span
                                                                class="badge badge-danger"
                                                                >Out Of
                                                                Stock</span
                                                            >
                                                        </p>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="tab-pane fade"
                                    id="profile"
                                    role="tabpanel"
                                    aria-labelledby="profile-tab"
                                >
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <input
                                                type="text"
                                                v-model="searchTerm1"
                                                name="table_search"
                                                class="form-control float-right mt-2 mb-3"
                                                placeholder="Search Here"
                                            />
                                        </div>
                                    </div>
                                    <div class="row mt-2 ml-1">
                                        <div
                                            class="col-lg-3 col-sm-6 col-md-3 col-xl-3"
                                            v-for="getproduct in getFilterSearch"
                                            :key="getproduct.id"
                                        >
                                            <button
                                                class="btn btn-sm"
                                                @click.prevent="
                                                    AddToCart(getproduct.id)
                                                "
                                            >
                                                <div
                                                    class="card"
                                                    style="width: 7rem"
                                                >
                                                    <img
                                                        class="card-img-top"
                                                        :src="getproduct.image"
                                                        alt="Card image cap"
                                                    />
                                                    <div class="card-body">
                                                        <h5 class="card-title">
                                                            {{
                                                                getproduct.product_name
                                                            }}
                                                        </h5>
                                                        <p
                                                            v-if="
                                                                getproduct.product_quantity >=
                                                                1
                                                            "
                                                        >
                                                            <span
                                                                class="badge badge-success"
                                                                >Available
                                                                {{
                                                                    getproduct.product_quantity
                                                                }}</span
                                                            >
                                                        </p>
                                                        <p v-else>
                                                            <span
                                                                class="badge badge-danger"
                                                                >Out Of
                                                                Stock</span
                                                            >
                                                        </p>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
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
    created() {
        this.allProduct();
        this.allCategory();
        this.allCustomer();
        this.cartProduct();
        this.vat();
        Reload.$on("afterAdd", () => {
            this.cartProduct();
        });
    },

    data() {
        return {
            products: [],
            categories: "",
            getproducts: [],
            searchTerm: "",
            searchTerm1: "",
            customers: "",
            errors: "",
            carts: [],
            vats: "",
        };
    },
    computed: {
        filtersearch() {
            return this.products.filter((product) => {
                return product.name.match(this.searchTerm);
            });
        },
        getFilterSearch() {
            return this.getproducts.filter((getproduct) => {
                return getproduct.product_name.match(this.searchTerm1);
            });
        },
        qty() {
            let sum = 0;
            for (let i = 0; i < this.carts.length; i++) {
                sum += parseFloat(this.carts[i].pro_quantity);
            }
            return sum;
        },
        subtotal() {
            let sum = 0;
            for (let i = 0; i < this.carts.length; i++) {
                sum +=
                    parseFloat(this.carts[i].pro_quantity) *
                    parseFloat(this.carts[i].product_price);
            }

            return sum;
        },
    },
    methods: {
        allProduct() {
            axios
                .get("/api/product")
                .then(({ data }) => (this.products = data))
                .catch();
        },
        allCategory() {
            axios
                .get("/api/category")
                .then(({ data }) => (this.categories = data))
                .catch();
        },
        subProduct(id) {
            axios
                .get("/api/get/product/" + id)
                .then(({ data }) => (this.getproducts = data))
                .catch();
        },
        allCustomer() {
            axios
                .get("/api/customer")
                .then(({ data }) => (this.customers = data))
                .catch();
        },
        // Cart Methods
        AddToCart(id) {
            axios
                .get("/api/addToCart/" + id)
                .then(() => {
                    Reload.$emit("afterAdd");
                    Notification.cart_success();
                })
                .catch();
        },
        cartProduct() {
            axios
                .get("/api/cart/product")
                .then(({ data }) => (this.carts = data))
                .catch();
        },

        removeItem(id) {
            axios
                .get("/api/remove/cart/" + id)
                .then(() => {
                    Reload.$emit("afterAdd");
                    Notification.cart_delete();
                })
                .catch();
        },
        increment(id) {
            axios
                .get("/api/increment/" + id)
                .then(() => {
                    Reload.$emit("afterAdd");
                    Notification.success();
                })
                .catch();
        },
        decrement(id) {
            axios
                .get("/api/decrement/" + id)
                .then(() => {
                    Reload.$emit("afterAdd");
                    Notification.success();
                })
                .catch();
        },
        vat() {
            axios
                .get("/api/vats")
                .then(({ data }) => (this.vats = data))
                .catch();
        },
    },
};
</script>

<style type="text/css">
#em_photo {
    height: 50%;
    width: 50%;
}
</style>
