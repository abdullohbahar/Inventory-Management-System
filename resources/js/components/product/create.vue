<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Product</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link to="/">Dashboard</router-link>
                            </li>
                            <li class="breadcrumb-item active">Add Product</li>
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
                                    >All Product</router-link
                                >
                            </div>
                            <div class="card-body">
                                <form
                                    class="user"
                                    @submit.prevent="productInsert"
                                    enctype="multipart/form-data"
                                >
                                    <div class="row">
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Product Name</label>
                                            <input
                                                type="text"
                                                v-model="form.product_name"
                                                id=""
                                                class="form-control"
                                                placeholder="Product Name"
                                                required
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.product_name"
                                            >
                                                {{ errors.product_name[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Product Code</label>
                                            <input
                                                type="text"
                                                v-model="form.product_code"
                                                id=""
                                                class="form-control"
                                                placeholder="Product Code"
                                                required
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.product_code"
                                            >
                                                {{ errors.product_code[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <div class="form-group">
                                                <label>Product Category</label>
                                                <select
                                                    v-model="form.category_id"
                                                    class="form-control"
                                                >
                                                    <option
                                                        v-for="category in categories"
                                                        :key="category.id"
                                                        :value="category.id"
                                                    >
                                                        {{
                                                            category.category_name
                                                        }}
                                                    </option>
                                                </select>
                                            </div>
                                            <small
                                                class="text-danger"
                                                v-if="errors.category_name"
                                            >
                                                {{ errors.category_name[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <div class="form-group">
                                                <label>Supplier</label>
                                                <select
                                                    v-model="form.supplier_id"
                                                    class="form-control"
                                                >
                                                    <option
                                                        v-for="supplier in suppliers"
                                                        :key="supplier.id"
                                                        :value="supplier.id"
                                                    >
                                                        {{ supplier.name }}
                                                    </option>
                                                </select>
                                            </div>
                                            <small
                                                class="text-danger"
                                                v-if="errors.category_name"
                                            >
                                                {{ errors.category_name[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Root</label>
                                            <input
                                                type="text"
                                                v-model="form.root"
                                                id=""
                                                class="form-control"
                                                placeholder="Root"
                                                required
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.root"
                                            >
                                                {{ errors.root[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Buying Price</label>
                                            <input
                                                type="text"
                                                v-model="form.buying_price"
                                                id=""
                                                class="form-control"
                                                placeholder="Buying Price"
                                                required
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.buying_price"
                                            >
                                                {{ errors.buying_price[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Selling Price</label>
                                            <input
                                                type="text"
                                                v-model="form.selling_price"
                                                id=""
                                                class="form-control"
                                                placeholder="Selling Price"
                                                required
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.selling_price"
                                            >
                                                {{ errors.selling_price[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Buying Date</label>
                                            <input
                                                type="date"
                                                v-model="form.buying_date"
                                                id=""
                                                class="form-control"
                                                placeholder="Buying Date"
                                                required
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.buying_date"
                                            >
                                                {{ errors.buying_date[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for=""
                                                >Product Quantity</label
                                            >
                                            <input
                                                type="text"
                                                v-model="form.product_quantity"
                                                id=""
                                                class="form-control"
                                                placeholder="Product Quantity"
                                                required
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.product_quantity"
                                            >
                                                {{ errors.product_quantity[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3"
                                        >
                                            <label for="">Image</label>
                                            <input
                                                type="file"
                                                class="form-control"
                                                id=""
                                                @change="onFileSelected"
                                            />
                                        </div>
                                        <small
                                            class="text-danger"
                                            v-if="errors.image"
                                        >
                                            {{ errors.image[0] }}
                                        </small>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <img
                                                :src="form.image"
                                                style="
                                                    height: 100px;
                                                    width: 150px;
                                                "
                                            />
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3"
                                        >
                                            <button
                                                type="submit"
                                                class="btn btn-success btn-block"
                                            >
                                                Add Product
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
                product_name: null,
                product_code: null,
                root: null,
                buying_price: null,
                selling_price: null,
                supplier_id: null,
                category_id: null,
                buying_date: null,
                image: null,
                product_quantity: null,
            },
            errors: {},
            categories: {},
            suppliers: {},
        };
    },
    methods: {
        onFileSelected(event) {
            let file = event.target.files[0];
            if (file.size > 1048770) {
                Notification.image_validation();
            } else {
                let reader = new FileReader();
                reader.onload = (event) => {
                    this.form.image = event.target.result;
                    console.log(event.target.result);
                };
                reader.readAsDataURL(file);
            }
        },
        productInsert() {
            axios
                .post("/api/product", this.form)
                .then(() => {
                    this.$router.push({ name: "product" });
                    Notification.success();
                })
                .catch((error) => (this.errors = error.response.data.errors));
        },
    },
    created() {
        axios
            .get("/api/category/")
            .then(({ data }) => (this.categories = data));

        axios.get("/api/supplier/").then(({ data }) => (this.suppliers = data));
    },
};
</script>

<style lang=""></style>
