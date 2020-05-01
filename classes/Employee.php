<?php

class Employee extends Db
{
	//Select all data from database
	public function select()
	{
		$sql = "SELECT * FROM employees";
		
		//run query
		$result = $this->connect()->query($sql);
		
		//check if result exists
		if($result->rowCount() > 0)
		{
			while($row = $result->fetch())
			{
				//take all results and put in one array
				$data[] = $row;
			}
			return $data;
		}
	}
	
	//Insert Logic
	
	public function insert($name,$city,$designation)
	{
		$sql= "INSERT INTO employees (name,city,designation) VALUES (?,?,?) ";
		//prepare statement
		$stmt = $this->connect()->prepare($sql);
		$execute = $stmt->execute([$name,$city,$designation]);
		if($execute)
		{
			header('Location: index.php');
		}
		
	}
	
	
	public function selectOne($id)
	{
		//we'll recieve that id so we can pass it to the query
		
		$sql = "SELECT * FROM employees WHERE id = :id";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(":id",$id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
		
		
	}
	
	//Update method
	public function update($name,$city,$designation,$id)
	{
		$sql = "UPDATE employees SET name = ?, city = ?, designation = ? WHERE id = ?";
		$stmt = $this->connect()->prepare($sql);
		$execute = $stmt->execute([$name,$city,$designation,$id]);
		if($execute)
		{
			header('Location: index.php');
		}
	}
		

	//Delete Record
	public function delete($deleteId)
	{
		$sql = "DELETE FROM employees WHERE id = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$deleteId]);
	}

	//display errors when fields are empty
	public function handleErrors()
	{
		if(empty($name))
		{
			$_SESSION['errors["nameError"]'] = "The name field is required";
		}

		if(empty($city))
		{
			$_SESSION['errors["cityError"]'] = "The city field is required";
		}

		if(empty($designation))
		{
			$_SESSION['errors["designationError"]'] = "The designation field is required";
		}

		header("Location: create.php");
		exit();
	}
}
?>
