<?php

include "../../../../login/login-system/connection.php";



if(isset($_POST['submit'])){
    
    $id = $_POST['id'];
    $image_url = $_FILES['image']['name'];
    
    $name=$_POST['name'];
    $price=$_POST['price'];
    $quantity= $_POST['quantity'];
    $description=$_POST['description'];
    $product_code = $_POST['product_code'];
    
    
    if(file_exists("./uploads/".$_FILES["image"]["name"])){
        
        $store = $_FILES["image"]["name"];
        $_SESSION["status"] = "Image already exists.'.$store.' ";
        header('Location: ./add.php');
    }else{
        $sql = "INSERT INTO `burger` (image, name, price, quantity, description, product_code) VALUES('$image_url','$name','$price','$quantity','$description','$product_code')";

        $result = mysqli_query($conn,$sql);

        if($result){
            $temp_profile = $_FILES['image']['tmp_name'];
            move_uploaded_file($temp_profile, "./uploads/".$_FILES["image"]["name"]);

            $_SESSION['success'] = "Burger Added";
            header('Location: ../../foods.php');
        }else{
            die(mysqli_error($conn));
        }
    }
    
}



?>


