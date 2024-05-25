<?php
include "nav.php";

$con=mysqli_connect('localhost','root','','lavs');
$res = mysqli_query($con, "SELECT * FROM users1");

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>view Users </title>
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
          <h1>Users</h1>
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../../pages/examples/homepageadminn.php">Home</a></li>
            <li class="breadcrumb-item active">View Users</li>
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
									<h3 class="card-title">All Users data</h3>
								</div>
								<div class="card-body">

                
									<table id="viewusers" class="table table-bordered table-striped">
									<thead>
  <tr>
    <th>User Name</th>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Last Name</th>
    <th>Education</th>
    <th>Skills</th>


    <th>Bank Account Number</th>
    <th>Phone Number</th>
    <th>Email Address</th>
    <th>Address</th>

    <th>Actions</th>
  </tr>
</thead>

<?php while ($row = mysqli_fetch_assoc($res)) { ?>
  <tr>
    <td><?php echo $row['username']; ?></td>
    <td><?php echo $row['first_name']; ?></td>
    <td><?php echo $row['middle_name']; ?></td>
    
    <td><?php echo $row['last_name']; ?></td>
    <td><?php echo $row['education']; ?></td>
    <td><?php echo $row['skills']; ?></td>

    <td><?php echo $row['bank_account']; ?></td>
    <td><?php echo $row['phone_number']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['address']; ?></td>

    <td>
    <a href="checkdeleteuser.php?username=<?php echo $row['username']; ?>" class="btn btn-danger">Delete</a>
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
