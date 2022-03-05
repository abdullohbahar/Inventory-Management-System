<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Product</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link to="/">Dashboard</router-link>
                            </li>
                            <li class="breadcrumb-item active">Stock</li>
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
                                <h3 class="card-title">
                                    <router-link
                                        to="/store-product"
                                        class="btn btn-primary"
                                        >Add Product</router-link
                                    >
                                </h3>
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
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Code</th>
                                            <th>Category</th>
                                            <th>Buying Price</th>
                                            <th>Status</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="product in filtersearch"
                                            :key="product.id"
                                        >
                                            <td>
                                                {{ product.product_name }}
                                            </td>
                                            <td>
                                                <img
                                                    :src="product.image"
                                                    alt=""
                                                    srcset=""
                                                    id="em_photo"
                                                />
                                            </td>
                                            <td>
                                                {{ product.product_code }}
                                            </td>
                                            <td>
                                                {{ product.category_name }}
                                            </td>
                                            <td>
                                                {{ product.buying_price }}
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
                                            <td>
                                                {{ product.product_quantity }}
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <router-link
                                                        to=""
                                                        class="btn btn-info"
                                                    >
                                                        <i
                                                            class="far fa-eye"
                                                        ></i>
                                                    </router-link>
                                                    <router-link
                                                        :to="{
                                                            name: 'edit-stock',
                                                            params: {
                                                                id: product.id,
                                                            },
                                                        }"
                                                        type="button"
                                                        class="btn btn-warning"
                                                    >
                                                        <i
                                                            class="far fa-edit"
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
            products: [],
            searchTerm: "",
        };
    },
    computed: {
        filtersearch() {
            return this.products.filter((product) => {
                return (
                    product.product_name.match(this.searchTerm) ||
                    product.product_code.match(this.searchTerm)
                );
            });
        },
    },
    methods: {
        allProduct() {
            axios
                .get("/api/product")
                .then(({ data }) => (this.products = data))
                .catch();
        },
    },
    created() {
        this.allProduct();
    },
};
</script>

<style type="text/css">
#em_photo {
    height: 50%;
    width: 50%;
}
</style>
