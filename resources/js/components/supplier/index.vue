<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Supplier</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link to="/">Dashboard</router-link>
                            </li>
                            <li class="breadcrumb-item active">All Supplier</li>
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
                                        to="/store-supplier"
                                        class="btn btn-primary"
                                        >Add Supplier</router-link
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
                                            <th>Photo</th>
                                            <th>Phone Number</th>
                                            <th>Shop Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="supplier in filtersearch"
                                            :key="supplier.id"
                                        >
                                            <td>{{ supplier.name }}</td>
                                            <td>
                                                <img
                                                    :src="supplier.photo"
                                                    alt=""
                                                    srcset=""
                                                    id="em_photo"
                                                />
                                            </td>
                                            <td>{{ supplier.phone }}</td>
                                            <td>{{ supplier.shopname }}</td>
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
                                                            name: 'edit-supplier',
                                                            params: {
                                                                id: supplier.id,
                                                            },
                                                        }"
                                                        type="button"
                                                        class="btn btn-warning"
                                                    >
                                                        <i
                                                            class="far fa-edit"
                                                        ></i>
                                                    </router-link>
                                                    <button
                                                        type="button"
                                                        @click="
                                                            deleteSupplier(
                                                                supplier.id
                                                            )
                                                        "
                                                        class="btn btn-danger"
                                                    >
                                                        <i
                                                            class="far fa-trash-alt"
                                                        ></i>
                                                    </button>
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
            suppliers: [],
            searchTerm: "",
        };
    },
    computed: {
        filtersearch() {
            return this.suppliers.filter((supplier) => {
                return (
                    supplier.name.match(this.searchTerm) ||
                    supplier.phone.match(this.searchTerm)
                );
            });
        },
    },
    methods: {
        allSupplier() {
            axios
                .get("/api/supplier")
                .then(({ data }) => (this.suppliers = data))
                .catch();
        },
        deleteSupplier(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .delete("/api/supplier/" + id)
                        .then(() => {
                            this.suppliers = this.suppliers.filter(
                                (supplier) => {
                                    return supplier.id != id;
                                }
                            );
                        })
                        .catch(() => {
                            this.$router.push({ name: "supplier" });
                        });
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                }
            });
        },
    },
    created() {
        this.allSupplier();
    },
};
</script>

<style type="text/css">
#em_photo {
    height: 50%;
    width: 50%;
}
</style>
