<?php
include "../../login/login-system/connection.php";


if(isset($_POST['save'])){
    $usd = $_POST['usd'];
    $lira = $_POST['lira'];
    $man = $_POST['man'];

    $sql = "INSERT into `cashdelivery` (usd, lira, man) VALUES ('$usd', '$lira', '$man')";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: delivery.php");
    }else{
        die(mysqli_error($conn));
    }
}

if(isset($_POST['save'])){
    $products = $_POST['products'];
    $grand_total = $_POST['grand_total'];
    $currency = $_POST['currency'];
    $table = $_POST['table'];

    $sql = "INSERT INTO `orders` (number_table, amount_USD, amount_LL, products) VALUES ('$table','$grand_total','$currency','$products')";


    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['success'] = "New order for .$products. and his total is .$total.";
        header('Location: ./delivery.php');
    }else{
        die(mysqli_error($conn));
        header("Location: ../home.php");
    }
}

?>  