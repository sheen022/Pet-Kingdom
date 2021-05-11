<?php
if(isset($_POST['login'])){
    
include_once "db_conn.php";
include_once "function.php";
$name = htmlentities($_POST['user']);    
$password = htmlentities($_POST['password']);
    $user_info = uidExists($conn,$name,$password);
    if($user_info !== false){
        
       if($user_info['usertype'] == 'C'){
                header("location: customer/");
                exit;
       }
        else if ($user_info['usertype'] == 'A'){
                header("location: admin/");
               exit;
       }
        
    }
    else{
        header("location: index.php?login=false");
        exit();
    }
}
