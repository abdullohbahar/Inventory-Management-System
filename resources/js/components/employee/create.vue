<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Employee</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link to="/">Dashboard</router-link>
                            </li>
                            <li class="breadcrumb-item active">Add Employee</li>
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
                            <div class="card-body">
                                <form
                                    @submit.prevent="employeeInsert"
                                    enctype="multipart/form-data"
                                >
                                    <div class="row">
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Fullname</label>
                                            <input
                                                type="text"
                                                v-model="form.name"
                                                id=""
                                                class="form-control"
                                                placeholder="Fullname"
                                                required
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.name"
                                            >
                                                {{ errors.name[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Email</label>
                                            <input
                                                type="email"
                                                v-model="form.email"
                                                id=""
                                                class="form-control"
                                                placeholder="Email"
                                                required
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.email"
                                            >
                                                {{ errors.email[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Phone Number</label>
                                            <input
                                                type="text"
                                                v-model="form.phone"
                                                id=""
                                                class="form-control"
                                                placeholder="Phone Number"
                                                required
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.phone"
                                            >
                                                {{ errors.phone[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Sallary</label>
                                            <input
                                                type="text"
                                                v-model="form.sallary"
                                                id=""
                                                class="form-control"
                                                placeholder="Sallary"
                                                required
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.sallary"
                                            >
                                                {{ errors.sallary[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Joinning Date</label>
                                            <input
                                                type="date"
                                                v-model="form.joining_date"
                                                id=""
                                                class="form-control"
                                                placeholder="Joinning Date"
                                                required
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.joining_date"
                                            >
                                                {{ errors.joining_date[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">NID</label>
                                            <input
                                                type="text"
                                                v-model="form.nid"
                                                id=""
                                                class="form-control"
                                                placeholder="NID"
                                                required
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.nid"
                                            >
                                                {{ errors.nid[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3"
                                        >
                                            <label for="">Address</label>
                                            <textarea
                                                v-model="form.address"
                                                placeholder="address"
                                                id=""
                                                class="form-control"
                                                required
                                            ></textarea>
                                        </div>
                                        <small
                                            class="text-danger"
                                            v-if="errors.address"
                                        >
                                            {{ errors.address[0] }}
                                        </small>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Photo</label>
                                            <input
                                                type="file"
                                                class="form-control"
                                                id=""
                                            />
                                        </div>
                                        <small
                                            class="text-danger"
                                            v-if="errors.photo"
                                        >
                                            {{ errors.photo[0] }}
                                        </small>
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <img
                                                src="form.photo"
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
                                                Add Employee
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
                name: null,
                email: null,
                phone: null,
                sallary: null,
                joinning_date: null,
                nid: null,
                address: null,
                photo: null,
            },
            errors: {},
        };
    },
    methods: {
        employeeInsert() {},
    },
};
</script>

<style lang=""></style>
