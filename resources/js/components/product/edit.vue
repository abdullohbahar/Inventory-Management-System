<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Category</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <router-link to="/">Dashboard</router-link>
                            </li>
                            <li class="breadcrumb-item active">
                                Edit Category
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
                                <router-link
                                    to="/category"
                                    class="btn btn-primary"
                                    >All Category</router-link
                                >
                            </div>
                            <div class="card-body">
                                <form
                                    class="user"
                                    @submit.prevent="categoryUpdate"
                                    enctype="multipart/form-data"
                                >
                                    <div class="row">
                                        <div
                                            class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3"
                                        >
                                            <label for="">Category Name</label>
                                            <input
                                                type="text"
                                                v-model="form.category_name"
                                                id=""
                                                class="form-control"
                                                placeholder="Category Name"
                                                required
                                            />
                                            <small
                                                class="text-danger"
                                                v-if="errors.category_name"
                                            >
                                                {{ errors.category_name[0] }}
                                            </small>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3"
                                        >
                                            <button
                                                type="submit"
                                                class="btn btn-success btn-block"
                                            >
                                                Update Category
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
                category_name: "",
            },
            errors: {},
        };
    },
    created() {
        let id = this.$route.params.id;
        axios
            .get("/api/category/" + id)
            .then(({ data }) => (this.form = data))
            .catch(console.log("Error"));
    },
    methods: {
        onFileSelected(event) {
            let file = event.target.files[0];
            if (file.size > 1048770) {
                Notification.image_validation();
            } else {
                let reader = new FileReader();
                reader.onload = (event) => {
                    this.form.newphoto = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        categoryUpdate() {
            let id = this.$route.params.id;
            axios
                .patch("/api/category/" + id, this.form)
                .then(() => {
                    this.$router.push({ name: "category" });
                    Notification.success();
                })
                .catch((error) => (this.errors = error.response.data.errors));
        },
    },
};
</script>

<style lang=""></style>
