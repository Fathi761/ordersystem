<?php

include "../../../../login/login-system/connection.php";

if(isset($_GET['id'])){
    $ID = $_GET['id'];
    
    $sql = "DELETE FROM `falafel` WHERE id= $ID";
   $result = mysqli_query($conn, $sql);
    
   if($result){
        header("Location: ../../falafel.php");
   }else{
       die(mysqli_error($conn));
   }
    
}



?>