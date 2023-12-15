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
// category
let expenseInsert = require('./components/expense/create.vue').default;
let expenseIndex = require('./components/expense/index.vue').default;
let expenseEdit = require('./components/expense/edit.vue').default;
//salary
let all_employee = require('./components/salary/all_employee.vue').default;
let paysalary = require('./components/salary/create.vue').default;
let salaryIndex = require('./components/salary/index.vue').default;
let salaryView = require('./components/salary/view.vue').default;
let salaryEdit = require('./components/salary/edit.vue').default;
//stock
let Stock = require('./components/product/stock.vue').default;
let StockEdit = require('./components/product/stock-edit.vue').default;



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
     // expense
     { path: '/expense-store', component: expenseInsert, name: '/expense-store' },
     { path: '/expense', component: expenseIndex, name: 'expense' },
     { path: '/expense-edit/:id', component: expenseEdit, name: 'expense-edit' },
     // salary
     { path: '/salary-store', component: all_employee, name: 'salary-store' },
     { path: '/salary-pay/:id', component: paysalary, name: 'salary-pay' },
     { path: '/salary', component: salaryIndex, name: 'salary' },
     { path: '/salary-view/:id', component: salaryView, name: 'salary-view' },
     { path: '/salary-edit/:id', component: salaryEdit, name: 'salary-edit' },
     // stock
     { path: '/stock', component: Stock, name: 'stock' },
     { path: '/sotck-edit/:id', component: StockEdit, name: 'sotck-edit' },



]