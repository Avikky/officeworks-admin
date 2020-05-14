/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
import dayjs from 'dayjs' // ES 2015
window.dayjs = dayjs;
dayjs().format();
window.customParseFormat = require('dayjs/plugin/customParseFormat');
dayjs.extend(customParseFormat);

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

import Swal from 'sweetalert2';
window.Swal = Swal;

import VueProgressBar from 'vue-progressbar';
Vue.use(VueProgressBar, options);

const options = {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '10px',
    transition: {
        speed: '0.4s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'left',
    inverse: false
}

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

window.Toast = Toast;


window.Fire = new Vue();

import CKEditor from '@ckeditor/ckeditor5-vue';
Vue.use( CKEditor );

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import routes from './routes';

const router = new VueRouter({
    mode: 'history',
    routes, // short for `routes: routes`

});

Vue.filter('truncate', function(input) {
    if (input.length > 10)
        return input.substring(0,15) + '...';
    else
        return input;
});

Vue.filter('stripTag', function strip(html){
    let doc = new DOMParser().parseFromString(html, 'text/html');
    return doc.body.textContent || "";
});

Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1)
});
Vue.filter('formatDigits', function(value){
    console.log(value);
    return value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
});

Vue.filter('formatDate', function(value){
    //let firstWord = value.split(" ")[0];
    return dayjs(value).format('DD MMM YYYY');
});







/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
});
