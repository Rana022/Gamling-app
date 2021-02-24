<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Login Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" @submit.prevent="login">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" placeholder="Phone Number" v-model="form.phone_number">
                      <small class="text-danger" v-if="errors.phone_number">{{errors.phone_number[0]}}</small>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" v-model="form.password">
                      <small class="text-danger" v-if="errors.password">{{errors.password[0]}}</small>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                  <router-link to="/forget" class="btn float-center">Forgot Password</router-link>
                  <router-link to="/register" class="btn float-right">Register Form</router-link>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Sign in</button>
                  <button class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
             </div>
        </div>
        
    </div>
</template>

<script>
    export default {
       data(){
         return{
           form:{
             phone_number: '',
             password: ''
           },
           errors:{}
         }
       },
       methods:{
         login(){
           axios.post('/api/auth/login', this.form)
           .then(response => {
             User.responseAfterLogin(response)
             Toast.fire({
                  icon: 'success',
                  title: 'Signed in successfully'
              })
             this.$router.push({path: '/'})
             })
           .catch(error => {
             if(error.response.data.errors)
             {
               this.errors = error.response.data.errors
             }else{
               Toast.fire({
                  icon: 'error',
                  title: 'Number or Password Invalid'
              })
             }
           })
         }
       },
       created(){
         if(User.loggedin()){
          this.$router.push('/').catch(()=>{})
         }
       }
    }
</script>
