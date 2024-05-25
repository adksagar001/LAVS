<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <style>
    .nav-icon{
        color:black;
    }
    </style>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-lightblue navbar-light" style="position:fixed; width:83.5%; ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="homepageuser.php" class="nav-link"><b><span style="color: white;">Home</span></b></a>
      </li>
      
    
    </ul>
    <?php 
    session_start();
    set_time_limit(300);
      if (!isset($_SESSION['username'])) {
        // Redirect the user to the login page
        header('Location: login.php'); 
        exit(); // Ensure that no further code is executed after the redirect
    }
        else if(isset($_SESSION['username'])){
          $username = $_SESSION['username'];
        }

        if (connection_status() === CONNECTION_TIMEOUT) {
          echo '<script>';
          echo 'alert("Session Timed Out");';
          echo 'window.location.href = "login.php";';
          echo '</script>';
          exit; 
      }
    ?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
        <a href="profile.php" class="nav-link" ><strong><img src="../../dist/img/user1.png" ><b><span style="color: white;"><?php echo $username; ?></span></b></strong></a>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-white-primary elevation-4" style="position:fixed;">
    <!-- Brand Logo -->
    <a href="homepageuser.php" class="brand-link">
      <img src="lavs.png" alt="Company Logo"  >
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="m-auto">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="homepageuser.php" class="nav-link">
                  <i class="nav-icon far fa-envelope"></i>
                  <p>
                    <b>Home</b>
                  </p>
                </a>
              </li>

              <li class="nav-item">
            <a href="viewloan.php" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                <b>Loans</b>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="viewapplicationuser.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                <b>Application</b>
              </p>
            </a>
          </li>
          
         
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
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

</body>
</html>
