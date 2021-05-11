<!-- <?php 

function setisEmpty(){
   $bool_empty = false;
   $args = func_get_args();
     for($i = 0; $i < func_num_args(); $i++){
        if($args[$i] == "" ){
            $bool_empty = true;
            break;
        }     
     }
    return $bool_empty;
}

function showMenu($conn, $cat = null, $searchkey = null){
  if($searchkey == null){
       if($cat == null) {
            //declare the SQL
           $sql = "SELECT i.item_id
                     , i.minimum_qty
                     , i.item_name
                     , i.item_short_code
                     , c.cat_desc
                     , i.item_price
                     , i.item_img
                  FROM `items` i
                  JOIN `category` c
                    ON i.cat_id = c.cat_id ;";
        
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
           return false;
           exit();
         }
      }
      else
      {  //check if $cat has value
            $sql = "SELECT i.item_id
                     , i.minimum_qty
                     , i.item_name
                     , i.item_short_code
                     , c.cat_desc
                     , i.item_price
                     , i.item_img
                  FROM `items` i
                  JOIN `category` c
                    ON i.cat_id = c.cat_id 
                WHERE c.cat_id = ?;";
        
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
           return false;
           exit();
         }
        mysqli_stmt_bind_param($stmt, "s" , $cat);
      }
  }
  else{ //check if searchkey variable is not NULL
        $sql = "SELECT i.item_id
                     , i.minimum_qty
                     , i.item_name
                     , i.item_short_code
                     , c.cat_desc
                     , i.item_price
                     , i.item_img
                  FROM `items` i
                  JOIN `category` c
                    ON i.cat_id = c.cat_id
                 WHERE i.item_name LIKE ?
                    OR i.item_short_code = ?
                    OR c.cat_desc like ?
                    OR i.item_price = ?;";
        $stmt=mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt, $sql)){
            echo "Something went wrong.";
            exit();
         }
        $itemname="%{$searchkey}%"; 
        mysqli_stmt_bind_param($stmt, "ssss" , $itemname, $searchkey, $itemname, $searchkey);
        
    }
         mysqli_stmt_execute($stmt);
         $resultData = mysqli_stmt_get_result($stmt);
    if(!empty($resultData)){
         $arr=array();
         while($row = mysqli_fetch_assoc($resultData)){
             array_push($arr,$row);
         }
         return $arr;
    }else{
        return false;
    }
}

function displayItemInfo($conn, $value = "", $category = array()){
    if(sizeof($category) > 0){
        $catStr = "0";
        foreach($category as $cat){
            $catStr .= "," . $cat;
        }
        $sql="SELECT * from items WHERE cat_id in ( {$catStr} ) AND item_name like ? ;";
    }else{
        $sql="SELECT * from items WHERE item_name like ? ;";
    }
    
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location:index.php?error=stmtfailed");
        exit();
    }
    $value = "%{$value}%" ;
        mysqli_stmt_bind_param($stmt, "s" , $value);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $arr = array();
        while($row = mysqli_fetch_assoc($resultData)){
            array_push($arr,$row);            
        }
        return $arr;
        mysqli_stmt_close($stmt); 
}

function fullDisplay($conn){
    $sql = "SELECT i.item_id item_id
                 , c.cat_desc cat_desc
                 , i.item_img item_img
                 , i.item_short_code item_short_code
                 , i.item_name item_name
                 , i.item_price item_price
              FROM `items` as i
              JOIN `category` as c
                ON i.cat_id = c.cat_id;";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location:index.php?error=stmtfailed");
        exit();
    }

 // mysqli_stmt_bind_param($stmt, "s" , $value);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $arr = array();            //initialize an empty array
        while($row = mysqli_fetch_assoc($resultData)){
            array_push($arr,$row);            
        }
        return $arr;               //this is the return value
        mysqli_stmt_close($stmt);  //close the mysqli_statement
}





 ?> -->