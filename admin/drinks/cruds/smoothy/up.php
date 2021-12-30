<?php
session_start();
include "../../../../login/login-system/connection.php";

if(isset($_POST['update'])){
    $ID = $_POST['id'];
    $name= $_POST['name'];
    $price= $_POST['price'];
    $quantity = $_POST['quantity'];
    $description= $_POST['description'];
    $product_code = $_POST['product_code'];
    $image = $_FILES['image']['name'];



    $result = mysqli_query($conn, "UPDATE `juice` SET 
                                                    image= '$image',
                                                    name= '$name',
                                                    price= '$price',
                                                    quantity= '$quantity',
                                                    description= '$description',
                                                    product_code= '$product_code'
                                                    
                                                    WHERE id= '$ID'");



    if($result){
        move_uploaded_file($_FILES['image']['tmp_name'],"../../smoothy/add-smoothy/uploads/".$_FILES['image']['name']);
        $_SESSION['success'] = "Smoothy Drinks updated";   
        header("Location: ../../smoothy.php");
    }else{
       $_SESSION['status'] = "Smoothy Drinks was not updated successfully";
       header("Location: ./update.php");
   }


}
?>