<template>
    <div class="container">
        <div class="row justify-content-center">
            
      <div class="container-fluid">

        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Participants({{gameUsers.length}})</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="data-con py-1 px-5 d-md-none" v-for="(user, index) in gameUsers" :key="user.id">
                  <strong>{{index+1}}.</strong>
                  <i class="fas fa-arrows-alt-h"></i>
                  <span>{{user.name}}</span>
                  <i class="fas fa-arrows-alt-h"></i>
                  <strong>{{user.phone_number}}</strong>
                  <i class="fas fa-arrows-alt-h"></i>
                  <router-link :to="'/eleven/' + user.id" class="btn btn-small btn-success">his/her 11</router-link>
                </div>

                <table class="table table-condensed d-none d-md-block">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(user, index) in gameUsers" :key="user.id">
                      <td>{{index+1}}</td>
                      <td>{{user.name}}</td>
                      <td>{{user.phone_number}}</td>
                      <td>{{user.email}}</td>
                      <td>
                          <router-link :to="'/eleven/' + user.id" class="btn btn-small btn-success">his/her 11</router-link>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        
        <!-- /.row -->
      </div><!--/. container-fluid -->
    
        </div>
    </div>
</template>

<script>
    export default {
        data(){
        return{
            gameUsers:{}

        }
        },
        methods:{
            users(id){
                axios.get('/api/game/' + id + '/users')
                     .then(res => this.gameUsers = res.data.data)
            }
        },
        created(){
            let id = this.$route.params.id
            this.users(id)
        }

    }
</script>
