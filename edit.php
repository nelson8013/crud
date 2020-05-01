<?php

	require_once('includes/autoload.php');
	
	//fetch the record using the id
	//check if the id variable is set
	if(isset($_GET['id']))
	{
		$uid = $_GET['id'];
		
		//we'll use the $uid variable to fetch the record using the id from the db and pass the uid variable to the selectOne Method, in the employee class we'll create a functionality to do that.
		
		$employee = new Employee();
		
		$result = $employee->selectOne($uid);
		
	}


	
	//check if data is submitted or not
	if(isset($_POST['update'])){
		
		$name = $_POST['name'];
		$city = $_POST['city'];
		$designation = $_POST['designation'];
		
		$id = $_POST['id'];
		
		$employee = new Employee();
		$employee->update($name,$city,$designation,$id);
		
		
	}
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
	</nav> <!--End of Nav bar--->	
	<div class="container mt-4"> <!--container Div begins-->
		<div class="row">
			<div class="col-lg-12">
				<div class="jumbotron">
					<h4>Update Employees</h4>
					<form action="" method="post">
					<input type="hidden" name="id" value="<?= $result['id']; ?>">
						<div class="form-group">
							<label for="">Name</label>
							<input type="text" class="form-control" placeholder="Enter Employee Name" name="name" value="<?php echo @$result['name']; ?>">
						</div>
						<div class="form-group">
							<label for="">City</label>
							<input type="text" class="form-control" placeholder="Enter Employee City" name="city" value="<?php echo @$result['city']; ?>">
						</div>
						<div class="form-group">
							<label for="">Designation</label>
							<input type="text" class="form-control" placeholder="Enter Employee Designation" name="designation" value="<?php echo @$result['designation']; ?>">
						</div>
						<button class="btn btn-primary" name="update">Update</button>
					</form>
				</div> 
			</div>
		</div>
	</div> <!--Container Div ends-->
	

</body>
</html>

