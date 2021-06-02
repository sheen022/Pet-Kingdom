<?php
if(isset($_GET['item_id'])){
        include "db_conn.php";
        include "control-dashboard.php";
        // include "../updatecategory.php";
        $item_id = htmlentities($_GET['item_id']);
        $itemname = htmlentities($_GET['item_name']);
        $itemsc = htmlentities($_GET['item_short_code']);
        $item_stat = htmlentities($_GET['item_stat']);
        $itemprice = htmlentities($_GET['item_price']);

        $sql_del = "DELETE FROM `items` WHERE item_id = ?
                        and item_name = ?
                        and item_short_code = ?
                        and item_status = ?
                        and item_price = ?  ; ";
        
        $stmt_del = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt_del, $sql_del)){
            header("location: ../index.php?error=9"); //delete failed
            exit();
            }
        mysqli_stmt_bind_param($stmt_del,"sssss",$item_id, $itemname, $itemsc, $item_stat, $itemprice );
        mysqli_stmt_execute($stmt_del);
        header("location: ../index.php?success_delete");
        
    }