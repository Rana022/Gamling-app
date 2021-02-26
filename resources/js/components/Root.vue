<template>
   <div class="wrapper">
 <Topbar></Topbar>
  <!-- Navbar -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <Sidebar v-bind:authUser="authUser"></Sidebar>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{authUser.name}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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