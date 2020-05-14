<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Departments</h3>
                        <div class="card-tools">
                            <button class="btn btn-md btn-success" @click="newModal"  data-toggle="modal" data-target="#createDepartmentModal">
                                Create New Department
                            </button>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Departments</th>
                                <th>Department Strength</th>
                                <th>Number of Sections</th>
                                <th>Date Created</th>
                                <th>Modify</th>
                            </tr>
                            </thead>
                            <tbody>
                            <template v-if="departments.length > 0">
                                <tr v-for="department in departments" :key="department.id">
                                    <td>{{ department.department_name | upText }}</td>
                                    <td v-if="department.employees">{{ department.employees.length }}</td>
                                    <td>{{ department.sections.length }}</td>
                                    <td>{{ department.created_at | formatDate }}</td>
                                    <td>
                                        <router-link tag="button" :to=" { name: 'view', params: { id: department.id, name: department.department_name } }" class="btn bg-orange"><i class="fas fa-eye"></i></router-link>
                                        <button class="btn btn-primary" @click.prevent="editModal(department)"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger" @click.prevent="deleteDepartment(department.id)"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </template>
                            <div v-else class=" row justify-content-center">
                                <p class="p-20"><i>No data yet..</i></p>
                            </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="createDepartmentModal"  tabindex="-1" role="dialog" aria-labelledby="createDepartmentModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="!editMode" class="modal-title" >Create New Department</h5>
                        <h5 v-else class="modal-title">Edit Department Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="editMode ? updateDepartment() : createDepartment()" action="">
                            <div class="form-group">
                                    <label for="department_name">Department Name</label>
                                    <input type="text"  v-model.trim="form.department_name" name="department_name" class="form-control"  id="department_name" :class="{ 'is-invalid': form.errors.has('department_name') }">
                                    <has-error :form="form" field="department_name"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Department Rules</label>
                                <ckeditor name="department_rules" :editor="editor" v-model.trim="form.department_rules" :class="{
                                        'is-invalid': form.errors.has('department_rules')}">
                                </ckeditor>
                                <has-error :form="form" field="department_rules"></has-error>
                            </div>
                            <div class="modal-footer row justify-content-center">
                                <button v-if="editMode" type="submit" class="btn btn-lg btn-success">Update</button>
                                <button v-else type="submit" class="btn btn-lg btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    export default {
        name: "Department",
        data() {
            return {
                editor: ClassicEditor,
                editMode: true,
                departments: {},
                employees: {},
                singleEmployee: {},
                employeeID: '',
                sections: {},
                form: new Form({
                    id: '',
                    department_name: '',
                    department_HOD: '',
                    department_rules: ''
                }),
            }
        },
        methods: {
            newModal() {
                this.editMode = false;
                this.form.clear();
                this.form.reset();
                $('#createDepartmentModal').modal('show');
            },
            loadEmployees(){
                axios.get('api/employees').then(
                    ( {data} ) => (this.employees = data.data)
                );
            },
            loadSingleEmployee(){
                let id = this.form.department_HOD;
                let path = 'api/employee/' + id;
                axios.get(path).then(
                    ( {data} ) => (this.singleEmployee = data.data)
                );
                // if(id.length >= 0) {
                //     this.hide = true;
                // }
            },
            loadDepartment(){
                axios.get('api/departments').then(
                    ( {data} ) => (this.departments = data.data)
                );
            },
            createDepartment(){
                this.$Progress.start();
               this.form.post('/api/department', this.form).then(
                   (res) => {
                       $('#createDepartmentModal').modal('hide');
                       Toast.fire({
                           icon: 'success',
                           title: 'Department Created successfully'
                       });
                       Fire.$emit('AfterDptCreated');
                       //load progress bar
                       this.$Progress.finish()
                   }
                ).catch(
                   (error)=>{
                       this.$Progress.fail()
                   }
               );
            },
            editModal(value){
                this.editMode = true;
                this.form.clear();
                this.form.reset();
                $('#createDepartmentModal').modal('show');
                this.form.fill(value);
            },
            updateDepartment(){
                this.$Progress.start();
                this.form.put('/api/department/' + this.form.id).
                    then( () => {
                    $('#createDepartmentModal').modal('hide');
                    Toast.fire({
                        icon: 'success',
                        title: 'Department Updated successfully'
                    });
                    Fire.$emit('AfterDptUpdated');
                    //load progress bar
                    this.$Progress.finish()
                } ).
                    catch( (error) => {
                        console.log(error);
                    this.$Progress.fail()
                } );
            },
            deleteDepartment(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.form.delete('/api/department/' + id).then(() => {
                            Fire.$emit('AfterDptDeleted');
                            Swal.fire(
                                'Deleted!',
                                'Department has been deleted.',
                                'success'
                            );
                        }).catch(() => {
                            Swal.fire(
                                'Failed!',
                                'Opps something went wrong.',
                                'warning'
                            )
                        });
                    }

                })
            },
        },
        created() {
            this.loadDepartment();
            this.loadEmployees();
            this.loadSingleEmployee();
            Fire.$on('AfterDptCreated', () =>{
                this.loadDepartment();
            });
            Fire.$on('AfterDptDeleted', () =>{
                this.loadDepartment();
            });
            Fire.$on('AfterDptUpdated', () =>{
                this.loadDepartment();
            });
            // this.editModal();
            // this.deleteDepartment();
        },

    }
</script>

<style scoped>

</style>