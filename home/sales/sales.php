<?php

include "../../login/login-system/connection.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="sales.css">
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


    <title>Sales Invoice</title>
</head>
<body>
<marquee behavior="scroll" direction="left" style="color: #ffff">Techno plus POS is a software company offering high quality POS solutions for Restaurants and Retail business sector.
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
          <li class="nav-item">
            <a class="nav-link active" href="../takeaway/takeaway.php"><i class="fas fa-utensils mr-2"></i>Take away</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="../delivery/delivery.php"><i class="fas fa-truck mr-2"></i>Deleivery</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link " href="../../../box/box.php"><i class="fas fa-mobile-alt mr-2"></i>Box</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="../tables.php"><i class="fas fa-th-list mr-2"></i>Tables</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../sales/sales.php"><i class="fas fa-money-check-alt mr-2"></i>Sales Invoice</a>
          </li>
          
          <li>
            
          </li>
        </ul>
      </div>
</nav>
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
            </tr>
            </tbody>
            <?php 
                
                }
                
            ?>
            
        </table>

        
    
</div>
</body>
</html>