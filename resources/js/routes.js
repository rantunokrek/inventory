//  authentication
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forgot = require('./components/auth/forgot.vue').default;
let logout = require('./components/auth/logout.vue').default;

//  admin home page
let Home = require('./components/home.vue').default;
// employee
let storeEmployee = require('./components/employee/create.vue').default;
let EmployeeIndex = require('./components/employee/index.vue').default;
let EmployeeEdit = require('./components/employee/edit.vue').default;

export const routes = [
     { path: '/', component: login, name: '/' },
     { path: '/home', component: Home, name: 'home' },
     { path: '/register', component: register, name: '/register' },
     { path: '/logout', component: logout, name: 'logout' },
     { path: '/forgot', component: forgot, name: 'forgot' },
     { path: '/employee-store', component: storeEmployee, name: '/employee-store' },
     { path: '/employee', component: EmployeeIndex, name: 'employee' },
     { path: '/employee-edit/:id', component: EmployeeEdit, name: 'employee-edit' },



]