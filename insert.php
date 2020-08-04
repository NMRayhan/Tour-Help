<?php 
	$name = $_POST['name'];
	$password = $_POST['password'];
	$Gender = $_POST['Gender'];
	$phone_Code = $_POST['phone_Code'];
	$phone_Number = $_POST['phone_Number'];
	$User_Name = $_POST['User_Name'];
	$email = $_POST['email'];
	
	//create connectio
	$conn = new mysqli("localhost","root","","demo");
	if($conn->connect_error){
		die('Conncetion Failed '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into user(name,password,Gender,phone_Code,phone_Number,User_Name,email) value(?,?,?,?,?,?,?)");
		
		$stmt->bind_param("ssssiss",$name,$password,$Gender,$phone_Code,$phone_Number,
		$User_Name,$email);
		$stmt-> execute();
		echo "Registration Successfully";
		$stmt->close();
		$conn->close();
	}

?>