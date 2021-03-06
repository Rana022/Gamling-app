<template>

    <div class="container">

        <div class="row justify-content-center">
            
      <div class="container-fluid">
        <!-- Info boxes -->
        <Boxinfo></Boxinfo>
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Dates of match({{dates.length}})</h3>
                <div class="text-right" v-if="authUser.role === 'Author'">
                <button type="button" class="btn btn-success btn-small" data-toggle="modal" data-target="#createDate" ><i class="fas fa-calendar-alt"></i></button>
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Dates</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(date, index) in dates" :key="date.id">
                      <td>{{index+1}}</td>
                      <td>{{date.date | myTime}}</td>
                      <td><router-link :to="'/game/' + date.id" class="btn btn-small btn-primary"><i class="fab fa-google-play"></i></router-link>
                      <button v-if="authUser.role === 'Author'" type="button" @click.prevent="deleteDate(date.id)" class="btn btn-small btn-danger"><i class="fas fa-trash-alt"></i></button>
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
        <div class="modal fade" id="createDate" tabindex="-1" role="dialog" aria-labelledby="createDateLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createDateLabel">Create Date</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form @submit.prevent="createDate">
      <div class="modal-body">
          <div class="form-group">
            <label for="message-text" class="col-form-label">Pick Date:</label>
            <input type="date" class="form-control" v-model="form.date"/>
            <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
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
import Boxinfo from './game/Boxinfo.vue'
    export default {
      props: ['authUser'],
      components:{Boxinfo},
      data(){
        return{
          dates:{
          },
          form:{
            date: ''
          },
          errors:{}
          
        }

      },
      methods:{
        loadDates(){
          axios.get('/api/dates')
               .then(res => this.dates = res.data.data)
        },
        createDate(){
          axios.post('/api/dates', this.form)
               .then(res => {
                 if(res){
                  $('#createDate').modal('hide')
                  this.loadDates()
                  Toast.fire({
                  icon: 'success',
                  title: 'Date Successfully Created'
              })
                 }
               })
               .catch(error => this.errors = error.response.data.errors)
              
        },
        deleteDate(id){

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
              axios.delete('/api/dates/' + id)
          .then(res => {
            if(res.status === 204){
              Toast.fire({
                  icon: 'success',
                  title: 'Successfully Removed'
              })
            }
          })
          this.loadDates()
            }
          })
        }
      },
      created(){
        this.loadDates()
        if(!User.loggedin()){
          this.$router.push('/').catch(()=>{})
        }
      }
       
    }
</script>
