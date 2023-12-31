<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dashboard - SB Admin</title>

        {{-- style --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('backend/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>


    </head>
    </head>
    <body>
        <div id="app">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" id="topbar" style="display: none"
         v-show="$route.path === '/' || $route.path === '/register' || $route.path === '/forgot'
        ? false : true" >
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>  <router-link  class="dropdown-item" to="/logout">Logout </router-link></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav" >
            <div id="layoutSidenav_nav" id="leftbar" style="display:none;"  v-show="$route.path === '/' 
            || $route.path === '/register' 
            || $route.path === '/forgot'
            ? false : true" >
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" >
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <router-link  class="nav-link" to="/">Dashboard </router-link>
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Employee
                               
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <router-link  class="nav-link" to="/employee-store">Add Employee </router-link>
                                    <router-link  class="nav-link" to="/employee">Employee List </router-link>
                                  
                                </nav>
                            </div>
                            {{-- //supplier --}}
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#spplier" aria-expanded="false" aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Supplier
                               
                            </a>
                            <div class="collapse" id="spplier" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <router-link  class="nav-link" to="/supplier-store">Add Supplier </router-link>
                                    <router-link  class="nav-link" to="/supplier">Supplier List </router-link>
                                  
                                </nav>
                            </div>
                              {{-- //category --}}
                           
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#category" aria-expanded="false" aria-controls="pagesCollapseError">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Category
                                   
                                </a>
                        
                            <div class="collapse" id="category" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <router-link  class="nav-link" to="/category-store">Add Category </router-link>
                                    <router-link  class="nav-link" to="/category">Category List </router-link>
                                  
                                </nav>
                            </div>

                              {{-- //Product --}}
                             
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Product" aria-expanded="false" aria-controls="pagesCollapseError">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Product
                                   
                                </a>
                            
                            <div class="collapse" id="Product" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <router-link  class="nav-link" to="/product-store">Add Product </router-link>
                                    <router-link  class="nav-link" to="/product">Product List </router-link>
                                  
                                </nav>
                            </div>

                             {{-- //Expense --}}
                             
                             <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#expense" aria-expanded="false" aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Expense
                               
                            </a>
                        
                        <div class="collapse" id="expense" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <router-link  class="nav-link" to="/expense-store">Add Product </router-link>
                                <router-link  class="nav-link" to="/expense">Product List </router-link>
                              
                            </nav>
                        </div>

                             {{-- //Salary --}}
                             
                             <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#salary" aria-expanded="false" aria-controls="pagesCollapseError">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Salary
                               
                            </a>
                        
                        <div class="collapse" id="salary" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <router-link  class="nav-link" to="/salary-store">Employee List </router-link>
                                <router-link  class="nav-link" to="/salary">Salary Read </router-link>
                               
                              
                            </nav>
                        </div>
                         {{-- //Stock --}}
                             
                         <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#stock" aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Stock file
                           
                        </a>
                    
                    <div class="collapse" id="stock" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <router-link  class="nav-link" to="/stock">Stock view </router-link> 
                        </nav>
                    </div>
                    {{-- // Customer --}}
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#ddhdhdh" aria-expanded="false" aria-controls="pagesCollapseError">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Customer
                       
                    </a>
                    <div class="collapse" id="ddhdhdh" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <router-link  class="nav-link" to="/customer-store">Add Customer </router-link>
                            <router-link  class="nav-link" to="/customer">Customer Index </router-link>
                          
                        </nav>
                    </div>
                     {{-- // Pos --}}
                     <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pos" aria-expanded="false" aria-controls="pagesCollapseError">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Pos
                       
                    </a>
                    <div class="collapse" id="pos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <router-link  class="nav-link" to="/possale">Sale </router-link>
                            <router-link  class="nav-link" to="/customer">Customer Index </router-link>
                          
                        </nav>
                    </div>

                        {{-- order --}}
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#order" aria-expanded="false" aria-controls="pagesCollapseError">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                       Order
                       
                    </a>
                    <div class="collapse" id="order" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <router-link  class="nav-link"  to="/order"> Order View </router-link>
                            <router-link  class="nav-link" to="/search-order">Search Order </router-link>
                          
                        </nav>
                    </div>


                            <a class="nav-link" >
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <router-link  to="/register"> Register  </router-link>
                            </a>
                      
                            



                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                  
                         {{-- Router vue ekhane page load hobe --}}
                         <router-view></router-view>
                         
                    </div>
                    {{-- container-fluid --}}
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
     </div>
     <script>
        let token = localStorage.getItem('token');
        if (token) {
            $('#topbar').css("display", "");
            $('#leftbar').css("display", "");
            
        }
     </script>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/datatables-simple-demo.js')}}"></script>



    </body>
</html>
