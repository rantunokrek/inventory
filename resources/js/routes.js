//  authentication
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forgot = require('./components/auth/forgot.vue').default;
let logout = require('./components/auth/logout.vue').default;
//  admin home page
let Home = require('./components/home.vue').default;


export const routes = [
     { path: '/', component: login, name: '/' },
     { path: '/register', component: register, name: '/register' },
     { path: '/forgot', component: forgot, name: 'forgot' },
     { path: '/logout', component: logout, name: 'logout' },
     { path: '/home', component: Home, name: 'home' },
]