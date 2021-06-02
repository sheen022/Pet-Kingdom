
<?php
if(isset($_POST['cat_id'])){
        include "db_conn.php";
        $itemcat  = htmlentities($_POST['itemname']);
        $itemstat = htmlentities($_POST['itemstatus']);
         $sql_upd = "UPDATE `category`
                        SET cat_desc = ?
                    WHERE cat_id = ?";
        $stmt_upd = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt_upd, $sql_upd)){
        header("location: ../index.php?error=8"); //update failed
        exit();
        }
        mysqli_stmt_bind_param($stmt_upd,"ss",$new_qty,$cat_id);
        mysqli_stmt_execute($stmt_upd);
        header("location: ../index.php?success_update=1");
        
    }