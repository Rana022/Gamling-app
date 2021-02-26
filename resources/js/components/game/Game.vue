<template>
    <div class="container">
        <div class="row justify-content-center">
            
      <div class="container-fluid">

               <div class="card">
              <div class="card-header">
                <h3 class="card-title">Matches</h3>
                <div class="text-right">
                <button v-if="authUser.role === 'author'" type="button" @click.prevent="dates" class="btn btn-info btn-small" data-toggle="modal" data-target="#createGame" >Create Match</button>
              </div>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Games</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(game, index) in dateGames" :key="game.id">
                      <td>{{index+1}}</td>
                      <td>{{game.name}}</td>
                      <td>
                          <router-link :to="'/player/' + game.id" class="btn btn-small btn-primary"><i class="fas fa-chess-knight"></i></router-link>
                          <router-link :to="'/user/' + game.id" class="btn btn-small btn-success"><i class="fas fa-users"></i></router-link>
                          <button v-if="authUser.role === 'author'" class="btn btn-small btn-danger" @click.prevent="deleteGame(game.id)"><i class="fas fa-trash-alt"></i></button>
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
        <!-- form modal -->
        <div class="modal fade" id="createGame" tabindex="-1" role="dialog" aria-labelledby="createGameLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createGameLabel">Create Date</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form @submit.prevent="createGame">
      <div class="modal-body">
        <div class="form-group">
                        <label>Select Date</label>
                        <select class="form-control" v-model="form.date">
                          <option value="null">Selection Empty</option>
                          <option v-for="date in gameDates" :key="date.id" :value="date.id">{{date.date | myTime}}</option>
                        </select>
                      <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                      </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Game Name:</label>
            <input type="text"  class="form-control" v-model="form.game"/>
            <small class="text-danger" v-if="errors.game">{{errors.game[0]}}</small>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">About Game:</label>
            <textarea class="textarea form-control" v-model="form.about"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
        </form>
    </div>
  </div>
</div>
    </div>
</template>

<script>
    export default {
      props: ['authUser'],
        data(){
        return{
            dateGames:{},
            gameDates:{},
            form:{
              date: '',
              game: '',
              about:''
            },
            errors:{}

        }
        },
        methods:{
           dates(){
             $('.textarea').summernote()
             axios.get('/api/dates')
                   .then(res => this.gameDates = res.data.data)
           },
            games(id){
                axios.get('/api/date/' + id + '/games')
                     .then(res => this.dateGames = res.data.data)
            },
            createGame(){
              axios.post('/api/game', this.form)
                   .then(res => {
                     if(res){
                       $('#createGame').modal('hide')
                       Toast.fire({
                  icon: 'success',
                  title: 'Game Created:)'
              })
               this.games(this.$route.params.id)
                     }
                   })
                   .catch(error => this.errors = error.response.data.errors)
            },
            deleteGame(id){

                    Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              axios.delete('/api/game/' + id)
          .then(res => {
            if(res.status === 204){
              Toast.fire({
                  icon: 'success',
                  title: 'Game Successfully Removed :)'
              })
            }
          })
          this.games(this.$route.params.id)
            }
          })
        }
        },
        created(){
            let id = this.$route.params.id
            this.games(id)
        }

    }
</script>
