<?php 

include "dbconn.php"; 
include "nav.php"; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../../pages/examples/homepageadminn.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
               
                <h3>
                  <?php
                $query = "SELECT COUNT(*) AS user_count FROM users1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$userCount = $row['user_count'];

echo $userCount;
?>
</h3>
                <p>Registered Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="viewusers.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php
                $query1 = "SELECT COUNT(*) AS a_count FROM application1";
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_assoc($result1);

$aCount = $row1['a_count'];

echo $aCount;
?></h3>

                <p>Applications</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="viewapplicationadmin.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php
                $query2 = "SELECT COUNT(*) AS a_count2 FROM addloan1";
$result2 = mysqli_query($conn, $query2);
$row2 = mysqli_fetch_assoc($result2);

$aCount2 = $row2['a_count2'];

echo $aCount2;
?></h3>

                <p>Loan Types</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="viewloanforadmin.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
           
          </div> 
          <div class="card card-danger">
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
        </div><br>
       
              
              <!-- /.footer -->
            </div>
</div>
</div></div>

<?php include "footer.php"; ?>
