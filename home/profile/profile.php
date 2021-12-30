<?php 
session_start();
include "../../login/login-system/connection.php";

if (isset($_SESSION['id']) && isset($_SESSION['name'])){

    $name = $_SESSION['name'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Profile User</title>
</head>
<body>
    <div class="main">

    <?php
        $sql= "SELECT * FROM `users` WHERE name='$name'";
        $result = mysqli_query($conn, $sql);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                            

    ?>
        

        <form action="./data.php" method="post" class="form" enctype="multipart/form-data">             
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="<?php echo "./uploads/".$row['image']; ?>">
                        <span class="font-weight-bold"><?php echo $row['name']; ?></span><span class="text-black-50"><?php echo $row['email']; ?></span><span> </span>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" name="name" placeholder="first name" value="<?php echo $row['name']; ?>"></div>
                            <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" name="lname" value="<?php echo $row['lname']; ?>" placeholder="Last name"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="number" class="form-control" name="mobile" placeholder="enter phone number" value="<?php echo $row['mobile']; ?>"></div>
                            <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" name="add1" placeholder="enter address line 1" value="<?php echo $row['address_1']; ?>"></div>
                            <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" name="add2" placeholder="enter address line 2" value="<?php echo $row['address_2']; ?>"></div>
                            <div class="col-md-12"><label class="labels">Postcode</label><input type="number" class="form-control" name="post" placeholder="enter postcode" value="<?php echo $row['post_code']; ?>"></div>
                            <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" name="state" placeholder="enter state" value="<?php echo $row['state']; ?>"></div>
                            <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" name="area" placeholder="enter area" value="<?php echo $row['area']; ?>"></div>
                            <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" name="email" placeholder="enter email id" value="<?php echo $row['email']; ?>"></div>
                            <div class="col-md-12"><label class="labels">Password</label><input type="number" class="form-control" name="password" placeholder="enter email id" value="<?php echo $row['password']; ?>"></div>
                            <!-- <div class="col-md-12"><label class="labels">Password</label><input type="file" class="form-control" name="image" placeholder="" value=""></div> -->

                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">City</label><input type="text" class="form-control" name="city" placeholder="city" value="<?php echo $row['city']; ?>"></div>
                            <!-- <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" name="state" placeholder="state" value="<?php echo $row['state']; ?>" ></div> -->
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit" name="save">Save Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
                }
            }
        ?>
    </div>
</body>
</html>


<?php
}else{
    header("Location: ../../login/login.php");
    exit();
}
?>