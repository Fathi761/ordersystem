<?php

include "../../../../login/login-system/connection.php";



if(isset($_POST['submit'])){
    
    $id =$_POST['id'];
    $image_url = $_FILES['image']['name'];
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $usertype=$_POST['usertype'];

    
    
    if(file_exists("./uploads/".$_FILES["image"]["name"])){
        
        $store = $_FILES["image"]["name"];
        $_SESSION["status"] = "Image already exists.'.$store.' ";
        header('Location: ./add.php');
    }else{
        $sql = "INSERT INTO `users` (image, name, email, password, usertype) VALUES('$image_url','$name','$email','$password', '$usertype')";

        $result = mysqli_query($conn,$sql);

        if($result){
            $temp_profile = $_FILES['image']['tmp_name'];
            move_uploaded_file($temp_profile, "../../../../login/login-system/uploads/".$_FILES["image"]["name"]);

            $_SESSION['success'] = "User Added";
            header('Location: ../../user.php');
        }else{
            die(mysqli_error($conn));
        }
    }
    
}



?>


