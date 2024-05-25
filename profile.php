<?php 
include "navforuser.php";
$username = $_SESSION['username'];

$con=mysqli_connect('localhost','root','','lavs');
$res = mysqli_query($con, "SELECT * FROM users1 where username='$username'");
$row = mysqli_fetch_assoc($res);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="homepageuser.php">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $row['username'];?></h3>

                <p class="text-muted text-center"><?php echo $row['job'];?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item ">
                   <a href="https://www.facebook.com/adksagar00"><img src="../../dist/img/facebook.png" ></a>
                  <a href="https://www.instagram.com/adk_sagar00/"><img src="../../dist/img/instagram.png" ></a>
                  <a href="https://www.linkedin.com/in/sagar-adhikari-431897280/"><img src="../../dist/img/linkedin.png" ></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#overview" data-toggle="tab">Overview</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="overview">
                    <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Profile Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                 <?php echo $row['education'];?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted"> <?php echo $row['address'];?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger"> <?php echo $row['skills'];?></span>
                </p>

                <hr>

              </div>
              <!-- /.card-body -->
            </div>

                  </div>

                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" method="post" >
                      <div class="form-group row">
                        <label for="cpassword" class="col-sm-2 col-form-label">Current Password:</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="cpassword" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="npassword" class="col-sm-2 col-form-label">New Password:</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="npassword" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="cnpassword" class="col-sm-2 col-form-label">Confirm New-Password:</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="cnpassword" required>
                        </div>
                      </div>
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-info" name="change_password">Change Password</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php
include "footer.php";
?>



<?php

include "dbconn.php"; // Include your database connection

if (isset($_POST['change_password'])) {
    $username = $_SESSION['username']; // Get the username from the session
    $current_password = $_POST['cpassword'];
    $new_password = $_POST['npassword'];
    $confirm_password = $_POST['cnpassword'];

    // Check if the new password and confirm password match
    if ($new_password !== $confirm_password) {
        echo '<script>alert("New password and confirm password do not match.");</script>';
    } else {
        // Prepare the SQL statement to check the current password
        $check_password_sql = "SELECT password FROM users1 WHERE username = ?";
        $stmt = mysqli_prepare($conn, $check_password_sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $current_db_password = $row['password'];

            // Verify if the current password matches the one in the database
            if (md5($current_password) === $current_db_password) {
                // Current password is correct, update the password in the database
                $update_password_sql = "UPDATE users1 SET password = MD5(?) WHERE username = ?";
                $update_stmt = mysqli_prepare($conn, $update_password_sql);
                mysqli_stmt_bind_param($update_stmt, "ss", $new_password, $username);

                if (mysqli_stmt_execute($update_stmt)) {
                    echo '<script>alert("Password changed successfully.");</script>';
                } else {
                    echo '<script>alert("Failed to update password. Please try again later.");</script>';
                }

                mysqli_stmt_close($update_stmt);
            } else {
                echo '<script>alert("Current password is incorrect. Please enter the correct current password.");</script>';
            }
        }
        
        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);
?>

