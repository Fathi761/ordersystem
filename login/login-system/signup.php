<?php

include './connection.php';



if(isset($_POST['submit'])){

    $image_url = $_FILES['image']['name'];

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    


    if(file_exists("./uploads/".$_FILES["image"]["name"])){
        
        $store = $_FILES["image"]["name"];
        $_SESSION["status"] = "Image already exists.'.$store.' ";
        header('Location: ../../home/home.php');
    }else{
        $sql = "INSERT INTO `users` (image, name, email, password) VALUES('$image_url','$name','$email','$password')";

        $result = mysqli_query($conn,$sql);

        if($result){
            $temp_profile = $_FILES['image']['tmp_name'];
            move_uploaded_file($temp_profile, "./uploads/".$_FILES["image"]["name"]);

            $_SESSION['success'] = "user Added";
            header('Location: ../../home/home.php');
        }else{
            die(mysqli_error($conn));
        }
    }
    
}



?>


