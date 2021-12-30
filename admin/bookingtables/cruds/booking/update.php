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
    
    $sql = "SELECT * FROM `booking` WHERE id= $ID";
    $result = mysqli_query($conn, $sql);
    
    foreach($result as $data){


?>

<div class="main">
<a href="../../booking.php" class="btn btn-warning"><i class="fas fa-long-arrow-alt-left"></i> Back</a>

        <div class="container">
            <div class="user">
            <h3>Booking Management</h3>
            
                <form action="./up.php" method="post" class="form" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $data['id'];  ?>">

                        <div class="col-25">
                        <label for="fname">First Name</label>
                        </div>
                        <div class="col-25">
                            <input type="text" class="input" id="fname"  value="<?php echo $data['firstname']; ?>" placeholder="Last Name.." name="fname" required><br>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="lname">Last Name</label>
                        </div>
                        <div class="col-75">
                        <input type="text" class="input" id="lname"  value="<?php echo $data['lastname']; ?>" placeholder="Last Name.." name="lname" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="phone">Phone Number</label>
                        </div>
                        <div class="col-75">
                        <input type="number" class="input" id="phone"  placeholder=" Phone Number.." value="<?php echo $data['phone']; ?>" name="phone" required>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-25">
                        <label for="members">Members</label>
                        </div>
                        <div class="col-75">
                        <input type="number" class="input" id="members"  placeholder="Members..." value="<?php echo $data['members']; ?>" name="members" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                        <label for="date">Date</label>
                        </div>
                        <div class="col-75">
                        <input type="datetime-local" class="input" id="date"  placeholder="Date..." value="<?php echo $data['date']; ?>" name="date" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="information">Information</label>
                        </div>
                        <div class="col-75">
                        <input type="text" class="input" id="information"  placeholder="Information..." value="<?php echo $data['information']; ?>" name="information" required>
                        </div>
                    </div>

                     
                    
                    <div class="btn">
                        <a href="../../booking.php" class="btn btn-danger">Cancel</a>
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