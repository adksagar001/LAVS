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
    .circle-image {
    border-radius: 10%;
    object-fit: cover; /* This ensures the image covers the entire circle */
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
}

    </style>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link href="../../dist/css/styles.css" rel="stylesheet" />

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-lightblue navbar-light" style="position:fixed; width:83.5%; ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" ><i class="fas fa-bars"></i></a>
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
        header('Location: index.html'); 
        exit(); // Ensure that no further code is executed after the redirect
    }
        else if(isset($_SESSION['username'])){
          $username = $_SESSION['username'];
        }

        if (connection_status() === CONNECTION_TIMEOUT) {
          echo '<script>';
          echo 'alert("Session Timed Out");';
          echo 'window.location.href = "index.html";';
          echo '</script>';
          exit; 
      }
    ?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"> <a class="nav-link" href="#aboutus"><b><span style="color: white;">About Us</span></b></a> </li>
      <li class="nav-item"> <a class="nav-link" href="#loans"><b><span style="color: white;">Loans</span></b></a> </li>
      <li class="nav-item"> <a class="nav-link" href="#feedback"><b><span style="color: white;">Feedback</span></b></a> </li>


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
  <aside class="main-sidebar sidebar-white-primary elevation-4" style="position:fixed; ">
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
<br>
			<div class="content-wrapper"id="loans">
      <section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12"><br>
							<div class="card" >



      </div>
      <div class="card card-success" >
              <div class="card-header">
                <h3 class="card-title">Available Loan Schemes :</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="chart-responsive">
                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-5">
                    <ul class="chart-legend clearfix">
                    <?php
                        include "dbconn.php"; // Include your database connection

                      // Fetch loan names from the database
                      $sql = "SELECT loan_name FROM addloan1";
                      $result = mysqli_query($conn, $sql);

                      $loanNames = array(); // Initialize an empty array to store loan names
                       $i=0;
                         while ($row = mysqli_fetch_assoc($result)) {
                          $loanNames[] = $row['loan_name'];
  
                          ?>
                          <li><h1><?php echo $i+1;  ?>.</i> 
                         <?php echo $loanNames[$i] ; 
                          $i++;
                          ?>
                        </h1></li>
                        <?php
                        }
                        ?>
                      
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
          <!-- ./col -->
        </div>

      <section class="page-section" id="aboutus">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">About</h2>
                    <h3 class="section-heading text-muted"><b>"Surakshya Paluwa Multipurpose Co-operative"</b></h3><br><br>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="../../dist/img/loan.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Magh 2063 B.S</h4>
                                <h4 class="subheading">Our Humble Beginnings</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">An idea to start an institute to carry out financial activities for the ease of people over the locality was brought to the table.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="../../dist/img/3.png" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2064 B.S</h4>
                                <h4 class="subheading">A Multipurpose institute is Born.</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">We started our journey by providing basic services with your support.</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="../../dist/img/5.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>January 18, 2018</h4>
                                <h4 class="subheading">Merger with Paluwa Multipurpose Co-operative.</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">We started joint transactions with the name of Surakshya Paluwa.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="../../dist/img/4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>July 2020</h4>
                                <h4 class="subheading">Phase Two Expansion</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">We started a new branch in New Road,Pokhara.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Be Part
                                <br />
                                Of Our
                                <br />
                                Story!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
							</div>
						</div>
					</div>
		
		</section>

      <section class="content" >
				<div class="container-fluid">
					<div class="row">
						<div class="col-12"><br>
							<div class="card" >
							
    <section class="page-section" id="feedback">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Feedback</h2>
                    <h3 class="section-subheading text-muted">We are here for your service. Don't hesitate to ring a call.</h3>
                </div>
               
                <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="POST">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" name="name" type="text" placeholder="Your Name *" data-sb-validations="required" required/>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" name="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" required/>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" name="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required" required />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" name="message" placeholder="Your Message *" data-sb-validations="required" required></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-warning" name="submit"id="submitButton" type="submit" style="color:whiite"><b>Send Message</b></button></div>
                </form>
            </div>
        </section></div></div></div></div></section></div>
      <style>
        .cardlet{
          display: flex;
          height: 20rem;
          gap: 1rem;
        }
        .cardlet > div{
          flex: 1;
          border-radius: 1rem;
          background-position: center;
          background-repeat: no-repeat;
          background-size: auto 100%;
          transition: all .8s cubic-bezier(.25,.4,.45,.1.4);
        }
        .cardlet > div:hover{
          flex: 5;
        }
      </style>

      <?php 
      include "footer.php";
      ?>
</body>

<?php 
include "dbconn.php";
function sanitize($input) {
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
  return $input;
}
if (isset($_POST['submit']))
{
  $name=sanitize($_POST['name']);
  $phone=sanitize($_POST['phone']);
  $email=sanitize($_POST['email']);
  $message=sanitize($_POST['message']);
  $sql=mysqli_query($conn,"insert into feedback(name,email,phone,message) values('$name','$email','$phone','$message')")  ;
  ?>
  <script>
    alert("Thank you for your feedback!");
    window.location.href="homepageuser.php";
    </script>
  <?php
}
?>