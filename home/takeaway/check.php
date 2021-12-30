<?php
session_start();
include "../../login/login-system/connection.php";

if(isset($_POST['submit'])){
    $products = $_POST['products'];
    $grand_total = $_POST['grand_total'];
    $currency = $_POST['currency'];
    $table = $_POST['table'];

    $sql = "INSERT INTO `orders` (number_table, amount_USD, amount_LL, products) VALUES ('$table','$grand_total','$currency','$products')";


    $result = mysqli_query($conn, $sql);

    if($result){
        $_SESSION['success'] = "New order for .$products. and his total is .$total.";
        header('Location: ./takeaway.php');
    }else{
        die(mysqli_error($conn));
        header("Location: ../../home.php");
    }
}

?>