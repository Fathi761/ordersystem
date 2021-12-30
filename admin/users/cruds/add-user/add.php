<?php 
session_start();
include "../../../../login/login-system/connection.php";

if (isset($_SESSION['id']) && isset($_SESSION['name'])){

           



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/add.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Add User</title>
</head>
<body>
<div class="main">
<a href="../../user.php" class="btn btn-warning"><i class="fas fa-long-arrow-alt-left"></i> Back</a>

        <div class="container">
            <div class="user">
            <h3>Add User Management</h3>
            
                <form action="./data.php" method="post" class="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-25">
                        <label for="image">Image</label>
                        </div>
                        <div class="col-75">
                        <input type="file" class="input" id="image" name="image" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="name">Name</label>
                        </div>
                        <div class="col-75">
                        <input type="text" class="input" id="name" name="name" placeholder="Name.." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="email">email</label>
                        </div>
                        <div class="col-75">
                        <input type="email" class="input" id="email" name="email" placeholder=" Email.." required>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-25">
                        <label for="password">Password</label>
                        </div>
                        <div class="col-75">
                        <input type="number" class="input" id="password" name="password" placeholder="password..." required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                        <label for="usertype">User_type</label>
                        </div>
                        <div class="col-75">
                        <input type="text" class="input" id="usertype" name="usertype" placeholder="Usertype it will be user or admin only" required>
                        </div>
                    </div>

                     
                    
                    <div class="btn">
                    <button type="submit" class="btn2 btn-primary" name="submit"><i class="fas fa-sign-in-alt"></i> Submit</button>
                </div>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>


<?php
}else{
    header("Location: ../../../login/login.php");
    exit();
}
?>