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
                    to="/main-income"
                    active-class="active"
                    class="btn pa-3"
                    >Main Expenses</router-link
                >
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Expense Category</h3>
                    <div class="card-tools">
                        <button
                            class="btn btn-md btn-success"
                            @click="newModal"
                            data-toggle="modal"
                            data-target="#createDepartmentModal"
                        >
                            Create New Expense Caategory
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Expense Type</th>
                                <th>Description</th>
                                <th>Date Created</th>
                                <th>Modify</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Transport
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
                                        @click.prevent="editModal(department)"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button
                                        class="btn btn-danger"
                                        @click.prevent="
                                            deleteDepartment(department.id)
                                        "
                                    >
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
    name: "Expenditure"
};
</script>

<style scoped></style>
