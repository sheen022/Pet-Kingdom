<?php
if(isset($_POST['login'])){
include_once "db_conn.php";
include_once "function.inc.php";
$name = htmlentities($_POST['user']);    
$password = htmlentities($_POST['password']);    
    if(uidExists($conn,$name,$password) !== false){
       header("location: ../index.php?logged=yes");
       exit();
    }
    else{
        header("location: ../index.php?logged=no");
        exit();
    }
}



