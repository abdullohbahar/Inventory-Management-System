<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Sallary Details</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link to="/">Dashboard</router-link>
                            </li>
                            <li class="breadcrumb-item active">
                                All Sallary Details
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
                                <h3 class="card-title">
                                    <router-link
                                        to="/given-sallary"
                                        class="btn btn-primary"
                                        >Pay Sallary</router-link
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
                                            <th>Month Name</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="sallary in filtersearch"
                                            :key="sallary.id"
                                        >
                                            <td>{{ sallary.sallary_month }}</td>
                                            <td>
                                                <router-link
                                                    class="btn btn-info"
                                                    :to="{
                                                        name: 'view-sallary',
                                                        params: {
                                                            id: sallary.sallary_month,
                                                        },
                                                    }"
                                                    >Details</router-link
                                                >
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
            sallaries: [],
            searchTerm: "",
        };
    },
    computed: {
        filtersearch() {
            return this.sallaries.filter((sallary) => {
                return sallary.sallary_month.match(this.searchTerm);
            });
        },
    },
    methods: {
        allSallary() {
            axios
                .get("/api/sallary")
                .then(({ data }) => (this.sallaries = data))
                .catch();
        },
    },
    created() {
        this.allSallary();
    },
};
</script>

<style type="text/css">
#em_photo {
    height: 50%;
    width: 50%;
}
</style>
