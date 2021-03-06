<template>
    <div class="container">
        <div class="row justify-content-center">
            
      <div class="container-fluid">

        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Players({{gamePlayers.length}})</h3>
                <div class="text-right">
                  <button v-if="authUser.role === 'User'" type="button" class="btn btn-success btn-small" data-toggle="modal" data-target="#addPlayer"><i class="fas fa-user-plus"></i> 11</button>
                <button v-if="authUser.role === 'Author'" type="button" class="btn btn-success btn-small" data-toggle="modal" data-target="#createPlayer" @click="allGames"><i class="fas fa-user-plus"></i></button>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="data-con py-1 px-5 d-md-none" v-for="(player, index) in gamePlayers" :key="player.id">
                  <strong>{{index+1}}.</strong>
                  <i class="fas fa-arrows-alt-h"></i>
                  <span>{{player.name}}</span>
                  <i class="fas fa-arrows-alt-h"></i>
                  <strong>{{player.country}}</strong>
                  <i class="fas fa-arrows-alt-h"></i>
                  <router-link :to="'/playerdetails/' + player.id" class="btn btn-small btn-primary"><i class="fas fa-id-card"></i></router-link>
                          <button v-if="authUser.role === 'Author'" class="btn btn-small btn-danger" @click.prevent="removePlayer(player.id)"><i class="fas fa-trash-alt"></i></button>
                          <button data-toggle="modal" data-target="#playerScore" v-if="authUser.role === 'Author'" class="btn btn-small btn-warning"><i class="fas fa-microscope"></i></button>
                </div>
                
                <table class="table d-none d-md-block">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Country</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(player, index) in gamePlayers" :key="player.id">
                      <td>{{index+1}}</td>
                      <td>{{player.name}}</td>
                      <td>{{player.country}}</td>
                      <td>
                          <router-link :to="'/playerdetails/' + player.id" class="btn btn-small btn-primary"><i class="fas fa-id-card"></i></router-link>
                          <button v-if="authUser.role === 'Author'" class="btn btn-small btn-danger" @click.prevent="removePlayer(player.id)"><i class="fas fa-trash-alt"></i></button>
                          <button @click="playerid = player.id" data-toggle="modal" data-target="#playerScore" v-if="authUser.role === 'Author'" class="btn btn-small btn-warning"><i class="fas fa-microscope"></i></button>
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
        <!-- createPlayer form modal -->
        <div class="modal fade" id="createPlayer" tabindex="-1" role="dialog" aria-labelledby="createPlayerLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPlayerLabel">Create Date</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form @submit.prevent="createPlayer">
      <div class="modal-body">
        <div class="form-group">
                        <label>Select Game</label>
                        <select class="form-control" v-model="form.game">
                          <option value="null">Selection Empty</option>
                          <option v-for="game in games" :key="game.id" :value="game.id">{{game.name}}</option>
                        </select>
                      <small class="text-danger" v-if="errors.game">{{errors.game[0]}}</small>
                      </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Player Name:</label>
            <input type="text"  class="form-control" v-model="form.player_name"/>
            <small class="text-danger" v-if="errors.player_name">{{errors.player_name[0]}}</small>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Country:</label>
            <input type="text"  class="form-control" v-model="form.player_country"/>
            <small class="text-danger" v-if="errors.player_country">{{errors.player_country[0]}}</small>
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Player Spatiality:</label>
            <select class="form-control" v-model="form.player_spatiality">
                          <option value="All rounder">All rounder</option>
                          <option value="Batsman">Batsman</option>
                          <option value="Bowler">Bowler</option>
                        </select>
            <small class="text-danger" v-if="errors.player_spatiality">{{errors.player_spatiality[0]}}</small>
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
        <!-- addPlayer form modal -->
<div class="modal fade" id="addPlayer" tabindex="-1" role="dialog" aria-labelledby="addPlayerLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addPlayerLabel">Choose your 11</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form @submit.prevent="eleven">
      <div class="modal-body">
        <div class="form-group">
                        <div class="form-check" v-for="player in gamePlayers" :key="player.id">
                          <input class="form-check-input" type="checkbox" :value="player.id" v-model="eForm.user_player" checked="checked">
                          <label class="form-check-label">{{player.name}}</label>
                        </div>
                          <small class="text-danger" v-if="eFormErrors.user_player">{{eFormErrors.user_player[0]}}</small>
                      </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
        </form>
    </div>
  </div>
</div>

<!-- player score modal -->
<div class="modal fade" id="playerScore" tabindex="-1" role="dialog" aria-labelledby="playerScoreLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="playerScoreLabel">Player Score</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form @submit.prevent="playerScore(playerid)">
      <div class="modal-body">
        <div class="form-group">
            <label for="message-text" class="col-form-label">Player Run</label>
            <input type="text"  class="form-control" v-model="score.run"/>
            <small class="text-danger" v-if="scoreErrors.run">{{scoreErrors.run[0]}}</small>
          </div>

                      <div class="form-group">
                        <label>Player Wicket</label>
                        <select class="form-control" v-model="score.wicket">
                          <option value="0">Zero</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                        </select>
                      <small class="text-danger" v-if="scoreErrors.wicket">{{scoreErrors.wicket[0]}}</small>
                      </div>

                      <div class="form-group">
                        <label>Player Catch</label>
                        <select class="form-control" v-model="score.catch">
                          <option value="0">Zero</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                        </select>
                      <small class="text-danger" v-if="scoreErrors.catch">{{scoreErrors.catch[0]}}</small>
                      </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
        </form>
    </div>
  </div>
</div>

    </div>
</template>

<script>
    export default {
      props:['authUser'],
        data(){
        return{
            gamePlayers:{},
            games:{},
            form:{
              game: '',
              player_name: '',
              player_country: '',
              player_spatiality: ''
            },
            score:{
              run: '',
              wicket: '',
              catch: ''
            },
            eForm:{
              game : this.$route.params.id,
              user: User.id(),
              user_player: []
            },
            game_id : this.$route.params.id,
            errors:{},
            eFormErrors:{},
            scoreErrors:{}

        }
        },
        methods:{
            allGames(){
              axios.get('/api/allgames')
                   .then(res => this.games = res.data.data)
            },
            createPlayer(){
              axios.post('/api/players', this.form)
                   .then(res => {
                     if(res){
                       $('#createPlayer').modal('hide')
                       Toast.fire({
                  icon: 'success',
                  title: 'Player Added:)'
              })
               this.players(this.$route.params.id)
                     }
                   })
                   .catch(error => this.errors = error.response.data.errors)
            },
            players(id){
                axios.get('/api/game/' + id + '/players')
                     .then(res => this.gamePlayers = res.data.data)
            },
            eleven(){
              axios.post('/api/user/eleven', this.eForm)
                   .then(res => {
                     if(res){
                       $('#addPlayer').modal('hide')
                       Toast.fire({
                  icon: 'success',
                  title: 'Your Super Eleven Created:)'
              })
               this.players(this.$route.params.id)
                     }
                   })
                   .catch(error => this.eFormErrors = error.response.data.errors)
            },
            playerScore(id){
                 axios.post('/api/player/' + id + '/score', this.score)
                       .then(res => {
                         if(res.status === 201){
                           $('#playerScore').modal('hide')
                            Toast.fire({
                            icon: 'success',
                            title: 'Score Added:)'
              })
                         }
                       })
                       .catch(error => this.scoreErrors = error.response.data.errors)
                      
            },

            removePlayer(id){
             
             Swal.fire({
            title: 'Are you sure?',
            text: "It will remove the player!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, remove it!'
          }).then((result) => {
            if (result.isConfirmed) {
              axios.post('/api/player/' + id, this.game_id)
          .then(res => {
            if(res)
            {
              Toast.fire({
                  icon: 'success',
                  title: 'Player Removed:)'
              })
            }
          })
          this.players(this.$route.params.id)
            }
          })
            

        }
        },
        created(){
            let id = this.$route.params.id
            this.players(id)
        }

    }
</script>
