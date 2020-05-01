<?php require_once('includes/autoload.php'); ?>

<!--tHIS HANDLES THE DELETE Fnc of our App  -->
<?php

    $deleteId = "";
	if(isset($_GET['del']))
	{
		$deleteId = $_GET['del'];
	}

	$employee = new Employee();
	$employee->delete($deleteId);
?>

<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="boot/css/bootstrap.min.css" rel="stylesheet">
	<title>POWER EMPLOYEE</title>
</head>

<body>
	<!---Nav Bar--->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Navbar</a>
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
				<a href="create.php" class="float-right btn btn-success">Create Employee</a>
					<h4>All Employees</h4>
					<table class="table mt-4">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Name</th>
								<th scope="col">City</th>
								<th scope="col">Designation</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$employee = new Employee();
							$rows = $employee->select();

							foreach ($rows as $row) : ?>
								<tr>
									<th scope="row"><?php echo $row['id']; ?></th>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['city']; ?></td>
									<td><?php echo $row['designation']; ?></td>
									<td>
										<a class="btn btn-sm btn-warning" href="create.php">Add</a>
											&nbsp;
										<a class="btn btn-sm btn-primary" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
											&nbsp;
										<a class="btn btn-sm btn-danger" href="index.php?del=<?php echo $row['id']; ?>">Delete</a>
									</td>
								</tr>
							<?php endforeach; ?>


						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!--Container Div ends-->


</body>

</html>