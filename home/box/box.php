<?php

include "../../login/login-system/connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="../sales/sales.css">
    <link rel="stylesheet" href="box.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <title>BOX</title>
</head>
<body>
    <marquee behavior="scroll" direction="left" style="color: #000">Techno plus POS is a software company offering high quality POS solutions for Restaurants and Retail business sector.
    Head office Shwayfat runway center next byblos bank Contact @ 03 151 150</marquee>
    <nav class="navbar navbar-expand-md">
        <!-- Brand -->
        <a class="navbar-brand" href="../home.php"><i class="fas fa-mobile-alt mr-2"></i>&nbsp;&nbsp;Technoplus</a>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
            
            </ul>
        </div>
    </nav>

    <div class="hola">
        <?php
            $result2= mysqli_query($conn,"SELECT SUM(amount_LL) AS amount_LL FROM orders");

            $row = mysqli_fetch_assoc($result2); 
        ?>

        <p class="hoolaa">Total in L.L: <span> <?= number_format($row['amount_LL'],2); ?></span> L.L</p>
    </div>
    <div class="container">
                
            <table class="table">
                <thead>
                <tr>
                    <th>Number</th>
                    <th style="width: 200px">Date</th>
                    <th>Order</th>
                    <th style="width: 180px">Amount in USD</th>
                    <th style="width: 180px">Amount in L.L</th>
                    <th style="width: 400px">Products</th>
                    <th>
                        <a href="boxclosing.php?clear=all" class="badge-danger badge" ><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                    </th>
                    
                </tr>
                </thead>
                <tbody>
                    <?php
                        
                        $sql = "SELECT * FROM `orders`";
                        $result = mysqli_query($conn, $sql);
                        $total = 0;
                        while($row = mysqli_fetch_assoc($result)){
                        
                        
                    ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['number_table']; ?></td>
                    <td><?= number_format($row['amount_USD'],2); ?></td>
                    <td><?php echo $row['amount_LL']; ?></td>
                    <td><?php echo $row['products']; ?></td>
                    <td><a href="boxclosing.php?remove=<?= $row['id'] ?>" class="text-danger lead"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                </tbody>
                <?php   
                    }    
                ?>
                
            </table>
    </div>

    <button type="submit" name="submit" class="btn2 btn-primary" style="font-size: 25px; font-weight: 800;" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Close BOX </button>
        <?php
            $result= mysqli_query($conn,"SELECT SUM(amount_USD) AS totalsum FROM orders");

            $row = mysqli_fetch_assoc($result); 

            $result2= mysqli_query($conn,"SELECT SUM(amount_LL) AS amount_LL FROM orders");

            $row2 = mysqli_fetch_assoc($result2); 

        ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: #000">BOX Closing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./boxclosing.php" method="post">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label" style="color: #000">Total USD</label>
                    <input type="text"  class="form-control" id="recipient-name" value="<?= number_format($row['totalsum'],2); ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label" style="color: #000">Total L.L</label>
                    <input type="text"  class="form-control" id="recipient-name" value="<?= number_format($row2['amount_LL'],2); ?>" disabled>
                </div>
                
                <div class="modal-footer">
                    <input type="hidden" name="usd" value="<?= number_format($row['totalsum'],2); ?>">
                    <input type="hidden" name="lira" value="<?= number_format($row2['amount_LL'],2); ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save" class="btn btn-primary">Close Boxing</button>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</body>
</html>