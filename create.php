<?php
session_start();
require_once('includes/autoload.php');

//check if data is submitted or not

if (isset($_POST['submit'])) {
	$name        = $_POST['name'];
	$city        = $_POST['city'];
	$designation = $_POST['designation'];

	if (!empty($name) && !empty($city) && !empty($designation)) {
		$name = filter_var($name, FILTER_SANITIZE_STRING);
		$city = filter_var($city, FILTER_SANITIZE_STRING);
		$designation = filter_var($designation, FILTER_SANITIZE_STRING);


		$employees = new Employee();
		$employees->insert($name, $city, $designation);
	} else {
		$employees = new Employee();
		$employees->handleErrors();
	}
}
?>

<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>POWER EMPLOYEE</title>
	<link href="boot/css/bootstrap.min.css" rel="stylesheet">
	<link href="parsely/parsely.css" rel="stylesheet">
	<script src="jquery/jquery.min.js"></script>
	<script src="parsely/parsely.min.js"></script>
	
</head>

<body>
	<!---Nav Bar--->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">POWER EMPLOYEE</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="create.php">Create</a>
				</li>

			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>
	<!--End of Nav bar--->
	<div class="container mt-4">
		<!--container Div begins-->
		<div class="row">
			<div class="col-lg-12">
				<div class="jumbotron">
					<a href="edit.php" class="float-right btn btn-success">Update Employee</a>
					<h4>Add Employees</h4>
					<form action="create.php" method="post">
						<div class="form-group">
							<label for="">Name</label>
							<input type="text" class="form-control" placeholder="Enter Emplopyee Name" name="name" required autofocus>
							<?php
							if (isset($_SESSION['errors["nameError"]'])) : ?>
								<div class="alert alert-danger mt-2">
									<?php echo $_SESSION['errors["nameError"]']; ?>
								</div>
							<?php endif ?>
						</div>
						<div class="form-group">
							<label for="">City</label>
							<input type="text" class="form-control" placeholder="Enter Employee City" name="city" required>
							<?php
							if (isset($_SESSION['errors["cityError"]'])) : ?>
								<div class="alert alert-danger mt-2">
									<?php echo $_SESSION['errors["cityError"]']; ?>
								</div>
							<?php endif ?>
						</div>
						<div class="form-group">
							<label for="">Designation</label>
							<input type="text" class="form-control" placeholder="Enter Employee Designation" name="designation" required>
							<?php
							if (isset($_SESSION['errors["designationError"]'])) : ?>
								<div class="alert alert-danger mt-2">
									<?php echo $_SESSION['errors["designationError"]']; ?>
								</div>
							<?php endif ?>
							<!-- End Session after dislaying the error messages -->

							<?php session_unset(); ?>
						</div>
						<button class="btn btn-primary" name="submit">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--Container Div ends-->


</body>

</html>