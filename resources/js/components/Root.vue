<template>
   <div class="wrapper">
 <Topbar></Topbar>
  <!-- Navbar -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <Sidebar></Sidebar>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Some thing</h1>
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
        <router-view></router-view>
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
         }
    
}
</script>