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
// supplier
let storeSupplier = require('./components/supplier/create.vue').default;
let SupplierIndex = require('./components/supplier/index.vue').default;
let SupplierEdit = require('./components/supplier/edit.vue').default;
// category
let categoryrInsert = require('./components/category/create.vue').default;
let categoryIndex = require('./components/category/index.vue').default;
let categoryEdit = require('./components/category/edit.vue').default;

// category
let productInsert = require('./components/product/create.vue').default;
let productIndex = require('./components/product/index.vue').default;
let productEdit = require('./components/product/edit.vue').default;



export const routes = [
     { path: '/', component: login, name: '/' },
     { path: '/home', component: Home, name: 'home' },
     { path: '/register', component: register, name: '/register' },
     { path: '/logout', component: logout, name: 'logout' },
     { path: '/forgot', component: forgot, name: 'forgot' },
     //employee
     { path: '/employee-store', component: storeEmployee, name: '/employee-store' },
     { path: '/employee', component: EmployeeIndex, name: 'employee' },
     { path: '/employee-edit/:id', component: EmployeeEdit, name: 'employee-edit' },
     //supplier
     { path: '/supplier-store', component: storeSupplier, name: '/supplier-store' },
     { path: '/supplier', component: SupplierIndex, name: 'supplier' },
     { path: '/supplier-edit/:id', component: SupplierEdit, name: 'supplier-edit' },
     //category
     { path: '/category-store', component: categoryrInsert, name: '/category-store' },
     { path: '/category', component: categoryIndex, name: 'category' },
     { path: '/category-edit/:id', component: categoryEdit, name: 'category-edit' },
     // product
     { path: '/product-store', component: productInsert, name: '/product-store' },
     { path: '/product', component: productIndex, name: 'product' },
     { path: '/product-edit/:id', component: productEdit, name: 'product-edit' },



]