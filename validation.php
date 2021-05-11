<?php 

session_start();
include_once "db_conn.php";

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
   
$sql = "SELECT * from users WHERE username = '$name' && password = '$password'";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);
	
	if ($num == 1){
		$_SESSION['username'] = $name;
		header('location:home.php');
	}else{
		header('location:login.php');
	}




 ?>