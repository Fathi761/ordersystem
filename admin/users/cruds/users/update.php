<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/add.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
    <title>Update</title>
</head>
<body>

<?php

include "../../../../login/login-system/connection.php";

if(isset($_GET['id'])){
    $ID = $_GET['id'];
    
    $sql = "SELECT * FROM `users` WHERE id= $ID";
    $result = mysqli_query($conn, $sql);
    
    foreach($result as $data){


?>

<div class="main">
<a href="../../user.php" class="btn btn-warning"><i class="fas fa-long-arrow-alt-left"></i> Back</a>

        <div class="container">
            <div class="user">
            <h3>Users Management</h3>
            
                <form action="./up.php" method="post" class="form" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $data['id'];  ?>">

                        <div class="col-25">
                        <label for="image">Image</label>
                        </div>
                        <div class="col-25">
                            <input type="file" class="input" id="image"  value="<?php echo $data['image']; ?>" name="image" required><br>
                            <img src="<?php echo "../../../../login/login-system/uploads/".$data['image']; ?>" width="50px" height="50px">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="name">Name</label>
                        </div>
                        <div class="col-75">
                        <input type="text" class="input" id="name"  value="<?php echo $data['name']; ?>" placeholder=" Name.." name="name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="price">Email</label>
                        </div>
                        <div class="col-75">
                        <input type="email" class="input" id="email"  placeholder=" Email.." value="<?php echo $data['email']; ?>" name="email" required>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-25">
                        <label for="password">Password</label>
                        </div>
                        <div class="col-75">
                        <input type="number" class="input" id="password"  placeholder="Password..." value="<?php echo $data['password']; ?>" name="password" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                        <label for="usertype">User Type</label>
                        </div>
                        <div class="col-75">
                        <input type="text" class="input" id="usertype"  placeholder="Usertype..." value="<?php echo $data['usertype']; ?>" name="usertype" required>
                        </div>
                    </div>

                     
                    
                    <div class="btn">
                        <a href="../../user.php" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-success" name="update"><i class="fas fa-sign-in-alt"></i> Update</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <?php
    }
    }
    ?>
</body>
</html>