<?php

include "dbconn.php";
include "navforuser.php";

if(!isset($_SESSION['username'])){
    $username=$_SESSION['username'];}

$udata=mysqli_query($conn,"SELECT * from users1 where username='$username'");
$stmt=mysqli_fetch_assoc($udata);

// $loanname=$_GET['loan_name'];
//     $res = mysqli_query($conn, "select * from addloan1 where loan_name='$loanname'");
//      $row=mysqli_fetch_assoc($res);

$application_id=$_GET['application_id'];
$r=mysqli_query($conn,"SELECT * from application1 where application_id='$application_id'");
$app=mysqli_fetch_assoc($r);
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Your Loan Application for<b> <?php echo $app['loan_name'];?></b> is <b > <?php echo $app['status'];?></b></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../../pages/examples/homepageuser.php">Home</a></li>
            <li class="breadcrumb-item active">Loan Status</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-24 col-sm-12">
            <h3 class="d-inline-block d-sm-none"> View Your Loan Status</h3>
            <div class="col-12">
              <div class="card-body">
              <form  method="POST" >
              <div class="form-row">
              <div class="form-group col-md-4">
                      <label for="username">Username:</label>
                      <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['username'] ; ?>" readonly>
                    </div>  
                  </div>    
              <div class="form-row">

                    <div class="form-group col-md-4">
                      <label for="loanname">Loan Name:</label>
                      <input type="text" class="form-control" name="loanname" value="<?php echo $app['loan_name']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="interestrate">Interest Rate(in % p.a): </label>
                      <input type="number" step="any" class="form-control" name="interestrate" 
                      value="<?php  echo $app['interest_rate']?>" readonly >
                      
                    </div>
                    <div class="form-group col-md-4">
                      <label for="tenureperiod">Tenure period (in months): </label>
                      <input type="number" class="form-control" name="tenureperiod" value="<?php  echo $app['tenure_period']?>" readonly>
                    </div>
                  </div>
                  <div class="form-row">
                   
                    <div class="form-group col-md-4">
                      <label for="loan amount"> Loan Amount: </label>
                      <input type="number" class="form-control" name="loanamount"  value="<?php echo $app['loan_amount']; ?>"readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="emi"> EMI: </label>
                      <input type="number" class="form-control" name="emi"  value="<?php echo $app['emi']; ?>"readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="loan amount"> Loan Status: </label><br>
                      <?php
                        if($app['status']=='Verified'){?>
                   <b>Verified.</b>
                     <input type="number" class="btn btn-success" name="status" value="<?php echo $app['status']; ?>"readonly>
                      <?php } ?>
                      <?php
                        if($app['status']=='Rejected'){?>
                     <b> Rejected.</b><input type="number" class="btn btn-danger" name="status" value="<?php echo $app['status']; ?>"readonly>
                      <?php } ?>

                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="firstname">First Name:</label>
                      <input type="text" class="form-control" name="firstname" value="<?php  echo $stmt['first_name']?>" readonly >
                    </div>
                    <div class="form-group col-md-4">
                      <label for="middlename">Middle Name: </label>
                      <input type="text" class="form-control" name="middlename" value="<?php  echo $stmt['middle_name']?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Last Name:</label>
                      <input type="text" name="lastname" class="form-control" value="<?php  echo $stmt['last_name']?>" readonly>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="dob">DOB(in AD):</label>
                      <input type="date" class="form-control" name="dob" value="<?php  echo $stmt['dob']?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="phonenumber">Phone Number: </label>
                      <input type="text" class="form-control" name="phonenumber" value="<?php  echo $stmt['phone_number']?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Email Address:</label>
                      <input type="text" name="email" class="form-control" value="<?php  echo $stmt['email']?>" readonly>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="monthlysalary">Monthly Salary:</label>
                      <input type="number" step="any" class="form-control" name="monthlysalary" value="<?php echo $app['monthly_salary']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="otheremis">Other EMIs: </label>
                      <input type="number" step="any" class="form-control" name="otheremis" value="<?php echo $app['other_emis']; ?>" readonly>
                    </div>
                   
                  </div></div>
                          <h2 style="color:red"> Note: Please bring all your <b>original documents</b> that you submitted earlier in the Verification process within 7 days.<h2>
                  
                  <button type="button" id="printButton" class="btn btn-success">Print</button>           
                     </form> <!-- Close the form tag -->
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.card-body -->
    </div><!-- /.card -->
  </section><!-- /.content -->
                        </div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; 2023 Sagar Adhikari (+977 9864253402).
  </strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div><!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script>
  document.getElementById('printButton').addEventListener('click', function() {
    window.print();
  });
</script>
</body>

</html>