<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == "delete_category"){
	$delete = $crud->delete_category();
	if($delete)
		echo $delete;
}

ob_end_flush();
?>
