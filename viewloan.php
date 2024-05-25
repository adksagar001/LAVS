<?php
include "navforuser.php";

$con=mysqli_connect('localhost','root','','lavs');
$res = mysqli_query($con, "SELECT * FROM addloan1");

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>view loans </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet">
</head>
<body>
	<div class="wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
       
        </div>
        <div class="col-sm-6"> 
          <h1>Loans</h1>
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../../pages/examples/homepageadminn.php">Home</a></li>
            <li class="breadcrumb-item active">View Loans</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
	</section>

		<section class="content">
			<div class="content-wrapper" >
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card" >
								<div class="card-header">
									<h3 class="card-title">All Loan data</h3>
								</div>
								<div class="card-body">

                
									<table id="viewusers" class="table table-bordered table-striped">
									<thead>
  <tr>
    <th>Loan Name</th>
    <th>Tenure Period</th>
    <th>Quote</th>
    <!-- <th>Condition 1</th>
    <th>Condition 2</th>
    <th>Condition 3</th>
    <th>Feature 1</th>
    <th>Feature 2</th>
    <th>Feature 3</th>
    <th>Eligibility 1</th>
    <th>Eligibility 2</th>
    <th>Eligibility 3</th> -->

    <th>Interest Rate</th>
    <th>Maximum Loan Amount</th>
    <th>Loan Photo</th>
    <th>Collateral 1</th>
    <th>Collateral 2</th>
    <th>Collateral 3</th>

    <th>Actions</th>
  </tr>
</thead>

<?php while ($row = mysqli_fetch_assoc($res)) { ?>
  <tr>
    <td><?php echo $row['loan_name']; ?></td>
    <td><?php echo $row['tenure_period']; ?></td>
    <td><?php echo $row['quote']; ?></td>
    
    <td><?php echo $row['interest_rate']; ?></td>
    <td><?php echo $row['max_loan_amount']; ?></td>
    <td><img src="<?php echo "img/".$row['loan_photo'];?>" width="150px" height="130px"></td>
    <td><?php echo $row['collateral1']; ?></td>
    <td><?php echo $row['collateral2']; ?></td>
    <td><?php echo $row['collateral3']; ?></td>

    <td>

    <a href="viewtheloan.php?loan_name=<?php echo $row['loan_name']; ?>" class="btn btn-success">View</a>
    </td>
  </tr>
<?php } ?>

									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php include "footer.php"; ?>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>

	<script>
		$(document).ready(function() {
  $('#viewusers').DataTable({
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'copy',
        exportOptions: {
          columns: [0, 1, 2, 4]
        }
      },
      {
        extend: 'csv',
        exportOptions: {
          columns: [0, 1, 2, 4]
        }
      },
      {
        extend: 'excel',
        exportOptions: {
          columns: [0, 1, 2, 4]
        }
      },
      {
        extend: 'pdf',
        exportOptions: {
          columns: [0, 1, 2, 4]
        }
      },
      {
        extend: 'print',
        exportOptions: {
          columns: [0, 1, 2, 4]
        }
      },
      'colvis'
    ]
  });
});

	</script>
</body>
</html>
