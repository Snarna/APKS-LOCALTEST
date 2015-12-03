<?php
$servername = "localhost:3306";
$username = "snarna";
$password = "limingjie";
$database = "apksdb";

//Connection
$con = new mysqli($servername, $username, $password, $database);
if($con->connect_error){
	die("Connection Failed!" . $con->connect_error);
}

//Start Session
session_start();

if(!ctype_alnum($_POST['username'])){
	$message = "User Name Must Be Alpha Numeric";
}
elseif (!ctype_alnum($_POST['password'])){
	$message = "Password Must Be Alpha Numeric";
}
else{
	$command = "SELECT * FROM apksdb.adminlogin WHERE admin='" . $_POST['username'] . "' " . "AND password='" . $_POST['password'] . "'";
	try{
		$result = $con->query($command);
		
		if($result->num_rows > 0){
			//Success
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['logstatus'] = "1";
			$message = "pass";
		}
		else {
			//Failed
			$message = "Wrong Username or Password.";
		}
	}
	catch (Exception $e){
		$message = $e;
	}
}

echo $message;


//Close Connection
$con->close();

?>