<?php

include "../../../../login/login-system/connection.php";



if(isset($_POST['submit'])){
    
    $id =$_POST['id'];
    $fname = $_POST['fname'];
    
    $lname=$_POST['lname'];
    $phone=$_POST['phone'];
    $members=$_POST['members'];
    $date=$_POST['date'];
    $infromation = $_POST['information'];

    
        $sql = "INSERT INTO `booking` (fname, lname, phone, members, date, information) VALUES('$fname','$lname','$phone','$members', '$date', '$infromation')";

        $result = mysqli_query($conn,$sql);

        if($result){
            $_SESSION['success'] = "Booking Added";
            header('Location: ../../booking.php');
        }else{
            die(mysqli_error($conn));
        }
    
}  




?>


