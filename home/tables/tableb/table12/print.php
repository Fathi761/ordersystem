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
    <link rel="stylesheet" href="print.css">
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

    <title>Print Page</title>
</head>
<body>
<div class="rightsidebar">
        <div class="container">
          
            <div style="display:<?php if (isset($_SESSION['showAlert'])) {
                echo $_SESSION['showAlert'];
                } else {
                echo 'none';
                } unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><?php if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                } unset($_SESSION['showAlert']); ?></strong>
            </div>
            <div class="table-responsive mt-2">
              <table class="table">
                <thead>
                  <tr>
                    <td colspan="7">
                      <h4 class="text-center text-info m-0">Items in your cart!</h4>
                    </td>
                  </tr>
                  <tr>
                    
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                    

                    $stmt = $conn->prepare('SELECT * FROM cart5');
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $grand_total = 0;
                    $total = 0;
                    $curr = 15000;
                    $allItems = '';
                    $items = [];
                    while ($row = $result->fetch_assoc()):
                  ?>
                  <tr>
                    
                    <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                    <!-- <td><img src="<?= $row['image'] ?>" width="50"></td> -->
                    <td><?= $row['name'] ?></td>
                    <td>
                      <i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($row['price'],2); ?>
                    </td>
                    <input type="hidden" class="pprice" value="<?= $row['price'] ?>">
                    <td>
                      <input type="number" class="form-control itemQty" value="<?= $row['quantity'] ?>" style="width:60px;" disabled>
                    </td>
                    <td><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($row['total_price'],2); ?></td>
                    
                  </tr>
                  <?php 
                  
                    $grand_total += $row['total_price'];
                    $total = $grand_total * $curr;
                    $items[] = $row['name'];
                    $allItems = implode(', ', $items);
                  
                  ?>
                  <?php endwhile; ?>
                  
                      <tr>
                        <td colspan="2">
                            <input type="hidden" name="products" value="<?= $allItems; ?>">
                            <input type="hidden" name="grand_total" id="input" class="form-control" value="<?= number_format($grand_total,2); ?>">
                            <input type="hidden" name="currency" id="input" class="form-control" value="<?= number_format($total,2); ?>">
                            <input type="hidden" name="table" id="input" class="form-control" value="table12">

                        </td>
                        <td colspan="1"><b>Grand Total</b></td>
                        <td><b><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
                        
                      </tr>

                      <tr>
                        <td colspan="2">
                        </td>
                        
                        <td colspan="1"><b>Total in L.L</b></td>
                        <td><b><?= number_format($total,2); ?></b></td>
                        
                      </tr>

                </tbody>
              </table>

              <div class="man">
                <div class="info">
                    <label>Customer Name:</label>
                    <input type="text" name="name" placeholder="Customer name">
                </div><br>
                <div class="info">
                    <label>Phone number:</lab>
                    <input type="text" name="phone" placeholder="Phone number...">
                </div><br>
                <div class="info">
                    <label>Address:</label>
                    <textarea type="text" name="address"rows="4" cols="50" placeholder="Address info..."> </textarea>
                </div><br>
              </div>
          
        </div>
      </div>
    </div>
</body>
</html>
<?php
}else{
    header("Location: ../login/login.php");
    exit();
}
?>