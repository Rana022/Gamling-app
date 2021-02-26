<template>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="#" alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{authUser.name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item">
            <router-link to="/" class="nav-link">
              <i class="fas fa-laptop-house"></i>
              <p>
                Home
              </p>
            </router-link>
          </li>
          <li class="nav-item" v-if="authUser.id == null">
            <router-link to="/login" class="nav-link">
              <i class="fas fa-sign-in-alt"></i>
              <p>
                Login
              </p>
            </router-link>
          </li>
          <li class="nav-item" v-if="authUser.id != null">
            <router-link to="/logout" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </router-link>
          </li>
          <!-- Author Section -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Author Section
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              
              <li class="nav-item">
                <router-link to="/creatematch" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Match</p>
                </router-link>
              </li>
    
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
export default {
  props: ['authUser']
}
</script>