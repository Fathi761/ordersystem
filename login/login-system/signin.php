<?php
session_start();
include "./connection.php";
if(isset($_POST['submit'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $pass = validate($_POST['password']);

    if(empty($name)){
        header("Location: ../login.php?error=Name is required");
        exit();
    }else if(empty($pass)){
        header("Location: ../login.php?error=Password is required");
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE name='$name' AND password='$pass'";

        $result = mysqli_query($conn,$sql);

        $row = mysqli_fetch_array($result); 

        if($row['usertype'] == "user"){
            if($row['name'] === $name && $row['password'] === $pass){
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];

                header("Location: ../../home/home.php");
                exit();
            }else{
                header("Location: ../login.php?error=Incorrect Name or Password!");
                exit();
            }
        }else if($row['usertype'] == "admin"){
            if($row['name'] === $name && $row['password'] === $pass){
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];

                header("Location: ../../admin/admin.php");
                exit();
            }else{
                header("Location: ../login.php?error=Incorrect Name or Password!");
                exit();
            }
            
        }else{
            header("Location: ../login.php");
            exit();
        }
    }
    
}else{
    header("Location: ../login.php");
    exit();
}

?>