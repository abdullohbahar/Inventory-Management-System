<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Customer</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link to="/">Dashboard</router-link>
                            </li>
                            <li class="breadcrumb-item active">Add Customer</li>
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
                                    to="/customer"
                                    class="btn btn-primary"
                                    >All Customer</router-link
                                >
                            </div>
                            <div class="card-body">
                                <form
                                    class="user"
                                    @submit.prevent="customerInsert"
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
                                                @change="onFileSelected"
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
                                                :src="form.photo"
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
                                                Add Customer
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
                address: null,
                photo: null,
            },
            errors: {},
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
                    this.form.photo = event.target.result;
                    console.log(event.target.result);
                };
                reader.readAsDataURL(file);
            }
        },
        customerInsert() {
            axios
                .post("/api/customer", this.form)
                .then(() => {
                    this.$router.push({ name: "customer" });
                    Notification.success();
                })
                .catch((error) => (this.errors = error.response.data.errors));
        },
    },
};
</script>

<style lang=""></style>
