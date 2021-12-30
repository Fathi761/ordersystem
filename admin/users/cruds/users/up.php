<?php
session_start();
include "../../../../login/login-system/connection.php";

if(isset($_POST['update'])){
    $ID = $_POST['id'];
    $name= $_POST['name'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $usertype = $_POST['usertype'];

    $image = $_FILES['image']['name'];



    $result = mysqli_query($conn, "UPDATE `users` SET 
                                                    image= '$image',
                                                    name= '$name',
                                                    email= '$email',
                                                    password= '$password',
                                                    usertype = '$usertype'
                                                    
                                                    WHERE id= '$ID'");



    if($result){
        move_uploaded_file($_FILES['image']['tmp_name'],"../../../../login/login-system/uploads/".$_FILES['image']['name']);
        $_SESSION['success'] = ".$name.  updated";   
        header("Location: ../../user.php");
    }else{
       $_SESSION['status'] = ".$name. was not updated successfully";
       header("Location: ./update.php");
   }


}
?>