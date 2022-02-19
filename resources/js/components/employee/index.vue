<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Employee</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link to="/">Dashboard</router-link>
                            </li>
                            <li class="breadcrumb-item active">All Employee</li>
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
                                        to="/store-employee"
                                        class="btn btn-primary"
                                        >Add Employee</router-link
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
                                            <th>Sallary</th>
                                            <th>Joining Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="employee in filtersearch"
                                            :key="employee.id"
                                        >
                                            <td>{{ employee.name }}</td>
                                            <td>
                                                <img
                                                    :src="employee.photo"
                                                    alt=""
                                                    srcset=""
                                                    id="em_photo"
                                                />
                                            </td>
                                            <td>{{ employee.phone }}</td>
                                            <td>{{ employee.sallary }}</td>
                                            <td>{{ employee.joining_date }}</td>
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
                                                            name: 'edit-employee',
                                                            params: {
                                                                id: employee.id,
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
                                                            deleteEmployee(
                                                                employee.id
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
            employees: [],
            searchTerm: "",
        };
    },
    computed: {
        filtersearch() {
            return this.employees.filter((employee) => {
                return (
                    employee.name.match(this.searchTerm) ||
                    employee.phone.match(this.searchTerm)
                );
            });
        },
    },
    methods: {
        allEmployee() {
            axios
                .get("/api/employee")
                .then(({ data }) => (this.employees = data))
                .catch();
        },
        deleteEmployee(id) {
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
                        .delete("/api/employee/" + id)
                        .then(() => {
                            this.employees = this.employees.filter(
                                (employee) => {
                                    return employee.id != id;
                                }
                            );
                        })
                        .catch(() => {
                            this.$router.push({ name: "employee" });
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
        this.allEmployee();
    },
};
</script>

<style type="text/css">
#em_photo {
    height: 50%;
    width: 50%;
}
</style>
