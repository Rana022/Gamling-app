<template>
   <div class="wrapper">
 <Topbar></Topbar>
  <!-- Navbar -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <Sidebar v-bind:authUser="authUser"></Sidebar>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-3">
    <!-- Main content -->
    <div class="content">
        <router-view v-bind:authUser="authUser"></router-view>
    </div>
    <!-- /.content -->
 
</div>
  <!-- /.content-wrapper -->
</div>
</template>
<script>
import Topbar from './Topbar.vue'
import Sidebar from './Sidebar.vue'
export default {
  components:{
        Topbar,
        Sidebar
         },
  data(){
    return{
      authuser_id: User.id(),
      authUser:{}

    }
  },
  methods:{
    user(){
      axios.get('/api/users/' + this.authuser_id)
           .then(res => this.authUser = res.data.data)
    }
  },
  mounted(){
    if(User.id()){
      this.user()
    }
  }

}
</script>