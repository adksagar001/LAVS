<?php
include "dbconn.php";
include "navforuser.php";
$username=$_SESSION['username'];
$udata=mysqli_query($conn,"SELECT * from users1 where username='$username'");
$stmt=mysqli_fetch_assoc($udata);

$loanname=$_GET['loan_name'];
    $res = mysqli_query($conn, "select * from addloan1 where loan_name='$loanname'");
     $row=mysqli_fetch_assoc($res);
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Apply for <?php 
                $loanname=$_GET['loan_name'];
                echo $loanname;

                ?>
                </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../../pages/examples/homepageadminn.php">Home</a></li>
            <li class="breadcrumb-item active">Apply for Loan</li>
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
            <h3 class="d-inline-block d-sm-none"> Apply for Loan</h3>
            <div class="col-12">
              <div class="card-body">
              <form action="applyforloandb.php" method="POST" enctype="multipart/form-data">
              <div class="form-row">
              <div class="form-group col-md-4">
                      <label for="username">Username:</label>
                      <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['username'] ; ?>" readonly>
                    </div>  
                  </div>    
              <div class="form-row">

                    <div class="form-group col-md-4">
                      <label for="loanname">Loan Name:</label>
                      <input type="text" class="form-control" name="loanname" value="<?php echo $loanname ; ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="interestrate">Interest Rate(in % p.a): </label>
                      <input type="number" step="any" class="form-control" name="interestrate" 
                      value="<?php  echo $row['interest_rate']?>" readonly >
                      
                    </div>
                    <div class="form-group col-md-4">
                      <label for="tenureperiod">Tenure period (in months): </label>
                      <input type="number" class="form-control" name="tenureperiod" required>
                    </div>
                  </div>
                  <div class="form-row">
                   
                    <div class="form-group col-md-4">
                      <label for="loan amount"> Loan Amount: </label>
                      <input type="number" class="form-control" name="loanamount" min="10000" max="<?php echo $row['max_loan_amount']; ?>"required>
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
                      <input type="number" step="any" class="form-control" name="monthlysalary" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="otheremis">Other EMIs: </label>
                      <input type="number" step="any" class="form-control" name="otheremis" required>
                    </div>
                   
                  </div></div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="collateral1">
                        <?php
                         $res1 = mysqli_query($conn, "select * from addloan1 where loan_name='$loanname'");
                         $row1=mysqli_fetch_assoc($res1);
                         echo $row1['collateral1'];
                        ?></label>
                        <input class="form-control" type="file" id="collateral1" name="collateral1" accept=".pdf" required>
                        <small class="text-muted">Accepts PDF files only (max size: 10MB)</small>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="collateral2">
                        <?php
                         echo $row1['collateral2'];
                        ?></label>
                        <input class="form-control" type="file" id="collateral2" name="collateral2" accept=".pdf" required>
                        <small class="text-muted">Accepts PDF files only (max size: 10MB)</small>
                    </div><div class="form-group col-md-4">
                        <label for="collateral3">
                        <?php
                         echo $row1['collateral3'];
                        ?></label>
                        <input class="form-control" type="file" id="collateral3" name="collateral3" accept=".pdf" required>
                        <small class="text-muted">Accepts PDF files only (max size: 10MB)</small>
                    </div>
                </div>
                  <br>
                  <button type="submit" name="submit" class="btn btn-success">Apply for <?php echo $loanname; ?></button>
                </form> <!-- Close the form tag -->
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.card-body -->
    </div><!-- /.card -->
  </section><!-- /.content -->
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
</body>

</html>