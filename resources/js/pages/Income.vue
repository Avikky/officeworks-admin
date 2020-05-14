<template>
    <div class="container">
        <div class="justify-content-center">
            <div class="row justify-content-center mb-4">
                <router-link
                    tag="button"
                    to="/income"
                    active-class="active"
                    class="btn pa-3"
                    exact
                    >Categories</router-link
                >
                <router-link
                    tag="button"
                    to="/add-income"
                    active-class="active"
                    class="btn pa-3"
                    >Main Income</router-link
                >
            </div>
            <router-view></router-view>
            <hr />
            <div class="card" :hide="hide">
                <div class="card-header">
                    <h3 class="card-title">Income Category</h3>
                    <div class="card-tools">
                        <button
                            class="btn btn-md btn-success"
                            @click="newModal"
                            data-toggle="modal"
                            data-target="#createDepartmentModal"
                        >
                            Create New Income Caategory
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Income Type</th>
                                <th>Description</th>
                                <th>Date Created</th>
                                <th>Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Monthly Income
                                </td>
                                <td>
                                    This category houses the all the transport
                                    expenses
                                </td>
                                <td>02 jan 2020</td>
                                <td>
                                    <button class="btn bg-orange">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button
                                        class="btn btn-primary"
                                        @click.prevent="editModal()"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Income",
    data() {
        return {
            editMode: false,
            hide: false
        };
    },
    methods: {
        newModal() {
            this.editMode = false;
            this.form.clear();
            this.form.reset();
            $("#createSectionModal").modal("show");
        },
        editModal(value) {
            this.editMode = true;
            this.form.clear();
            this.form.reset();
            $("#createSectionModal").modal("show");
            this.form.fill(value);
        },
        hideCategory() {
            if (this.$route.path == "/add-income") {
                console.log(this.$route);
            }
        }
    },
    created() {
        this.hideCategory();
    }
};
</script>

<style scoped></style>
