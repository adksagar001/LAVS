<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <style>
    .nav-icon{
        color:black;
    }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-lightblue navbar-dark" style="position:fixed; width:83.5%; ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu"  role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="homepageadminn.php" class="nav-link">Home</a>
      </li>
    
    </ul>
    <?php 
    session_start();
      if (!isset($_SESSION['admin_username'])) {
        // Redirect the user to the login page
        header('Location: login.php'); 
        exit(); // Ensure that no further code is executed after the redirect
    }
        else if(isset($_SESSION['admin_username'])){
          $username = $_SESSION['admin_username'];
        }
    ?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link" ><strong><img src="../../dist/img/user1.png" ><b><span style="color: white;"><?php echo $username; ?></span></b></strong></a>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4" style="position:fixed; ">
    <!-- Brand Logo -->
    <a href="homepageadminn.php" class="brand-link">
      <img src="lavs.png" alt="Company Logo"  >
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="m-auto">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="homepageadminn.php" class="nav-link">
                  <i class="nav-icon far fa-envelope"></i>
                  <p>
                    <b>Home</b>
                  </p>
                </a>
              </li>
              <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
               <b> Loan</b>
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addloan.php" class="nav-link"><p> 1.</p> 
                <i class="nav-icon far fa-plus-square"></i>
                  <p> <b> Add Loan</b></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="viewloanforadmin.php" class="nav-link">2.
                <i class="nav-icon far fa-image"></i>
                  <p>  <b>View Loan</b></p>
                </a>
              </li>
             
            </ul>
          </li>
              <li class="nav-item">
                <a href="viewusers.php" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                  <p>
                    <b>Viewusers</b>
                    <i class="right fas fa-angle-right"></i>
                  </p>
                </a>
              </li>
                
          <li class="nav-item">
            <a href="viewapplicationadmin.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                <b>Applications</b>
              </p>
            </a>
          </li>
          
        
          <li class="nav-item">
            <a href="adminlogout.php" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                <span class="left badge badge-danger"><b>Logout</b></span>
              </p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

