<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Positions / Ranking</h3>
                        <div class="card-tools">
                            <button
                                @click="newModal"
                                class="btn btn-md btn-success"
                                data-toggle="modal"
                                data-target="#createPositionModal"
                            >
                                Create Position
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Position/Rank</th>
                                    <th>Supposed Salary</th>
                                    <th>Job Description</th>
                                    <th>Date Created</th>
                                    <th>Modify</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="position in positions"
                                    :key="position.id"
                                >
                                    <td>{{ position.name }}</td>
                                    <td>{{ position.supposed_salary }}</td>
                                    <td>
                                        {{
                                            (position.job_description.substring(
                                                0,
                                                15
                                            ) +
                                                "...")
                                                | stripTag
                                        }}
                                    </td>
                                    <td>
                                        {{ position.created_at | formatDate }}
                                    </td>
                                    <td>
                                        <button
                                            class="btn bg-orange"
                                            @click="
                                                loadSinglePosition(
                                                    position.id,
                                                    position.name
                                                )
                                            "
                                            data-toggle="modal"
                                            :data-target="targetedModalBtn"
                                        >
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="btn btn-primary"
                                            @click="editModal(position)"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button
                                            v-if="
                                                position.id !== 10 &&
                                                    position.id !== 12
                                            "
                                            class="btn btn-danger"
                                            @click="deletePosition(position.id)"
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
        <!--        View Position details modal-->
        <div
            class="modal fade"
            :id="targetedModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="viewSectionModal"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
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
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>Position</strong>
                                    <span class="float-right">
                                        {{ singlePosition.name }}</span
                                    >
                                </li>
                                <li class="list-group-item">
                                    <strong>Supposed Salary</strong>
                                    <span class="float-right">{{
                                        singlePosition.supposed_salary
                                    }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>Date Created</strong>
                                    <span class="float-right">{{
                                        singlePosition.created_at | formatDate
                                    }}</span>
                                </li>
                            </ul>
                            <div class="card mt-4">
                                <h3 class="text-center pt-3">
                                    Job Description
                                </h3>
                                <p
                                    class="p-3 ml-2"
                                    v-html="
                                        (jobDescription =
                                            singlePosition.job_description)
                                    "
                                ></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--        create Position modal-->
        <div
            aria-hidden="true"
            aria-labelledby="createPositionModal"
            class="modal fade"
            id="createPositionModal"
            role="dialog"
            tabindex="-1"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="!editMode" class="modal-title">
                            Create Positions
                        </h5>
                        <h5 v-else class="modal-title">Edit Position Info</h5>
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
                                editMode ? updatePosition() : createPosition()
                            "
                            action=""
                        >
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input
                                    v-if="
                                        form.name ==
                                            'Head of Department (H.O.D)'
                                    "
                                    disabled
                                    type="text"
                                    v-model.trim="form.name"
                                    name="name"
                                    class="form-control"
                                    id="name"
                                    :class="{
                                        'is-invalid': form.errors.has('name')
                                    }"
                                />
                                <input
                                    v-else-if="form.name == 'Sectional Head'"
                                    disabled
                                    type="text"
                                    v-model.trim="form.name"
                                    name="name"
                                    class="form-control"
                                    id="name"
                                    :class="{
                                        'is-invalid': form.errors.has('name')
                                    }"
                                />
                                <input
                                    v-else-if="(form.name = '')"
                                    type="text"
                                    v-model.trim="form.name"
                                    name="name"
                                    class="form-control"
                                    id="name"
                                    :class="{
                                        'is-invalid': form.errors.has('name')
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="name"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <label for="supposed_salary"
                                    >Supposed Salary</label
                                >
                                <input
                                    type="number"
                                    v-model.trim="form.supposed_salary"
                                    name="supposed_salary"
                                    class="form-control"
                                    id="supposed_salary"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'supposed_salary'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="supposed_salary"
                                ></has-error>
                            </div>
                            <div class="row justify-content-center">
                                <h3>
                                    {{ form.supposed_salary | formatDigits }}
                                </h3>
                            </div>
                            <div class="form-group">
                                <label>Job Description</label>
                                <ckeditor
                                    name="job_description"
                                    :editor="editor"
                                    v-model="form.job_description"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'job_description'
                                        )
                                    }"
                                >
                                </ckeditor>
                                <has-error
                                    :form="form"
                                    field="job_description"
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
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
export default {
    name: "StaffPosition",
    data() {
        return {
            editor: ClassicEditor,
            naira: "&#x20a6;",
            jobDescription: "",
            targetedModalBtn: "",
            targetedModal: "",
            editMode: true,
            singlePosition: {},
            positions: {},
            salary: "",
            form: new Form({
                id: "",
                name: "",
                supposed_salary: "",
                job_description: ""
            })
        };
    },
    methods: {
        newModal() {
            this.editMode = false;
            this.form.clear();
            this.form.reset();
            $("#createPositionModal").modal("show");
        },
        createPosition() {
            this.$Progress.start();
            this.form
                .post("/api/position")
                .then(() => {
                    $("#createPositionModal").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: "Position Created successfully"
                    });
                    Fire.$emit("positionCreated");
                    //load progress bar
                    this.$Progress.finish();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
        },
        updatePosition() {
            this.$Progress.start();
            this.form
                .put("/api/position/" + this.form.id)
                .then(() => {
                    $("#createPositionModal").modal("hide");
                    Toast.fire({
                        icon: "success",
                        title: "Position Updated successfully"
                    });
                    Fire.$emit("positionUpdated");
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
            $("#createPositionModal").modal("show");
            this.form.fill(value);
        },
        loadSinglePosition(id, name) {
            axios
                .get("/api/position/" + id)
                .then(({ data }) => (this.singlePosition = data.data));
            let realname = name.split(" ")[0];
            this.targetedModalBtn = "#" + realname;
            this.targetedModal = realname;
            this.jobDescription = this.singlePosition.job_description;
        },
        loadPosition() {
            axios
                .get("/api/positions")
                .then(({ data }) => {
                    console.log(this.positions);
                    this.positions = data.data;
                })
                .catch(error => console.log(error));
        },
        deletePosition(id) {
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
                        .delete("/api/position/" + id)
                        .then(() => {
                            Fire.$emit("positionDeleted");
                            Swal.fire(
                                "Deleted!",
                                "Position has been deleted.",
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
        this.loadPosition();
        Fire.$on("positionCreated", () => {
            this.loadPosition();
        });
        Fire.$on("positionDeleted", () => {
            this.loadPosition();
        });
        Fire.$on("positionUpdated", () => {
            this.loadPosition();
        });
    }
};
</script>

<style scoped></style>
