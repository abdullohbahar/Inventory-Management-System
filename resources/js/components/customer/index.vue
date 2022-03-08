<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Customer</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link to="/">Dashboard</router-link>
                            </li>
                            <li class="breadcrumb-item active">All Customer</li>
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
                                        to="/store-customer"
                                        class="btn btn-primary"
                                        >Add Customer</router-link
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
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="customer in filtersearch"
                                            :key="customer.id"
                                        >
                                            <td>{{ customer.name }}</td>
                                            <td>
                                                <img
                                                    :src="customer.photo"
                                                    alt=""
                                                    srcset=""
                                                    id="em_photo"
                                                />
                                            </td>
                                            <td>{{ customer.phone }}</td>
                                            <td>{{ customer.email }}</td>
                                            <td>{{ customer.address }}</td>
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
                                                            name: 'edit-customer',
                                                            params: {
                                                                id: customer.id,
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
                                                            deleteCustomer(
                                                                customer.id
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
            customers: [],
            searchTerm: "",
        };
    },
    computed: {
        filtersearch() {
            return this.customers.filter((customer) => {
                return (
                    customer.name.match(this.searchTerm) ||
                    customer.phone.match(this.searchTerm)
                );
            });
        },
    },
    methods: {
        allCustomer() {
            axios
                .get("/api/customer")
                .then(({ data }) => (this.customers = data))
                .catch();
        },
        deleteCustomer(id) {
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
                        .delete("/api/customer/" + id)
                        .then(() => {
                            this.customers = this.customers.filter(
                                (customer) => {
                                    return customer.id != id;
                                }
                            );
                        })
                        .catch(() => {
                            this.$router.push({ name: "customer" });
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
        this.allCustomer();
    },
};
</script>

<style type="text/css">
#em_photo {
    height: 50%;
    width: 50%;
}
</style>
