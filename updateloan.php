<?php include "nav.php"; ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Loan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../../pages/examples/homepageadminn.php">Home</a></li>
              <li class="breadcrumb-item active">Update Loan</li>
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
              <h3 class="d-inline-block d-sm-none"> Update Loan</h3>
              <div class="col-12">
                <div class="card-body">
               <b>Update Loan Data</b>
                <?php 
               
                $con=mysqli_connect('localhost','root','','lavs');

                if(isset($_GET['loan_name']))
                {
                  $searchloan=$_GET['loan_name'];  
                  // $sql="update addloan set loan_name='$u_loanname'"
                
                $res=mysqli_query($con,"select * from addloan1 where loan_name='$searchloan'");
                         
                 $row=mysqli_fetch_assoc($res);
                }
                ?>
              </div>
              </div>
              <form method="POST" action="update_loan_process.php"> 
                  <div class="form-row">
                    
                    <div class="form-group col-md-4">
                        <label for="loanname">Loan Name:</label>
                        
                        <input type="text" class="form-control" name="loanname" id="loanname" 
                        value="<?php echo $row['loan_name'];?>">
                      </div>
                <div class="form-group col-md-4">
                    <label for="tenureperiod">Tenure period (in months): </label>
                    <input type="number" class="form-control" name="tenureperiod" id="tenureperiod" 
                    value="<?php echo $row['tenure_period'];?>">
                </div>

                <div class="form-group col-md-4">
                  <label>Quote:</label>
                  <input type="text" name="quote"  class="form-control" id="quote"
                  value="<?php echo $row['quote'];?>">
                </div>
                </div>
                <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="interestrate">Interest Rate: </label>
                        <input type="decimal(5,2)" class="form-control"  name="interestrate" 
                        value="<?php echo $row['interest_rate'];?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="loan amount">Max Loan Amount: </label>
                        <input type="number" class="form-control" name="maxloanamount"
                        value="<?php echo $row['max_loan_amount'];?>" >
                      </div>
                     
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="condition1">Condition 1:</label>
                      <input type="text" class="form-control" name="condition1"
                      value="<?php echo $row['condition1'];?>" >
                    </div>
                    <div class="form-group col-md-4">
                      <label for="condition2">Condition 2: </label>
                      <input type="text" class="form-control" name="condition2" value="<?php echo $row['condition2'];?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Condition 3:</label>
                      <input type="text" name="condition3" class="form-control" name="condition3" value="<?php echo $row['condition3'];?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="feature1">Feature 1:</label>
                      <input type="text" class="form-control" name="feature1"value="<?php echo $row['feature1'];?>" >
                    </div>
                    <div class="form-group col-md-4">
                      <label for="feature2">Feature 2: </label>
                      <input type="text" class="form-control" name="feature2" value="<?php echo $row['feature2'];?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Feature 3:</label>
                      <input type="text" name="feature3" class="form-control" id="feature3"value="<?php echo $row['feature3'];?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="eligibility1">Eligibility 1:</label>
                      <input type="text" class="form-control" name="eligibility1" value="<?php echo $row['eligibility1'];?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="eligibility2">Eligibility 2: </label>
                      <input type="text" class="form-control" name="eligibility2"value="<?php echo $row['eligibility2'];?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Eligibility 3:</label>
                      <input type="text" name="eligibility3" class="form-control" id="eligibility3" value="<?php echo $row['eligibility3'];?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="collateral1">Collateral needed 1:</label>
                      <input type="text" class="form-control" name="collateral1" value="<?php echo $row['collateral1'];?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="collateral2">collateral needed 2: </label>
                      <input type="text" class="form-control" name="collateral2"value="<?php echo $row['collateral2'];?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label>collateral needed 3:</label>
                      <input type="text" name="collateral3" class="form-control" id="collateral3"value="<?php echo $row['collateral3'];?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="photo of loan"> New Photo to put for the loan:</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <div class="row mb-3">
                            <div class="col-sm-10">
                              <input class="form-control" type="file" name="loanphoto" id="loanphoto" >
                            </div>
                          </div>
                        </div>
                      </div>                
                      <input type="submit" name="update" value="Update Loan"class="btn btn-success">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="loan photo">Current Loan Photo: </label>
                        <img src="<?php echo "img/".$row['loan_photo'];?>" width="150px" height="130px">
                      </div>
                  </div>
              </form>
              </div>
            </div>
          </div>
            </nav>
          </div>
        </div>
        <!-- /.card-body -->
      <!-- /.card-->
      </section>

      <?php include "footer.php"; ?>
              </div>
              </div>