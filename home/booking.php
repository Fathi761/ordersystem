<?php

include "../login/login-system/connection.php";


if(isset($_POST['booking'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $members = $_POST['members'];
    $date = $_POST['date'];
    $information = $_POST['information'];

    $sql = "INSERT INTO `booking` (firstname, lastname, phone, members, date, information) VALUES ('$fname','$lname','$phone','$members', '$date', '$information')";

    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['success'] = "New Booking for .$fname. and his number is .$phone.";
        header('Location: ./home.php');
    }else{
        die(mysqli_error($conn));
    }
}

?>