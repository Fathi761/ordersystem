<?php
session_start();
include "../../../../login/login-system/connection.php";

if(isset($_POST['update'])){
    $ID = $_POST['id'];

    $fname = $_POST['fname'];
    $lname=$_POST['lname'];
    $phone=$_POST['phone'];
    $members=$_POST['members'];
    $date=$_POST['date'];
    $infromation = $_POST['information'];



    $result = mysqli_query($conn, "UPDATE `booking` SET 
                                                    firstname= '$fname',
                                                    lastname= '$lname',
                                                    phone= '$phone',
                                                    members= '$members',
                                                    date = '$date',
                                                    information = '$infromation'
                                                    
                                                    WHERE id= '$ID'");



    if($result){
        $_SESSION['success'] = ".$name.  updated";   
        header("Location: ../../booking.php");
    }else{
       $_SESSION['status'] = ".$name. was not updated successfully";
       header("Location: ./update.php");
   }


}
?>