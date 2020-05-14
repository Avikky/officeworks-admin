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
                            <div>
                                <h3 class="profile-username text-center" v-if="loadHod()">{{ loadHod().surname  }}</h3>
                                <h3 class="profile-username text-center" v-else="loadHod()">No HOD yet</h3>
                                <p class="text-muted text-center">Head of {{singleDepartment.name }} Department <b>(H.O.D)</b></p>
                                <ul class="list-group list-group-unbordered mb-3" v-if="loadHod()">
                                    <li class="list-group-item">
                                        <b>Surname</b> <a class="float-right" >{{ loadHod().surname  }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Firstname</b> <a class="float-right">{{loadHod().firstname}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Lastname</b> <a class="float-right">{{loadHod().lastname}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Age</b> <a class="float-right" >{{ loadHod().age }}</a>
                                    </li>
                                </ul>
                                <p v-else>No Data for now</p>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About H.O.D</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i>E-mail</strong>

                            <p class="text-muted" v-if="loadHod()">
                                {{ loadHod().email }}
                            </p>
                            <p class="text-muted" v-else>
                                No Data
                            </p>
                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i>Education</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dolorum quos ratione! Corporis!</p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">Malibu, California</p>

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
                                <li class="nav-item"><a class="nav-link" href="#rules" data-toggle="tab">Rules</a></li>
                                <li class="nav-item"><a class="nav-link" href="#members" data-toggle="tab">Members</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="overview">
                                    <h3 class="text-lg-center text-bold"><span>{{singleDepartment.department_name}}</span> Department</h3>
                                    <div class="">
                                        <h3>Date Created</h3>
                                        <p>{{ singleDepartment.created_at | formatDate}}</p>
                                        <hr>

                                        <h3>Department Strength</h3>
                                        <p v-if="singleDepartment.employees"> <strong>{{ singleDepartment.employees.length }}</strong></p>
                                        <hr>

                                        <h3>Sections</h3>

                                        <br>
                                        <div class="row justify-lg-center">
                                            <div class="col-10">
                                                <ul class="list-group">
                                                    <li class="list-group-item d-flex active justify-content-between align-items-center">
                                                        Sectional Head
                                                        <span class="badge bg-orange badge-pill">Sections </span>
                                                    </li>
                                                    <li v-for="section in singleDepartment.sections" class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span v-if="section.sectional_head">{{section.sectional_head}}</span>
                                                        <span v-else>No Sectional Head</span>
                                                        <span class="badge badge-primary badge-pill"> {{section.section_name}}</span>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="rules">
                                    <!-- The rules -->
                                    <div class="justify-content-center">
                                            <div class="card">
                                                <div class="card-header text-bold">Department Rules</div>

                                                <div class="card-body">
                                                    <div v-html="singleDepartment.department_rules"></div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="members">
                                    <!-- The rules -->
<!--                                    {{employees.data[3]}}-->
                                    <div class="justify-content-center">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Members of this Department</h3>
                                            </div>
                                            <!-- /.card-header -->
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
                                                    <tr v-for="(employee, index) in employees.data" :key="employee.id">
                                                        <td>{{index}}</td>
                                                        <td>{{employee.surname + ' ' + employee.firstname + ' ' + employee.lastname}}</td>
                                                        <td>
                                                            {{employee.position.name}}
                                                        </td>
                                                        <td>{{ employee.department_section.section_name}}</td>
                                                        <td>
                                                            <span v-if="employee.disable === 0"><i class="fas fa-circle pr-2 text-success"></i>Active</span>
                                                            <span v-if="employee.disable === 1"><i class="fas fa-circle pr-2 text-danger"></i> Disabled</span>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer clearfix">
                                                <ul class="pagination pagination-sm m-0 float-right">
                                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                                </ul>
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
                variable: 'Head of Department (H.O.D)',
                HOD: {},
                employees: '',
                id: this.$route.params.id,
                singleEmployee: {},
                singleDepartment: {},
            }
        },
        methods: {
            loadEmployees(){
                axios.get('/api/employee/with-dept/' + this.id).then(
                    ( res ) => {
                        this.employees = res.data;
                        return this.employees;
                    }
                );
            },
            loadHod(){
                 // console.log(this.employees.data);
                 this.employees.data.filter((x) => {
                    x.position.name === this.variable

                 });
                // let [hod] = this.employees.data.filter((x) => {
                //     return x.position.name === this.variable
                // });
                //
                // return hod;
            },
            loadSingleDepartment(){
                let path = '/api/department/' + this.id;
                axios.get(path).then(
                    ( {data} ) => (this.singleDepartment = data.data)
                );
            },
        },
        created() {
            this.loadEmployees();
            this.loadSingleDepartment();
            this.loadHod();
        },

    }
</script>

<style scoped>

</style>