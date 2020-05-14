<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="/img/user-img.png" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{ singleEmployee.surname }}</h3>
                            <p class="text-muted text-center" v-if="singleEmployee.position"><b>{{singleEmployee.position.name}}</b></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Surname</b> <a class="float-right">{{singleEmployee.surname}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Firstname</b> <a class="float-right">{{singleEmployee.firstname}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Lastname</b> <a class="float-right">{{singleEmployee.lastname}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Age</b> <a class="float-right">{{singleEmployee.age }}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About {{ singleEmployee.surname }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i>E-mail Address</strong>
                            <p class="text-muted">
                                {{singleEmployee.email }}
                            </p>
                            <hr>

                            <strong><i class="fas fa-book mr-1"></i> Education</strong>
                            <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>
                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
                            <p class="text-muted">{{ singleEmployee.address }}</p>
                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">UI Design</span>
                                <span class="tag tag-success">Coding</span>
                                <span class="tag tag-info">Javascript</span>
                                <span class="tag tag-warning">PHP</span>
                                <span class="tag tag-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i>Personal Notes</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#overview" data-toggle="tab">Overview</a></li>
                                <li class="nav-item"><a class="nav-link" href="#education" data-toggle="tab">Education</a></li>
                                <li @click="editModal(singleEmployee)" class="nav-item"><a class="nav-link" href="#updatePosition" data-toggle="tab">Department and Position</a></li>
                                <li class="nav-item"><a class="nav-link" href="#control" data-toggle="tab">Control</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="overview">
                                    <h3 class="text-lg-center text-bold mb-lg-5">
                                        <span class="mr-3">{{singleEmployee.surname}}</span>
                                        <span class="mr-3">{{singleEmployee.firstname}}</span>
                                        <span>{{singleEmployee.lastname}}</span>
                                    </h3>
                                    <h3 class="text-bold">Bio</h3>
                                    <div class="row justify-content-start">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A doloribus in provident,
                                                    quam quos ratione reiciendis! Doloribus enim error, explicabo incidunt ipsa molestias
                                                    nam quos velit. Architecto consectetur eligendi reiciendis.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h3>Nationality</h3>
                                    <p>Nigeria</p>
                                    <hr>
                                    <h3>State of Origin</h3>
                                    <p>Enugu State</p>
                                    <hr>
                                    <h3>Date Registered</h3>
                                    <p>{{ singleEmployee.created_at | formatDate}}</p>

                                    <hr>

                                    <h3>Position and Salary</h3>
                                    <div v-if="singleEmployee.position">
                                        <p><strong>Position</strong> <span class="ml-lg-5">{{ singleEmployee.position.name}}</span></p>
                                        <strong>Salary</strong> <span class="ml-lg-5">{{ singleEmployee.position.supposed_salary }}</span>
                                    </div>
                                    <hr>

                                    <h3>Job description base on Position</h3>
                                        <div v-if="singleEmployee.position">
                                            <div v-html="singleEmployee.position.job_description"></div>
                                        </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="education">
                                    <h3 class="text-lg-center text-bold">Higher Institution</h3>
                                    <div class="pa-4 mt-lg-5">
                                        <h3>MBA</h3>
                                        <p><strong>Institution: </strong> <span class="ml-lg-5"></span></p>
                                        <p><strong>Honors: </strong> <span class="ml-lg-5">Second Class Upper</span></p>
                                        <hr>

                                        <h3>MSc</h3>
                                        <p><strong>Institution: </strong> <span class="ml-lg-5">institute</span></p>
                                        <p><strong>Honors: </strong> <span class="ml-lg-5">Second Class Upper</span></p>
                                        <hr>

                                        <h3>First Degree</h3>
                                        <p><strong>Institution: </strong> <span class="ml-lg-5">Institute</span></p>
                                        <p><strong>Honors: </strong> <span class="ml-lg-5">Second Class Upper</span></p>
                                        <hr>

                                        <h3>Second Degree</h3>
                                        <p><strong>Institution: </strong> <span class="ml-lg-5">Institute</span></p>
                                        <p><strong>Honors: </strong> <span class="ml-lg-5">Second Class Upper</span></p>
                                        <hr>
                                    </div>
                                    <h3 class="text-lg-center text-bold">Professional Skills</h3>
                                    <div class="pa-4 mt-lg-5">
                                        <h3>Title</h3>
                                        <p><strong>Institution: </strong> <span class="ml-lg-5"></span></p>
                                        <p><strong>Certified: </strong> <span class="ml-lg-5">Yes</span></p>
                                        <hr>
                                    </div>
                                    <h3 class="text-lg-center text-bold">Primary and Secondary Education</h3>
                                    <div class="pa-4 mt-lg-5">
                                        <h3>Senior Secondary</h3>
                                        <p><strong>School Name: </strong> <span class="ml-lg-5"></span></p>
                                        <p><strong>Duration: </strong> <span class="ml-lg-5">Yes</span></p>
                                        <hr>
                                        <h3>Junior Secondary</h3>
                                        <p><strong>School Name: </strong> <span class="ml-lg-5"></span></p>
                                        <p><strong>Duration: </strong> <span class="ml-lg-5">Yes</span></p>
                                        <hr>
                                        <h3>Primary Education</h3>
                                        <p><strong>School Name: </strong> <span class="ml-lg-5"></span></p>
                                        <p><strong>Duration: </strong> <span class="ml-lg-5">Yes</span></p>
                                        <hr>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="updatePosition">
                                    <!-- The rules -->
                                    <div class="row justify-content-center">
                                        <div class="col-md-10">
                                            <div class="card">
                                                <div class="card-header">Assign Department and position</div>
                                                <div class="card-body">
                                                    <form @submit.prevent="assignPositionAndDepartment">
                                                            <div class="row">
                                                                <div class="col-6 form-group">
                                                                    <label>Choose Department</label>
                                                                    <select class="form-control" @change="loadSingleDepartment" v-model="form.department_id" id="department" name="department">
                                                                        <option v-for="department in departments" :value="department.id">{{ department.department_name }}</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-6 form-group">
                                                                    <label>Choose Department Section</label>
                                                                    <select class="form-control" v-model="form.department_section_id" id="section" name="department_section_id" :class="{ 'is-invalid': form.errors.has('department_section_id') }">
                                                                        <option v-for="section in singleDepartment.sections" :value="section.id">{{ section.section_name}}</option>
                                                                        <option value="0">No Related Section</option>
                                                                    </select>
                                                                    <has-error :form="form" field="department_section_id"></has-error>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Choose Position</label>
                                                                <select class="form-control" v-model="form.position_id" id="position_id" name="position_id" :class="{ 'is-invalid': form.errors.has('position_id') }">
                                                                    <option v-for="position in positions" :value="position.id">{{ position.name}}</option>
                                                                </select>
                                                                <has-error :form="form" field="position_id"></has-error>
                                                            </div>
                                                            <div class="modal-footer row justify-content-center">
                                                                <button type="submit" class="btn btn-lg btn-success">
                                                                    Assign
                                                                </button>
                                                            </div>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="control">
                                    <h3 class="text-lg-center text-bold" style="color: red;">Control Unit</h3>
                                    <p class="text-lg-center" v-if="singleEmployee.disable === 1">This Employee is <span class="bg-orange text-white">DISABLED</span></p>
                                    <div class="row justify-content-center">
                                        <div class="col-md-10">
                                            <div class="card">
                                                <div class="row card-body">
                                                    <div class="col-6">
                                                        <button @click="disableEmployee(singleEmployee.id, singleEmployee.disable)"  class="btn bg-orange" v-if="singleEmployee.disable === 0">
                                                        <i class="fas fa-ban pr-3"></i> Disable Employee
                                                        </button>
                                                        <input
                                                                type="number"
                                                                v-model.trim="employeeState.disable"
                                                                name="disable"
                                                                class="form-control"
                                                                id="disable"
                                                                :class="{
                                                                'is-invalid': form.errors.has(
                                                                'disable'
                                                                )
                                                                }"
                                                                hidden
                                                        />
                                                        <button @click="enableEmployee(singleEmployee.id, singleEmployee.disable)" class="btn btn-success" v-if="singleEmployee.disable === 1">
                                                            <i class="fas fa-ban pr-3"></i> Enable Employee
                                                        </button>
                                                    </div>
                                                    <div class="col-6">
                                                        <button @click="deleteEmployee(singleEmployee.id)" class="btn btn-danger"><i class="fas fa-trash pr-3"></i> Delete Employee</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ViewDepartment",
        data() {
            return {
                id: this.$route.params.id,
                singleEmployee: {},
                departments: {},
                positions: {},
                singleDepartment: {},
                form: new Form({
                    id: '',
                    department_id: '',
                    department_section_id: '',
                    position_id: '',
                }),
                employeeState: new Form({
                 disable: 1,
                    enable: 0
                }),
            }
        },
        methods: {
            assignPositionAndDepartment(){
                this.$Progress.start();
                this.form
                    .put("/api/employee/assign-position/" + this.id).then( (res) => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Your Request was successful'
                    });
                    Fire.$emit('assignPosition');
                    //load progress bar
                    this.$Progress.finish()
                })
                    .catch( (err) => {
                        this.$Progress.fail()
                    });
            },
            loadEmployees(){
                axios.get('/api/employees').then(
                    ( {data} ) => (this.employees = data.data)
                );
            },
            loadSingleDepartment() {
                let id = this.form.department_id;
                axios.get("/api/department/" + id)
                    .then(({ data }) => (this.singleDepartment = data.data))
                    .catch((error) => {
                        return error
                    } );
            },
            loadSingleEmployee(){
                let path = '/api/employee/' + this.id;
                axios.get(path).then(
                    ( {data} ) => (this.singleEmployee = data.data)
                );
            },
            loadDepartment(){
                axios.get('/api/departments').then(
                    ( {data} ) => (this.departments = data.data)
                );
            },
            loadPositions() {
                axios.get('/api/positions').then(
                    ( {data} ) => (this.positions = data.data)
                );
            },
            editModal(value){
                if(value){
                    this.form.fill(value);
                }

            },
            deleteEmployee(id){
                Swal.fire({
                    title: "Are you sure about this?",
                    text: "If Deleted Data cannot be retrieved back",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d0211c",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, Delete!"
                }).then(result => {
                    if (result.value) {
                        this.employeeState.delete("/api/employee/admin-delete/" + id).then(() => {
                            Swal.fire(
                                "Deleted!",
                                "Employee has been Deleted.",
                                "success"
                            );
                            Fire.$emit("employeeDeleted");
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
            },
            enableEmployee(id){
                Swal.fire({
                    title: "Are you sure about this?",
                    text: "Enable employee",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#2fa360",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, Enable!"
                }).then(result => {
                    if (result.value) {
                        this.employeeState.put("/api/employee/enable/" + id).then(() => {
                            Fire.$emit("employeeEnabled");
                            Swal.fire(
                                "Enabled!",
                                "Employee has been Enabled.",
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
            },
            disableEmployee(id){
                Swal.fire({
                    title: "Are you sure about this?",
                    text: "Disable this employee",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#FFA500",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, Disable!"
                }).then(result => {
                    if (result.value) {
                            this.employeeState.put("/api/employee/disable/" + id).then(() => {
                                Fire.$emit("employeeDisabled");
                                Swal.fire(
                                    "Disabled!",
                                    "Employee has been disabled.",
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
            },
        },
        created() {
            this.loadSingleEmployee();
            this.loadEmployees();
            this.loadDepartment();
            this.loadPositions();
            Fire.$on("employeeDisabled", () => {
                this.loadSingleEmployee();
            });
            Fire.$on("employeeEnabled", () => {
                this.loadSingleEmployee();
            });
            Fire.$on("employeeDeleted", () => {
                this.$router.push('/all-staff');
            });
        }

    }
</script>

<style scoped>

</style>