<?php

include "../../../../login/login-system/connection.php";

if(isset($_GET['id'])){
    $ID = $_GET['id'];
    
    $sql = "DELETE FROM `fries` WHERE id= $ID";
   $result = mysqli_query($conn, $sql);
    
   if($result){
        header("Location: ../../fries.php");
   }else{
       die(mysqli_error($conn));
   }
    
}



?>