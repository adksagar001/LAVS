<?php
include "nav.php";
include "footer.php";
$con = mysqli_connect('localhost', 'root', '', 'lavs');

// Check if the application_id is provided in the URL
if (isset($_GET['application_id'])) {
    $applicationId = $_GET['application_id'];
        
    // Fetch the full details of the application based on the provided application_id
    $sql = "SELECT * FROM application1 WHERE application_id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $applicationId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $username=$row['username'];
            ?>
            <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../../pages/examples/homepageadminn.php">Home</a></li>
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
                <h1> Loan Application of<b> <?php echo $row['username'];?></b> </h1>
              <form  method="POST" >
              <div class="form-row">
              <div class="form-group col-md-4">
                 <label for="application_id">Application Id:</label>
                 <input type="text" class="form-control" name="application_id" value="<?php echo $applicationId;?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="username">Username:</label>
                      <input type="text" class="form-control" name="username" value="<?php echo $row['username'] ; ?>" readonly>
                    </div>  
                  </div>    
              <div class="form-row">

                    <div class="form-group col-md-4">
                      <label for="loanname">Loan Name:</label>
                      <input type="text" class="form-control" name="loanname" value="<?php echo $row['loan_name']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="interestrate">Interest Rate(in % p.a): </label>
                      <input type="number" step="any" class="form-control" name="interestrate" 
                      value="<?php  echo $row['interest_rate']?>" readonly >
                      
                    </div>
                    <div class="form-group col-md-4">
                      <label for="tenureperiod">Tenure period (in months): </label>
                      <input type="number" class="form-control" name="tenureperiod" value="<?php  echo $row['tenure_period']?>" readonly>
                    </div>
                </div>
                <div class="form-row">
                   
                    <div class="form-group col-md-4">
                      <label for="loan amount"> Loan Amount: </label>
                      <input type="number" class="form-control" name="loanamount"  value="<?php echo $row['loan_amount']; ?>"readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="emi"> EMI: </label>
                      <input type="number" class="form-control" name="emi"  value="<?php echo $row['emi']; ?>"readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="loan amount"> Loan Status: </label><br>
                      



                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="monthly_salary">Monthly Salary:</label>
                        <input type="text" class="form-control" value="<?php echo $row['monthly_salary'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone_number">Phone Number :</label>
                        <input type="text" class="form-control" value="<?php echo $row['phone_number'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="other_emis">Other EMIs:</label>
                        <input type="text" class="form-control" value="<?php echo $row['other_emis'] ?>" readonly>
                    </div>
                  </div>
                   <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="email">Email id:</label>
                        <input type="text" class="form-control" value="<?php echo $row['email'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="application_date">Application Date :</label>
                        <input type="text" class="form-control" value="<?php echo $row['application_date'] ?>" readonly>
                    </div>
                    
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="collateral1">Collateral 1:</label>
                        <embed src="<?php echo "collateral/".$row['collateral1'];?>" type="application/pdf" width="100%" height="100%">                    
                    </div>
                  </div><br>
                    <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="collateral1">Collateral 2:</label>
                        <embed src="<?php echo "collateral/".$row['collateral2'];?>" type="application/pdf" width="100%" height="100%">                    
                    </div>
                  </div> <br>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="collateral3">Collateral 3:</label>
                        <embed src="<?php echo "collateral/".$row['collateral3'];?>" type="application/pdf" width="100%" height="100%">                    
                    </div>
                  </div><br>
                  <?php
                   if ($row['status'] == 'Pending') {
                                                ?>
                                                <button type="submit" name="verify" class="btn btn-success">Verify</button>
                                                <button type="submit" name="reject" class="btn btn-danger">Reject</button>
                                                <?php
                                            } elseif ($row['status'] == 'Verified') {
                                                ?>
                                                <button type="button" class="btn btn-success" disabled>Verified</button>
                                                <?php
                                            } elseif ($row['status'] == 'Rejected') {
                                                ?>
                                                <button type="button" class="btn btn-danger" disabled>Rejected</button>
                                                <?php
                                            }
                                            ?>
                </div>
                     </form> <!-- Close the form tag -->
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.card-body -->
    </div><!-- /.card -->
  </section><!-- /.content -->
                        </div>
                        <?php
                    } else {
            echo "Application not found.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($con);
    }
} else {
    echo "Application ID not provided in the URL.";
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $applicationId = $_POST['application_id'];
    
    if (isset($_POST['verify'])) {
        $status = 'Verified';
    } elseif (isset($_POST['reject'])) {
        $status = 'Rejected';
    } else {
        $status = 'Pending';
    }

    // Update the status in the database using prepared statement
    $sql = "UPDATE application1 SET status = ? WHERE application_id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $status, $applicationId);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Status updated successfully
        } else {
            // Handle the error if the update fails
            echo "Error updating status: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        // Handle the error if the prepared statement fails
        echo "Error preparing statement: " . mysqli_error($con);
    }
}
?>
