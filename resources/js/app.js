
require('./bootstrap');

import Vue from 'vue';
import moment from 'moment';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
//user
import User from './Helpers/User';
window.User = User
//routes
import {routes} from './routes.js';
//sweet-alert
import Swal from 'sweetalert2';
window.Swal = Swal
//filters capitalize
Vue.filter('capitalize', function(value){
  return value.charAt(0).toUpperCase() + value.slice(1)
});
//filters date
Vue.filter('myTime', function(time){
  return moment(time).format('MMMM Do YYYY, h:mm:ss a');
});
//toast alert
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast = Toast

import Root from './components/Root.vue'
//router
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })




const app = new Vue({
    el: '#app',
    data:{
       authUser:{
         name:'rana',
         role:''
       }
    },
    methods:{

    },
    components:{Root},
    router
});
