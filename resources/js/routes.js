let Login = require('./components/auth/Login.vue').default
let Register = require('./components/auth/Register.vue').default
let Forget = require('./components/auth/Forget.vue').default
let Logout = require('./components/auth/Logout.vue').default
let Home = require('./components/Home.vue').default
let Game = require('./components/game/Game.vue').default
let Player = require('./components/game/Player.vue').default
let User = require('./components/game/Participant.vue').default
let Eleven = require('./components/game/Eleven.vue').default
let Playerdetails = require('./components/game/Playerdetails.vue').default
let Creatematch = require('./components/author/Creatematch.vue').default
let a = require('./components/ExampleComponent.vue').default

export const routes = [
  { path: '/', component: Home },
    { path: '/creatematch', component: Creatematch },
    { path: '/login', component: Login },
    { path: '/register', component: Register },
    { path: '/forget', component: Forget },
    { path: '/logout', component: Logout },
    { path: '/a', component: a },
    { path: '/game/:id', component: Game },
    { path: '/player/:id', component: Player },
    { path: '/playerdetails/:id', component: Playerdetails },
    { path: '/user/:id', component: User },
    { path: '/eleven/:id', component: Eleven }
  ]