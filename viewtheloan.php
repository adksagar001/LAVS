<?php
include "navforuser.php";
?>

<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>View</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../../pages/examples/homepageuser.php">Home</a></li>
            <li class="breadcrumb-item active">View Loan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid" >
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"> Loan Review</h3>
              <div class="col-12">
              <?php
                include "dbconn.php";
                $loanname=$_GET['loan_name'];

                $res = mysqli_query($conn, "select * from addloan1 where loan_name='$loanname'");
                $row=mysqli_fetch_assoc($res);
                ?>
                <img src="<?php echo "img/".$row['loan_photo'];?>" width=100% height=%100% alt="Loantype Image"><br>
                <br><a href="applyforloan.php?loan_name=<?php echo $row['loan_name'] ;?>" class="btn btn-block btn-success">Apply For 
                <?php 
                $loanname=$_GET['loan_name'];
                echo $loanname;
                ?>
                </a>

              </div>
             
            </div>
            <div class="col-12 col-sm-6">
              <h2 style=color:green class="my-3"><?php echo $loanname?>  </h2>
              <p1> 
                <?php
                
                echo $row['quote'];
                ?>
              </p1><hr>
              <h4>We provide <?php echo $loanname?> for:</h4>
              <ul>
                <li><?php echo $row['condition1']; ?></li>
                <li><?php echo $row['condition2']; ?></li>
                <li><?php echo $row['condition3']; ?></li>

              </ul>
              <hr>
              <h4>Features of <?php echo $loanname?>:</h4>
              <ul>
                <li>Upto <b>Nrs</b>
                  
                <b style= color:green><?php echo $row['max_loan_amount'];?> </b>for the construction of your Home.</li>
                <li>Tenure upto <b style= color:green><?php echo $row['tenure_period'];?> </b>months.</li>
                <li><?php echo $row['feature1']; ?></li>
                <li><?php echo $row['feature2']; ?></li>
                <li><?php echo $row['feature3']; ?></li>
              </ul>
              <hr>
              <h4>Eligibility</h4>
              <ul>
              <li><?php echo $row['eligibility1'];?></li>
              <li><?php echo $row['eligibility2'];?></li>
              <li><?php echo $row['eligibility3'];?></li>
            
             </ul>
            </div>
          </div>
         
            </nav>
           
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  

<?php
include "footer.php";
?>
</div>