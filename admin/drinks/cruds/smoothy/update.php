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
    
    $sql = "SELECT * FROM `juice` WHERE id= $ID";
    $result = mysqli_query($conn, $sql);
    
    foreach($result as $data){


?>

<div class="main">
<a href="../../smoothies.php" class="btn btn-warning"><i class="fas fa-long-arrow-alt-left"></i> Back</a>

        <div class="container">
            <div class="user">
            <h3>Smoothy Drinks Management</h3>
            
                <form action="./up.php" method="post" class="form" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $data['id'];  ?>">

                        <div class="col-25">
                        <label for="image">Image</label>
                        </div>
                        <div class="col-25">
                            <input type="file" class="input" id="image"  value="<?php echo $data['image']; ?>" name="image" ><br>
                            <img src="<?php echo "../../smoothy/add-smoothy/uploads/".$data['image']; ?>" width="50px" height="50px">

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
                        <label for="price">Price</label>
                        </div>
                        <div class="col-75">
                            <input type="text" class="input" id="price"  placeholder=" Price.." value="<?php echo $data['price']; ?>" name="price" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="quantity">Quantity</label>
                        </div>
                        <div class="col-75">
                            <input type="number" class="input" id="quantity"  placeholder=" Quantity.." value="<?php echo $data['quantity']; ?>" name="quantity" disabled>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-25">
                        <label for="price">Description</label>
                        </div>
                        <div class="col-75">
                        <input type="text" class="input" id="description"  placeholder="Description..." value="<?php echo $data['description']; ?>" name="description" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                        <label for="product_code">Product code</label>
                        </div>
                        <div class="col-75">
                        <input type="text" class="input" id="product_code"  placeholder="Product code..." value="<?php echo $data['product_code']; ?>" name="product_code" required>
                        </div>
                    </div>

                     
                    
                    <div class="btn">
                        <a href="../../smoothies.php" class="btn btn-danger">Cancel</a>
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