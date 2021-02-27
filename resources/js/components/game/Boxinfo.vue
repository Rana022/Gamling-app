<template>
    <div class="row">
          <div class="col-12 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Active Schedules</span>
                <span class="info-box-number">
                  {{schedule}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dice"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Active Games</span>
                <span class="info-box-number">{{games}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Participants</span>
                <span class="info-box-number">{{participants}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
</template>
<script>
export default {
  data(){
    return{
      schedule: '',
      games: '',
      participants:''
    }
  },
  methods:{
    date(){
      axios.get('/api/dates').then(res => this.schedule = res.data.data.length)
    },
    game(){
      axios.get('/api/allgames').then(res => this.games = res.data.data.length)
    },
    participant(){
      axios.get('/api/users').then(res => this.participants = res.data.data.length)
    }
  },
  created(){
    this.date()
    this.game()
    this.participant()
  }
    
}
</script>