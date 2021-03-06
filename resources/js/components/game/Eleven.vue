<template>
    <div class="container">
        <div class="row justify-content-center">
            
      <div class="container-fluid">

        <div class="card">
              <div class="card-header">
                <h3 class="card-title">My Eleven({{myEleven.length}})</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">

                <div class="data-con py-1 px-5 d-md-none" v-for="(player, index) in myEleven" :key="player.id">
                  <strong>{{index+1}}.</strong>
                  <i class="fas fa-arrows-alt-h"></i>
                  <span>{{player.name}}</span>
                  <i class="fas fa-arrows-alt-h"></i>
                  <strong>{{player.country}}</strong>
                  <i class="fas fa-arrows-alt-h"></i>
                  <router-link :to="''" class="btn btn-small btn-primary">Details</router-link>
                </div>

                <table class="table table-condensed d-none d-md-block">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Country</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(player, index) in myEleven" :key="player.id">
                      <td>{{index+1}}</td>
                      <td>{{player.name}}</td>
                      <td>{{player.country}}</td>
                      <td>
                          <router-link :to="''" class="btn btn-small btn-primary">Details</router-link>
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
            myEleven:{}

        }
        },
        methods:{
            eleven(id){
                axios.get('/api/user/' + id + '/players')
                     .then(res => this.myEleven = res.data.data)
            }
        },
        created(){
            let id = this.$route.params.id
            this.eleven(id)
        }

    }
</script>