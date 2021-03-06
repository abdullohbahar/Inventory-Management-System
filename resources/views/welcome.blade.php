<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  {{-- Style --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div id="app">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" id="v-nav" v-show="$route.path === '/' || $route.path === '/register' || $route.path === '/forgot-password' ? false : true " style="display: none">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            Username
            <i class="fas fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> Profile
            </a>
            <div class="dropdown-divider"></div>
            <router-link to="/logout" class="dropdown-item btn btn-danger">
              Logout
            </router-link>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" id="v-sidebar" v-show="$route.path === '/' || $route.path === '/register' || $route.path === '/forgot-password' ? false : true " style="display: none">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link text-center">
        <span class="brand-text font-weight-bold text-center">INVENTORY</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
              <router-link to="/" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/pos" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  POS
                </p>
              </router-link>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-user-plus"></i>
                <p>
                  Employee
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/employee" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Employee</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/store-employee" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Employee</p>
                  </router-link>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-user-plus"></i>
                <p>
                  Supplier
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/supplier" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Supplier</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/store-supplier" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Supplier</p>
                  </router-link>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-user-plus"></i>
                <p>
                  Category
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/category" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Category</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/store-category" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Category</p>
                  </router-link>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-user-plus"></i>
                <p>
                  Products
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/product" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Product</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/store-product" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Product</p>
                  </router-link>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-user-plus"></i>
                <p>
                  Expenses
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/expense" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All expense</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/store-expense" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add expense</p>
                  </router-link>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-user-plus"></i>
                <p>
                  Sallary
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/sallary" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All sallary</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/given-sallary" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add sallary</p>
                  </router-link>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-user-plus"></i>
                <p>
                  Orders
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/order" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Today Order</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/searchorder" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Search Order</p>
                  </router-link>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-user-plus"></i>
                <p>
                  Customer
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/customer" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Customer</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/store-customer" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Customer</p>
                  </router-link>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <router-link to="/stock" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Stock
                </p>
              </router-link>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-user-plus"></i>
                <p>
                  Reports
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/customer" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Report One</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/store-customer" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Report Two</p>
                  </router-link>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <router-view></router-view>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer" id="v-footer" v-show="$route.path === '/' || $route.path === '/register' || $route.path === '/forgot-password' ? false : true " style="display: none">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
      </div>
    </footer>
  </div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
  let token = localStorage.getItem('token');
  if(token){
    $("#v-nav").css("display","");
    $("#v-sidebar").css("display","");
    $("#v-footer").css("display","");
  }

</script>


<!-- OPTIONAL SCRIPTS -->

</body>
</html>
