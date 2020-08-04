<?php 
	$User_Name = $_POST['User_Name'];
	$password = $_POST['password'];
	
	//connect to the server and select database
	$conn = mysqli_connect("localhost","root","","demo");
	
	
	//to prevent mysql injection 
	$User_Name = stripcslashes($User_Name);
	$password = stripcslashes($password);
	$User_Name = mysqli_real_escape_string($conn,$_POST['User_Name']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);

	
	
	
	//Query the database for User
	$result = mysql_query("select User_Name,password from user where User_Name = '$User_Name' and password = '$password'")
	or die("Failed to Query database ".mysql_error());
	
	$row = mysql_fetch_array($result);
	if($row['User_Name'] == $User_Name && $row['password'] == $password){
		echo "Login Success!!! Welcome".$row['User_Name'];
	}else{
		echo "Failed to Login";
	}
?>