<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Our Gamling World</title>

  <!-- style -->
  <link rel="stylesheet" href="css/app.css">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">

    <div id="app">
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
            <h1 class="m-0 text-dark">Starter Page</h1>
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

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- script -->
<script src="js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
</body>
</html>
