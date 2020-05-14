<style scoped>

    input[type="file"] {
        display: none;
    }
    .custom-file-upload {
        margin: 1rem auto !important;
        justify-items: center;
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }
</style>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Profile Details</div>
                    <div class="card-body">
                        <div class="">
                            <img src="/img/user-img.png" class="img-thumbnail" alt="profile picture">
                            <div class="change-pic-btn offset-md-3">
                                <input id="file-upload" type="file"/>
                                <label for="file-upload" class="custom-file-upload">
                                    Change <i class="fas fa-camera"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Edit Profile</div>
                    <div class="card-body">
                        <form @submit.prevent="updateProfile" action="">
                            <div class="form-group row">
                            <div class="col-md-6">
                                <label for="firstname">Firstname:</label>
                                <input type="text"  v-model.trim="form.firstname" class="form-control"  id="firstname" :class="{ 'is-invalid': form.errors.has('firstname') }">
                                <has-error :form="form" field="firstname"></has-error>
                            </div>
                            <div class="col-md-6">
                                <label for="lastname">Lastname:</label>
                                <input type="text"  v-model.trim="form.lastname" class="form-control"  id="lastname" :class="{ 'is-invalid': form.errors.has('lastname') }">
                                <has-error :form="form" field="lastname"></has-error>
                            </div>
                        </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="password">Password:</label>
                                    <input :type="type" v-model.trim="form.password" disabled class="form-control">

                                    <div class="form-group new-password mt-3 hide">
                                        <label for="password">New Password:</label>
                                        <input type="text"  v-model.trim="form.new_pass" class="form-control"  id="password" :class="{ 'is-invalid': form.errors.has('password') }">
                                        <has-error :form="form" field="password"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6 row" style="margin-top: 2.3rem !important;">
                                    <p class="col-md-2"><button class="btn btn-sm bg-primary" @click="viewPassword"><i class="fas fa-eye"></i></button></p>
                                    <p class="col-md-2"><button class="btn btn-sm bg-default" @click="displayChangePwd">Change</button></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="country">Country:</label>
                                    <input type="text"  v-model.trim="form.country" class="form-control"  id="country" :class="{ 'is-invalid': form.errors.has('country') }">
                                    <has-error :form="form" field="country"></has-error>
                                </div>
                                <div class="col-md-6">
                                    <label for="state">State:</label>
                                    <input type="text"  v-model.trim="form.state" class="form-control"  id="state" :class="{ 'is-invalid': form.errors.has('state') }">
                                    <has-error :form="form" field="state"></has-error>
                                </div>
                            </div>
                            <h3 class="p-3 my-3 text-center" style="text-decoration: underline;">Social Handles</h3>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="facebook">Facebook:</label>
                                    <input type="text"  v-model.trim="form.facebook" class="form-control"  id="facebook" :class="{ 'is-invalid': form.errors.has('facebook') }">
                                    <has-error :form="form" field="facebook"></has-error>
                                </div>
                                <div class="col-md-6">
                                    <label for="instagram">Instagram:</label>
                                    <input type="text"  v-model.trim="form.instagram" class="form-control"  id="instagram" :class="{ 'is-invalid': form.errors.has('instagram') }">
                                    <has-error :form="form" field="instagram"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="twitter">Twitter:</label>
                                    <input type="text"  v-model.trim="form.twitter" class="form-control"  id="twitter" :class="{ 'is-invalid': form.errors.has('twitter') }">
                                    <has-error :form="form" field="twitter"></has-error>
                                </div>
                                <div class="col-md-6">
                                    <label for="github">GitHub:</label>
                                    <input type="text"  v-model.trim="form.github" class="form-control"  id="github" :class="{ 'is-invalid': form.errors.has('github') }">
                                    <has-error :form="form" field="github"></has-error>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comment">Bio:</label>
                                <textarea class="form-control" v-model="form.bio" rows="5" id="comment"></textarea>
                            </div>
                            <button :disabled="form.busy" class="offset-md-5 btn btn-lg bg-primary px-5 push-center" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                // Create a new form instance
                form: new Form({
                    firstname: '',
                    lastname: '',
                    password: 'pass123',
                    new_pass: '',
                    email: '',
                    country: '',
                    state: '',
                    bio: '',
                    instagram: '',
                    facebook: '',
                    twitter: '',
                    github: ''
                }),
                type: 'password'
            }
        },
        methods: {
            viewPassword () {
                if(this.type == 'password') {
                    this.type = 'text';
                }else {
                    this.type = 'password';
                }
            },
            displayChangePwd(){
                let el = document.querySelector('.new-password');
                if(el.classList.contains('hide')) {
                    el.classList.remove('hide');
                }else {
                    el.classList.add('hide');
                }
            }

        },
        mounted() {
            let file = document.querySelector('#file-upload');
            console.log(file);
            console.log("Component mounted.");
        },
    };
</script>
