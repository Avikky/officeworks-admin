<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Staff</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Surname</th>
                                <th>Firstname</th>
                                <th>Position</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Modify</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr
                                    v-for="employee in employees"
                                    :key="employee.id"
                            >
                                <td>{{ employee.surname }}</td>
                                <td>{{ employee.firstname }}</td>
                                <td>
                                    <span v-if="employee.position == null"><i>Position not assigned yet</i></span>
                                    <span v-if="employee.position !== null"> {{ employee.position.name }}</span>
                                </td>
                                <td>
                                    <span v-if="employee.department == null"><i>Department not assigned yet</i></span>
                                    <span v-if="employee.department !== null">{{ employee.department.department_name }}</span>
                                </td>
                                <td>
                                   <span v-if="employee.disable === 0">
                                       <i class="fas fa-circle text-success pr-1"></i>Active
                                   </span>
                                    <span>
                                         <span v-if="employee.disable === 1"><i class="fas fa-circle text-danger pr-1"></i>Disabled</span>
                                    </span>
                                </td>
                                <td>
                                    <router-link tag="button"
                                                 :to=" {
                                                     name: 'staff',
                                                     params: {
                                                     id: employee.id,
                                                     name: employee.surname,
                                                     }
                                                 }"
                                                 class="btn bg-orange">
                                        <i class="fas fa-eye"></i>
                                    </router-link>
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
    </div>
</template>

<script>
    export default {
        name: "AllStaff",
        data(){
            return {
                // targetedModalBtn: '',
                // targetedModal: '',
                employees: {},
                departments: {},
                sections: {},
                positions: {},
                singleEmployee:{},
                singleDepartment: {},
                form: new Form({
                    id: '',
                    department_id: '',
                    department_section_id: '',
                    position_id: '',
                }),

            }
        },
        methods: {
            assignPositionAndDepartment(){
               let id =  this.form.id;
                console.log(id);
            },
            clearform(){
                this.form.clear();
                this.form.reset();
            },
            loadEmployees(){
                axios.get('/api/employees/with-position').then(
                    ( {data} ) => (this.employees = data.data)
                );
            },
            loadSingleEmployee(id,name){
                axios
                    .get("/api/employee/" + id)
                    .then(({ data }) => (this.singleEmployee = data.data));
                let realname = name.split(" ")[0];
                this.targetedModalBtn = "#" + realname;
                this.targetedModal = realname;
            },
            loadSingleDepartment() {
                let id = this.form.department_id;
                axios.get("/api/department/" + id)
                    .then(({ data }) => (this.singleDepartment = data.data))
                    .catch((error) => {
                        return error
                    } );
            },
            loadDepartment(){
                axios.get('api/departments').then(
                    ( {data} ) => (this.departments = data.data)
                );
            },
            loadPositions() {
                axios.get('/api/positions').then(
                    ( {data} ) => (this.positions = data.data)
                );
            }
        },
        created() {
            this.loadEmployees();
            this.loadDepartment();
            this.loadPositions();
        },

    }
</script>

<style scoped>

</style>