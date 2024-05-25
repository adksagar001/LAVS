<?php
include "navforuser.php";

$username = $_SESSION['username'];

$con = mysqli_connect('localhost','root','','lavs');
$res = mysqli_query($con, "SELECT * from application1 where username='$username'");
?>
<!doctype html>
<html lang="en">
<head>
<style>
		.a{
			color:green;
		} .b{color:#173A73}
		</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> View Applications</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet">
</head>
<body>
	<div class="wrapper">
	 <!-- Content Header (Page header) -->
	 <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">          <h1>View Applications</h1>
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../../pages/examples/homepageadminn.php">Home</a></li>
            <li class="breadcrumb-item active">View Applications</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
	</section>


	<section class="content">
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card" >
							<div class="card-header">
								<h3 class="card-title">All Application data of <b class="b"><?php echo $username; ?></b></h3>
							</div>
							<div class="card-body">
								<table id="viewusers" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Application Id</th>
											<th>Loan Type</th>
											<th>Amount</th>
											<th>Interest rate</th>
											<th>Duration(in months)</th>
											<th>EMI</th>
											<th>Monthly Salary</th>
											<th>Contact number</th>
											<th>E-mail</th>
											<th>Applied Date</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>
										<?php while($row=mysqli_fetch_assoc($res)){?>
										<tr>
											<td><?php echo $row['application_id']?></td>
											<td><?php echo $row['loan_name']?></td>
											<td><b class="a"><?php echo $row['loan_amount']?></b></td>
											<td><b class="a"><?php echo $row['interest_rate']?></b></td>
											<td><b class="a"><?php echo $row['tenure_period']?></b></td>
											<td><b class="a"><?php echo $row['emi']?></b></td>
											<td><?php echo $row['monthly_salary']?></td>
											<td><?php echo $row['phone_number']?></td>
											<td><?php echo $row['email']?></td>
											<td><?php echo $row['application_date']?></td>
											<td>
												<?php
													if($row['status']=='Verified'){
														?>
														<p class="btn btn-success"><?php echo $row['status']; }?></p>
														<a href="viewstatususer.php?application_id=<?php echo $row['application_id'];?>" class="btn btn-secondary">View</a>
														<?php
														 if($row['status']=='Rejected'){
															?>
														<p class="btn btn-danger"><?php echo $row['status'];}?></p>
														<?php
														 if($row['status']=='Pending'){
															?>
														<p class="btn btn-primary"><?php echo $row['status'];}?></p>
											</td>
										</tr>
										<?php } ?>
									</tbody>
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
