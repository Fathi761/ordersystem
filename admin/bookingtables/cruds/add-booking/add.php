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

    <title>Add Booking Table</title>
</head>
<body>
<div class="main">
<a href="../../booking.php" class="btn btn-warning"><i class="fas fa-long-arrow-alt-left"></i> Back</a>

        <div class="container">
            <div class="user">
            <h3>Add Booking Table Management</h3>
            
                <form action="./data.php" method="post" class="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-25">
                        <label for="fname">First name</label>
                        </div>
                        <div class="col-75">
                        <input type="text" class="input" id="fname" name="fname" placeholder="First Name.." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="name">Last Name</label>
                        </div>
                        <div class="col-75">
                        <input type="text" class="input" id="lname" name="lname" placeholder="Last Name.." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="phone">phone</label>
                        </div>
                        <div class="col-75">
                        <input type="number" class="input" id="phone" name="phone" placeholder=" Phone Number.." required>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-25">
                        <label for="members">Members</label>
                        </div>
                        <div class="col-75">
                        <input type="number" class="input" id="members" name="members" placeholder="Members..." required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                        <label for="date">Date</label>
                        </div>
                        <div class="col-75">
                        <input type="datetime-local" class="input" id="date" name="date" placeholder="Date" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                        <label for="information">Information</label>
                        </div>
                        <div class="col-75">
                        <input type="text" class="input" id="information" name="information" placeholder="Information about the reservation." required>
                        </div>
                    </div>

                     
                    
                    <div class="btn">
                    <button type="submit" class="btn2 btn-primary" name="submit" onclick="myFunction()"><i class="fas fa-sign-in-alt"></i> Submit</button>
                </div>

                <script>
                function myFunction() {
                  alert("Hello! Your reservation have been sent successfully");
                }
              </script>
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