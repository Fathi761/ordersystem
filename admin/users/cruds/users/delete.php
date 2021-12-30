<?php

include "../../../../login/login-system/connection.php";

if(isset($_GET['id'])){
    $ID = $_GET['id'];
    
    $sql = "DELETE FROM `users` WHERE id= $ID";
   $result = mysqli_query($conn, $sql);
    
   if($result){
        header("Location: ../../user.php");
   }else{
       die(mysqli_error($conn));
   }
    
}
?>