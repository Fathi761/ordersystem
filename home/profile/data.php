<?php
session_start();

include "../../login/login-system/connection.php";


if(isset($_POST['save'])){
    
    $id = $_SESSION['id'];
    
    $name=$_POST['name'];
    $lname=$_POST['lname'];
    $mobile=$_POST['mobile'];
    $address_1=$_POST['add1'];
    $address_2=$_POST['add2'];
    $post_code=$_POST['post'];
    $state=$_POST['state'];
    $area=$_POST['area'];
    $city=$_POST['city'];
    $email=$_POST['email'];
    $password=$_POST['password'];

        
            $update = "UPDATE `users` SET 
                name = '$name',
                lname = '$lname',
                mobile = '$mobile',
                address_1 = '$address_1',
                address_2 = '$address_2',
                post_code = '$post_code',
                state = '$state',
                area = '$area',
                city = '$city',
                email = '$email',
                password = '$password'
        
        
            WHERE id='$id'";

            $sql2 = mysqli_query($conn, $sql2);

            if($sql2){
                header('Location: ../home.php');
            }else{
                header('Location: ./profile.php');
            }

    
    
    
    
    //     $sql = "UPDATE `users` SET 
    //         image = '$image',
    //         name = '$name',
    //         lname = '$lname',
    //         mobile = $mobile,
    //         address_1 = '$address_1',
    //         address_2 = '$address_2',
    //         post_code = $post_code,
    //         state = '$state',
    //         area = '$area',
    //         city = '$city',
    //         email = '$email',
    //         password = '$password'
        
        
    //         WHERE id='$id'";

    //     $result = mysqli_query($conn,$sql);

    //     if($result){
    //         $temp_profile = $_FILES['image']['tmp_name'];
    //         move_uploaded_file($temp_profile, "./uploads/".$_FILES["image"]["name"]);

    //         $_SESSION['success'] = "Profile Added";
    //         header('Location: ./profile.php');
    //     }else{
    //         die(mysqli_error($conn));
    //     }
    // }
    
}


?>