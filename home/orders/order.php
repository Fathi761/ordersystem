<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
</head>
<body>
    
    <?php
        include "../../login/login-system/connection.php";

        if(isset($_GET['id'])){
            $ID = $_GET['id'];

            $sql = "SELECT * FROM `orders` WHERE id = $ID";
            $result = mysqli_qurery($conn, $sql);

            foreach($result as $data){

       ?>

    <div class="main">
        <a href="../home.php" class="btn btn-warning"><i class="fas fa-long-arrow-alt-left"></i> Back</a>

        <div class="container">
            <div class="user">
            <h3>Order Management</h3>
            
                <form action="./up.php" method="post" class="form" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $data['id'];  ?>">

                        <div class="col-25">
                        <label for="totalquantity">Total Quantity</label>
                        </div>
                        <div class="col-25">
                            <input type="number" class="input" id="totalquantity"  value="<?php echo $data['total_quantity']; ?>" name="totalquantity" required><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="name">Subtotal in $</label>
                        </div>
                        <div class="col-75">
                        <input type="number" class="input" id="subtotal"  value="<?php echo $data['subtotal_$']; ?>" name="subtotal" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="currency">Subtotal in L.L</label>
                        </div>
                        <div class="col-75">
                        <input type="number" class="input" id="currency" value="<?php echo $data['subtotal_LL']; ?>" name="currency" required>
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