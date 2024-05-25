<?php
include "nav.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">  <h1>Add Loan</h1>
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../../pages/examples/homepageadminn.php">Home</a></li>
            <li class="breadcrumb-item active">Add Loan</li>
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
            <h3 class="d-inline-block d-sm-none"> Add Loan</h3>
            <div class="col-12">
              <div class="card-body">
              <form action="addloandb.php" method="POST" enctype="multipart/form-data">
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="loanname">Loan Name:</label>
                      <input type="text" class="form-control" name="loanname" placeholder="Enter the loan name" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="tenureperiod">Tenure period (in months): </label>
                      <input type="number" class="form-control" name="tenureperiod" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Quote</label>
                      <input type="text" name="quote" class="form-control" id="quote" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="interestrate">Interest Rate: </label>
                      <input type="number" step="any" class="form-control" name="interestrate" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="loan amount">Max Loan Amount: </label>
                      <input type="number" class="form-control" name="maxloanamount" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="condition1">Condition 1:</label>
                      <input type="text" class="form-control" name="condition1" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="condition2">Condition 2: </label>
                      <input type="text" class="form-control" name="condition2" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Condition 3:</label>
                      <input type="text" name="condition3" class="form-control" id="conditiono3" required>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="feature1">Feature 1:</label>
                      <input type="text" class="form-control" name="feature1" required >
                    </div>
                    <div class="form-group col-md-4">
                      <label for="feature2">Feature 2: </label>
                      <input type="text" class="form-control" name="feature2" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Feature 3:</label>
                      <input type="text" name="feature3" class="form-control" id="feature3" >
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="eligibility1">Eligibility 1:</label>
                      <input type="text" class="form-control" name="eligibility1" required >
                    </div>
                    <div class="form-group col-md-4">
                      <label for="eligibility2">Eligibility 2: </label>
                      <input type="text" class="form-control" name="eligibility2" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Eligibility 3:</label>
                      <input type="text" name="eligibility3" class="form-control" id="eligibility3">
                    </div>
                  </div></div>
                
                    <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="collateral1">Collateral needed 1:</label>
                      <input type="text" class="form-control" name="collateral1" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="collateral2">collateral needed 2: </label>
                      <input type="text" class="form-control" name="collateral2" required>
                    </div>
                    <div class="form-group col-md-4">
                      <label>collateral needed 3:</label>
                      <input type="text" name="collateral3" class="form-control" id="collateral3">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="photo of loan"> Photo to put for the loan:</label>
                              <input class="form-control" type="file" name="loanphoto" id="loanphoto" required>
                            </div>
                          </div>
                  <br>
                  <button type="submit" class="btn btn-success">Add Loan</button>
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
