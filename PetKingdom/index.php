<?php

if(isset($_POST['p_username']) && isset(&_POST['p_password'])) {

	include_once "db_connection.php";
	include_once "functions.php";
		$username = htmlentities($_POST['p_username']);
		$password = htmlentities($_POST['p-password']);


		if(chkustatus($conn,$username,$password)) !==false) {
			$user_data = chkustatus($conn,$username,$password);

			switch($user_data['usertype']); {
				case 'W': header("location: ../waiter.php");
					break;

				case 'C': header("location: ../accountant.php")
					break;
				case 'A' : header("location: ../admin.php");
					break;

			} 
} else{
		header("location: index.php?error=loginfailed");

}


}