<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Departmental Sections</h3>
                        <!--                        <div class="card-tools">-->
                        <!--                            <div class="input-group input-group-sm" style="width: 150px;">-->
                        <!--                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">-->

                        <!--                                <div class="input-group-append">-->
                        <!--                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </div>-->

                        <div class="card-tools">
                            <button
                                @click="newModal"
                                class="btn btn-md btn-success"
                                data-toggle="modal"
                                data-target="#createSectionModal"
                            >
                                Create section
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Section Name</th>
                                    <th>Associated Department</th>
                                    <th>Section Strength</th>
                                    <th>Date Created</th>
                                    <th>Modify</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="section in sections"
                                    :key="section.id"
                                >
                                    <td>{{ section.section_name }}</td>
                                    <td>
                                        {{ section.department.department_name }}
                                    </td>
                                    <td>{{ section.section_strength }}</td>
                                    <td>
                                        {{ section.created_at | formatDate }}
                                    </td>
                                    <td>
                                        <button
                                            class="btn bg-orange"
                                            @click="
                                                loadSingleSection(
                                                    section.id,
                                                    section.section_name
                                                )
                                            "
                                            data-toggle="modal"
                                            :data-target="targetedModalBtn"
                                        >
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="btn btn-primary"
                                            @click="editModal(section)"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button
                                            class="btn btn-danger"
                                            @click="deleteSection(section.id)"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!--        View Section details modal-->
        <div
            class="modal fade"
            :id="targetedModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="viewSectionModal"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <img
                                class="rounded-circle"
                                width="100"
                                height="100"
                                src="/img/department-logo.jpg"
                                alt="department logo"
                            />
                        </div>
                        <hr />
                        <div>
                            <h3 class="text-lg-center">Section Identity</h3>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span>Section Name:</span>
                                    <strong class="ml-5">{{
                                        singleSection.section_name
                                    }}</strong>
                                </li>
                                <li class="list-group-item">
                                    <span>Associated Department:</span>
                                    <strong
                                        v-if="singleSection.department"
                                        class="ml-5"
                                        >{{
                                            singleSection.department
                                                .department_name
                                        }}</strong
                                    >
                                </li>
                            </ul>
                            <hr />
                            <h3 class="text-lg-center">Sectional Gaol:</h3>
                            <div class="card">
                                <div class="card-body">
                                    {{ singleSection.section_goal }}
                                </div>
                            </div>
                            <hr />
                            <h3 class="text-lg-center">
                                Reason for Creating this Section
                            </h3>
                            <div class="card">
                                {{ singleSection.reason_for_creation }}
                            </div>
                            <hr />
                            <h3 class="text-lg-center">
                                Staff Members of this Section
                            </h3>
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Section</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(employee,
                                                index) in singleSection.employees"
                                                :key="employee.id"
                                            >
                                                <td>{{ index + 1 }}</td>
                                                <td>
                                                    {{
                                                        employee.surname +
                                                            " " +
                                                            employee.firstname +
                                                            " " +
                                                            employee.lastname
                                                    }}
                                                </td>
                                                <td v-if="employee.position">
                                                    {{ employee.position.name }}
                                                </td>
                                                <td
                                                    v-if="
                                                        employee.department_section
                                                    "
                                                >
                                                    {{
                                                        employee
                                                            .department_section
                                                            .section_name
                                                    }}
                                                </td>
                                                <td>
                                                    <span
                                                        v-if="
                                                            employee.disable ===
                                                                0
                                                        "
                                                        ><i
                                                            class="fas fa-circle pr-2 text-success"
                                                        ></i
                                                        >Active</span
                                                    >
                                                    <span
                                                        v-if="
                                                            employee.disable ===
                                                                1
                                                        "
                                                        ><i
                                                            class="fas fa-circle pr-2 text-danger"
                                                        ></i>
                                                        Disabled</span
                                                    >
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--        create section modal-->
        <div
            aria-hidden="true"
            aria-labelledby="createSectionModal"
            class="modal fade"
            id="createSectionModal"
            role="dialog"
            tabindex="-1"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="!editMode" class="modal-title">
                            Create Section for Departments
                        </h5>
                        <h5 v-else class="modal-title">Edit Section Info</h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form
                            @submit.prevent="
                                editMode ? updateSection() : createSection()
                            "
                            action=""
                        >
                            <div class="form-group">
                                <label for="section_name">Section Name</label>
                                <input
                                    type="text"
                                    v-model.trim="form.section_name"
                                    name="section_name"
                                    class="form-control"
                                    id="section_name"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'section_name'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="section_name"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <label>Associate To A Department</label>
                                <select
                                    class="form-control"
                                    v-model="form.department_id"
                                    id="department_id"
                                    name="department_id"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'department_id'
                                        )
                                    }"
                                >
                                    <option
                                        v-for="department in departments"
                                        :key="department.id"
                                        :value="department.id"
                                        >{{ department.department_name }}
                                    </option>
                                </select>
                                <has-error
                                    :form="form"
                                    field="department_id"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <label
                                    >Choose Sectional Head
                                    <i>(optional)</i></label
                                >
                                <select
                                    @change="checkIfHead"
                                    class="form-control"
                                    v-model="form.sectional_head"
                                    id="sectional_head"
                                    name="sectional_head"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'sectional_head'
                                        )
                                    }"
                                >
                                    <option
                                        v-for="employee in employees"
                                        :key="employee.id"
                                    >
                                        {{
                                            employee.surname +
                                                " " +
                                                employee.firstname
                                        }}
                                    </option>
                                </select>
                                <p v-if="message === 'true'" class="py-3">
                                    <small class="text-danger">
                                        <i
                                            class="fas fa-times-circle text-danger pr-1"
                                        ></i>
                                        This employee is a sectonal head
                                        already.
                                    </small>
                                </p>
                                <p v-else class="py-3">
                                    <small class="text-success">
                                        <i
                                            class="fas fa-check-circle text-success pr-1"
                                        ></i>
                                        Remember to asign this Position to
                                        Employee to make it public
                                    </small>
                                </p>
                            </div>

                            <div class="form-group">
                                <label for="section_goal">Section Goal </label>
                                <input
                                    type="text"
                                    v-model.trim="form.section_goal"
                                    name="section_goal"
                                    class="form-control"
                                    id="section_goal"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'section_goal'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="section_goal"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <label
                                    >The Reason/need of Creation
                                    <i>(optional)</i></label
                                >
                                <textarea
                                    class="form-control"
                                    v-model.trim="form.reason_for_creation"
                                    name="reason_for_creation"
                                    id="reason_for_creation"
                                    rows="3"
                                    placeholder="Reason for creating this section"
                                ></textarea>
                                <has-error
                                    :form="form"
                                    field="reason_for_creation"
                                ></has-error>
                            </div>
                            <div
                                class="modal-footer row justify-content-center"
                            >
                                <button
                                    v-if="!editMode"
                                    type="submit"
                                    class="btn btn-lg btn-primary"
                                >
                                    Create
                                </button>
                                <button
                                    v-else
                                    type="submit"
                                    class="btn btn-lg btn-success"
                                >
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Department",
    data() {
        return {
            targetedModalBtn: "",
            targetedModal: "",
            editMode: true,
            sections: {},
            singleSection: {},
            employees: {},
            message: "",
            departments: {},
            sectionDepartment: {},
            form: new Form({
                id: "",
                section_name: "",
                section_goal: "",
                reason_for_creation: "",
                associated_dept: "",
                sectional_head: "",
                department_id: "",
                is_sectional_head: "",
                headID: ""
            })
        };
    },
    methods: {
        checkIfHead() {
            let name = this.form.sectional_head;
            axios
                .get("/api/department-section/check-sec-head/" + name)
                .then(({ data }) => {
                    this.message = data.status;
                });
        },
        newModal() {
            this.editMode = false;
            this.form.clear();
            this.form.reset();
            this.message = "";
            $("#createSectionModal").modal("show");
        },
        createSection() {
            this.$Progress.start();
            this.form
                .post("/api/department-sections")
                .then(() => {
                    $("#createSectionModal").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: "Section Created successfully"
                    });
                    Fire.$emit("sectionCreated");
                    //load progress bar
                    this.$Progress.finish();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
        },
        updateSection() {
            this.$Progress.start();
            this.form
                .put("/api/department-sections/" + this.form.id)
                .then(() => {
                    $("#createSectionModal").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: "Section Updated successfully"
                    });
                    Fire.$emit("sectionUpdated");
                    //load progress bar
                    this.$Progress.finish();
                })
                .catch(error => {
                    console.log(error);
                    this.$Progress.fail();
                });
        },
        editModal(value) {
            this.editMode = true;
            this.form.clear();
            this.form.reset();
            this.message = "";
            $("#createSectionModal").modal("show");
            this.form.fill(value);
        },
        loadSingleSection(id, name) {
            axios
                .get("/api/department-sections/" + id)
                .then(({ data }) => (this.singleSection = data.data));
            let realname = name.split(" ")[0];
            this.targetedModalBtn = "#" + realname;
            this.targetedModal = realname;
            return this.singleSection;
        },
        loadEmployees() {
            axios
                .get("api/employees/without-head-title")
                .then(({ data }) => (this.employees = data.data));
        },
        loadDepartment() {
            axios
                .get("api/departments")
                .then(({ data }) => (this.departments = data.data));
        },
        loadSections() {
            axios
                .get("api/department-sections")
                .then(({ data }) => {
                    console.log(this.sections);
                    this.sections = data.data;
                })
                .catch(error => console.log(error));
        },
        deleteSection(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                if (result.value) {
                    this.form
                        .delete("/api/department-sections/" + id)
                        .then(() => {
                            Fire.$emit("sectionDeleted");
                            Swal.fire(
                                "Deleted!",
                                "Department has been deleted.",
                                "success"
                            );
                        })
                        .catch(() => {
                            Swal.fire(
                                "Failed!",
                                "Opps something went wrong.",
                                "warning"
                            );
                        });
                }
            });
        }
    },
    created() {
        this.loadEmployees();
        this.loadDepartment();
        this.loadSections();
        Fire.$on("sectionCreated", () => {
            this.loadSections();
        });
        Fire.$on("sectionDeleted", () => {
            this.loadSections();
        });
        Fire.$on("sectionUpdated", () => {
            this.loadSections();
        });
        Fire.$on("checkSectionHead", () => {
            this, loadEmployees();
        });
    }
};
</script>

<style scoped></style>
