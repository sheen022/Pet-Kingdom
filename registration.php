<?php 

session_start();
header('location:login.php');
include_once "db_conn.php";
include_once "function.inc.php";
// $servername="localhost";
// $dbusername="root";
// $dbpassword="";
// $dbname="petkingdom";

// $conn = mysqli_connect($servername,$dbusername,$dbpassword,$dbname);
// if (!$conn){
// 		die ("Connection failed: " . mysqli_connect_error());
// 	}

$name = $_POST['user'];
$password = $_POST['password'];


$sql = "SELECT * FROM users WHERE username = '$name'";

$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);
	
	if ($num == 1){
		echo "Username Already Taken";
	}else{
		$reg = "INSERT into users (username, password) VALUES ('$name', '$password')";
		mysqli_query($conn, $reg);
		echo "Registration Successful";
	}




 ?>