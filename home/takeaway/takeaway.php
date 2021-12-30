<?php 
session_start();

include "../../login/login-system/connection.php";

if (isset($_SESSION['id']) && isset($_SESSION['name'])){


?>


<!DOCTYPE html>
<html lang="en">
<head>
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


  
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="jquery.nice-number.css">
    <title>Takeaway</title>
</head>
<body>

<marquee behavior="scroll" direction="left" style="color: #ffff">Techno plus POS is a software company offering high quality POS solutions for Restaurants and Retail business sector.
  Head office Shwayfat runway center next byblos bank Contact @ 03 151 150</marquee>
  <nav class="navbar navbar-expand-md">
      <!-- Brand -->
      <a class="navbar-brand" href="../home.php"><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;Technoplus</a>
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
            <a class="nav-link" href="#"><i class="fas fa-mobile-alt mr-2"></i>Box</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="../tables/tables.php"><i class="fas fa-th-list mr-2"></i>Tables</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../sales/sales.php"><i class="fas fa-money-check-alt mr-2"></i>Sales Invoice</a>
          </li>
          
          <li>
            
          </li>
        </ul>
      </div>
    </nav>

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
              <table class="table  text-center">
                <thead>
                  <tr>
                    <td colspan="7">
                      <h4 class="text-center text-info m-0">Items in your cart!</h4>
                    </td>
                  </tr>
                  <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>
                      <a href="pay.php?clear=all" class="badge-danger badge" ><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    

                    $stmt = $conn->prepare('SELECT * FROM takeaway');
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
                    <td><?= $row['id'] ?></td>
                    <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                    <!-- <td><img src="<?= $row['image'] ?>" width="50"></td> -->
                    <td><?= $row['name'] ?></td>
                    <td>
                      <i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($row['price'],2); ?>
                    </td>
                    <input type="hidden" class="pprice" value="<?= $row['price'] ?>">
                    <td>
                      <input type="number" class="form-control itemQty" value="<?= $row['quantity'] ?>" style="width:60px;">
                    </td>
                    <td><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($row['total_price'],2); ?></td>
                    <td>
                      <a href="pay.php?remove=<?= $row['id'] ?>" class="text-danger lead" ><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                  <?php 
                  
                    $grand_total += $row['total_price'];
                    $total = $grand_total * $curr;
                    $items[] = $row['name'];
                    $allItems = implode(', ', $items);
                  
                  ?>
                  <?php endwhile; ?>
                  <form action="./check.php" method="post">
                      <tr>
                        <td colspan="2">
                            <input type="hidden" name="products" value="<?= $allItems; ?>">
                            <input type="hidden" name="grand_total" id="input" class="form-control" value="<?= number_format($grand_total,2); ?>">
                            <input type="hidden" name="currency" id="input" class="form-control" value="<?= number_format($total,2); ?>">
                            <input type="hidden" name="table" id="input" class="form-control" value="takeaway">

                        </td>
                        <td colspan="2"><b>Grand Total</b></td>
                        <td><b><i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
                        <td>
                        </td>
                      </tr>

                      <tr>
                        <td colspan="2">
                        </td>
                        <td colspan="2"><b>Total in L.L</b></td>
                        <td><b><?= number_format($total,2); ?></b></td>
                        <td>
                          <button type="submit" name="submit" class="btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>" onclick="myFunction()"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Save order</button>
                        </td>
                      </tr>

                      <script>
                          function myFunction() {
                              alert("Hello! Your order have been saved successfully. You can reset the bill now by clearing all items.");
                              resetBill();
                          }
                          function resetBill(){
                              $allItems = '';
                          }
                      </script>
                    </form>
                </tbody>
              </table>
          
        </div>
      </div>
    </div>

    <div class="left">
      <ul class="controls">
        <li class="buttons button-active" data-filter="all">
          <img src="../uploads/drinkss.jpg" alt="" class="img_list"><br>
          Drinks</li>
        <li class="buttons" data-filter="hot" id="hot">
          <img src="../uploads/hot11.jpg" alt="" class="img_list"><br>
          Hot</li>
        <li class="buttons" data-filter="cold" id="cold">
          <img src="../uploads/cold drinks.png" alt="" class="img_list"><br>
          Cold</li>
        <li class="buttons" data-filter="juice">
          <img src="../uploads/juice.png" alt="" class="img_list"><br>
          Smoothies</li>
        <li class="buttons" data-filter="speciality" id="speciality">
          <img src="../uploads/speciality.jpg" alt="" class="img_list"><br>
          Speciality</li>
          <li class="buttons" data-filter="burger">
            <img src="../foods/images/barger.jpg" alt="" class="img_list"><br>
              Burger</li>
          <li class="buttons" data-filter="fries">
            <img src="../foods/images/fries.jpg" alt="" class="img_list"><br>
            Fries</li>
          <li class="buttons" data-filter="salad">
            <img src="../foods/images/salad.png" alt="" class="img_list"><br>
            Salad</li>
          <li class="buttons" data-filter="sandwich">
            <img src="../foods/images/sandwish.jpg" alt="" class="img_list"><br>
            Sandwich</li>
          <li class="buttons" data-filter="shawrma">
            <img src="../foods/images/shawarma.png" alt="" class="img_list"><br>
            Shawrma</li>
          <li class="buttons" data-filter="sub">
            <img src="../foods/images/plates.jpg" alt="" class="img_list"><br>
            Plates</li>
          <li class="buttons" data-filter="falafel">
            <img src="../foods/images/falafel.jpg" alt="" class="img_list"><br>
            Falafel</li>
        </ul>
    
    
        <section class="drinks" id="drinks">
          <!-- Displaying Hot Start -->
          <div class="container">
            <div id="message"></div>
            <div class="image hot">
            <div class="row">
              <?php
                
                $stmt = $conn->prepare('SELECT * FROM hot');
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()):
              ?>
              <div class="col-sm-6 col-md-3 col-lg-2">
              <form action="" class="form-submit">
                <div class="card-deck">
                  <div class="card">
                    <button class="addItemBtn">
                      <img src="<?php echo "../../admin/drinks/hot/add-hot/uploads/".$row['image']; ?>" class="card-img-top" height="120px" width="400px">
                    </button>
                    <div class="card-body p-1">
                      <h6 class="card-title text-center "><?php echo  $row['name'] ?></h6>
                      <h6 class="card-text text-center "><i class="fas fa-dollar-sign"></i>&nbsp;<?php echo number_format($row['price'],2) ?></h6>

                    </div>
                    <div class="card-footer p-1">
                        <input type="hidden" class="pid" value="<?php echo $row['id'] ?>">
                        <input type="hidden" class="pimage" value="<?php echo $row['image'] ?>">
                        <input type="hidden" class="pname" value="<?php echo $row['name'] ?>">
                        <input type="hidden" class="pprice" value="<?php echo $row['price'] ?>">
                        <input type="hidden" class="pcode" value="<?php echo $row['product_code'] ?>">
                        <input type="hidden" class="form-control pquantity" value="<?= $row['quantity'] ?>">
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
            </div>
            </div>
          </div>
          <!-- Displaying Hot End -->

          <!-- Displaying Cold Start -->
          <div class="container">
            <div id="message"></div>
            <div class="image cold">
            <div class="row">
              <?php
                
                $stmt = $conn->prepare('SELECT * FROM cold');
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()):
              ?>
              <div class="col-sm-6 col-md-3 col-lg-2">
              <form action="" class="form-submit">
                <div class="card-deck">
                  <div class="card">
                    <button class="addItemBtn">
                      <img src="<?php echo "../../admin/drinks/cold/add-cold/uploads/".$row['image']; ?>" class="card-img-top" height="120px" width="400px">
                    </button>
                    <div class="card-body p-1">
                      <h6 class="card-title text-center "><?php echo  $row['name'] ?></h6>
                      <h6 class="card-text text-center "><i class="fas fa-dollar-sign"></i>&nbsp;<?php echo number_format($row['price'],2) ?></h6>

                    </div>
                    <div class="card-footer p-1">
                        <input type="hidden" class="pid" value="<?php echo $row['id'] ?>">
                        <input type="hidden" class="pimage" value="<?php echo $row['image'] ?>">
                        <input type="hidden" class="pname" value="<?php echo $row['name'] ?>">
                        <input type="hidden" class="pprice" value="<?php echo $row['price'] ?>">
                        <input type="hidden" class="pcode" value="<?php echo $row['product_code'] ?>">
                        <input type="hidden" class="form-control pquantity" value="<?= $row['quantity'] ?>">
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
            </div>
            </div>
          </div>
          <!-- Displaying Cold End -->

          <!-- Displaying Smoothy Start -->
          <div class="container">
            <div id="message"></div>
            <div class="image smoothy">
            <div class="row ">
              <?php
                
                $stmt = $conn->prepare('SELECT * FROM juice');
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()):
              ?>
              <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
              <form action="" class="form-submit">
                <div class="card-deck">
                  <div class="card">
                    <button class="addItemBtn">
                      <img src="<?php echo "../../admin/drinks/smoothy/add-smoothy/uploads/".$row['image']; ?>" class="card-img-top" height="120px">
                    </button>
                    <div class="card-body p-1">
                      <h4 class="card-title text-center"><?php echo  $row['name'] ?></h4>
                      <h5 class="card-text text-center "><i class="fas fa-dollar-sign"></i>&nbsp;<?php echo number_format($row['price'],2) ?></h5>

                    </div>
                    <div class="card-footer p-1">
                    
                        <input type="hidden" class="pid" value="<?php echo $row['id'] ?>">
                        <input type="hidden" class="pimage" value="<?php echo $row['image'] ?>">
                        <input type="hidden" class="pname" value="<?php echo $row['name'] ?>">
                        <input type="hidden" class="pprice" value="<?php echo $row['price'] ?>">
                        <input type="hidden" class="pcode" value="<?php echo $row['product_code'] ?>">
                        <input type="hidden" class="form-control pquantity" value="<?= $row['quantity'] ?>">
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
              </div>
            </div>
          </div>
          <!-- Displaying Smoothy End -->

          <!-- Displaying Speciality Start -->
          <div class="container">
            <div id="message"></div>
            <div class="image speciality">
            <div class="row">
              <?php
                
                $stmt = $conn->prepare('SELECT * FROM speciality');
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()):
              ?>
              <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
              <form action="" class="form-submit">
                <div class="card-deck">
                  <div class="card">
                    <button class="addItemBtn">
                      <img src="<?php echo "../../admin/drinks/speciality/add-speciality/uploads/".$row['image']; ?>" class="card-img-top" height="120px">
                    </button>
                    <div class="card-body p-1">
                      <h6 class="card-title text-center"><?php echo  $row['name'] ?></h6>
                      <h6 class="card-text text-center "><i class="fas fa-dollar-sign"></i>&nbsp;<?php echo number_format($row['price'],2) ?></h6>

                    </div>
                    <div class="card-footer p-1">
                      
                        
                        <input type="hidden" class="pid" value="<?php echo $row['id'] ?>">
                        <input type="hidden" class="pimage" value="<?php echo $row['image'] ?>">
                        <input type="hidden" class="pname" value="<?php echo $row['name'] ?>">
                        <input type="hidden" class="pprice" value="<?php echo $row['price'] ?>">
                        <input type="hidden" class="pcode" value="<?php echo $row['product_code'] ?>">
                        <input type="hidden" class="form-control pquantity" value="<?= $row['quantity'] ?>">
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
              </div>
            </div>
          </div>
          <!-- Displaying Speciality End -->

          <!-- Displaying Burger Start -->
          <div class="container">
            <div id="message"></div>
            <div class="image burger">
            <div class="row">
              <?php
                
                $stmt = $conn->prepare('SELECT * FROM burger');
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()):
              ?>
              <div class="col-sm-6 col-md-3 col-lg-2">
              <form action="" class="form-submit">
                <div class="card-deck">
                  <div class="card">
                    <button class="addItemBtn">
                      <img src="<?php echo "../../admin/foods/burger/add-burger/uploads/".$row['image']; ?>" class="card-img-top" height="120px" width="400px">
                    </button>
                    <div class="card-body p-1">
                      <h6 class="card-title text-center"><?php echo  $row['name'] ?></h6>
                      <h6 class="card-text text-center"><i class="fas fa-dollar-sign"></i>&nbsp;<?php echo number_format($row['price'],2) ?></h6>

                    </div>
                    <div class="card-footer p-1">
                        <input type="hidden" class="pid" value="<?php echo $row['id'] ?>">
                        <input type="hidden" class="pimage" value="<?php echo $row['image'] ?>">
                        <input type="hidden" class="pname" value="<?php echo $row['name'] ?>">
                        <input type="hidden" class="pprice" value="<?php echo $row['price'] ?>">
                        <input type="hidden" class="pcode" value="<?php echo $row['product_code'] ?>">
                        <input type="hidden" class="form-control pquantity" value="<?= $row['quantity'] ?>">
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
            </div>
            </div>
          </div>
          <!-- Displaying Burger End -->

          <!-- Displaying Fries Start -->
          <div class="container">
            <div id="message"></div>
            <div class="image fries">
            <div class="row">
              <?php
                
                $stmt = $conn->prepare('SELECT * FROM fries');
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()):
              ?>
              <div class="col-sm-6 col-md-3 col-lg-2">
              <form action="" class="form-submit">
                <div class="card-deck">
                  <div class="card">
                    <button class="addItemBtn">
                      <img src="<?php echo "../../admin/foods/fries/add-fries/uploads/".$row['image']; ?>" class="card-img-top" height="120px" width="400px">
                    </button>
                    <div class="card-body p-1">
                      <h6 class="card-title text-center"><?php echo  $row['name'] ?></h6>
                      <h6 class="card-text text-center"><i class="fas fa-dollar-sign"></i>&nbsp;<?php echo number_format($row['price'],2) ?></h6>

                    </div>
                    <div class="card-footer p-1">
                        <input type="hidden" class="pid" value="<?php echo $row['id'] ?>">
                        <input type="hidden" class="pimage" value="<?php echo $row['image'] ?>">
                        <input type="hidden" class="pname" value="<?php echo $row['name'] ?>">
                        <input type="hidden" class="pprice" value="<?php echo $row['price'] ?>">
                        <input type="hidden" class="pcode" value="<?php echo $row['product_code'] ?>">
                        <input type="hidden" class="form-control pquantity" value="<?= $row['quantity'] ?>">
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
            </div>
            </div>
          </div>
          <!-- Displaying Fries End -->

          <!-- Displaying Salad Start -->
          <div class="container">
            <div id="message"></div>
            <div class="image salad">
            <div class="row">
              <?php
                
                $stmt = $conn->prepare('SELECT * FROM salad');
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()):
              ?>
              <div class="col-sm-6 col-md-3 col-lg-2">
              <form action="" class="form-submit">
                <div class="card-deck">
                  <div class="card">
                    <button class="addItemBtn">
                      <img src="<?php echo "../../admin/foods/salad/add-salad/uploads/".$row['image']; ?>" class="card-img-top" height="120px" width="400px">
                    </button>
                    <div class="card-body p-1">
                      <h6 class="card-title text-center"><?php echo  $row['name'] ?></h6>
                      <h6 class="card-text text-center"><i class="fas fa-dollar-sign"></i>&nbsp;<?php echo number_format($row['price'],2) ?></h6>

                    </div>
                    <div class="card-footer p-1">
                        <input type="hidden" class="pid" value="<?php echo $row['id'] ?>">
                        <input type="hidden" class="pimage" value="<?php echo $row['image'] ?>">
                        <input type="hidden" class="pname" value="<?php echo $row['name'] ?>">
                        <input type="hidden" class="pprice" value="<?php echo $row['price'] ?>">
                        <input type="hidden" class="pcode" value="<?php echo $row['product_code'] ?>">
                        <input type="hidden" class="form-control pquantity" value="<?= $row['quantity'] ?>">
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
            </div>
            </div>
          </div>
          <!-- Displaying Salad End -->

          
          <!-- Displaying Sandwich Start -->
          <div class="container">
            <div id="message"></div>
            <div class="image sandwich">
            <div class="row">
              <?php
                
                $stmt = $conn->prepare('SELECT * FROM sandwich');
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()):
              ?>
              <div class="col-sm-6 col-md-3 col-lg-2">
              <form action="" class="form-submit">
                <div class="card-deck">
                  <div class="card">
                    <button class="addItemBtn">
                      <img src="<?php echo "../../admin/foods/sandwich/add-sandwich/uploads/".$row['image']; ?>" class="card-img-top" height="120px" width="400px">
                    </button>
                    <div class="card-body p-1">
                      <h6 class="card-title text-center"><?php echo  $row['name'] ?></h6>
                      <h6 class="card-text text-center"><i class="fas fa-dollar-sign"></i>&nbsp;<?php echo number_format($row['price'],2) ?></h6>

                    </div>
                    <div class="card-footer p-1">
                        <input type="hidden" class="pid" value="<?php echo $row['id'] ?>">
                        <input type="hidden" class="pimage" value="<?php echo $row['image'] ?>">
                        <input type="hidden" class="pname" value="<?php echo $row['name'] ?>">
                        <input type="hidden" class="pprice" value="<?php echo $row['price'] ?>">
                        <input type="hidden" class="pcode" value="<?php echo $row['product_code'] ?>">
                        <input type="hidden" class="form-control pquantity" value="<?= $row['quantity'] ?>">
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
            </div>
            </div>
          </div>
          <!-- Displaying Sandwich End -->

           <!-- Displaying Shawrma Start -->
           <div class="container">
            <div id="message"></div>
            <div class="image shawrma">
            <div class="row">
              <?php
                
                $stmt = $conn->prepare('SELECT * FROM shawrma');
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()):
              ?>
              <div class="col-sm-6 col-md-3 col-lg-2">
              <form action="" class="form-submit">
                <div class="card-deck">
                  <div class="card">
                    <button class="addItemBtn">
                      <img src="<?php echo "../../admin/foods/shawrma/add-shawrma/uploads/".$row['image']; ?>" class="card-img-top" height="120px" width="400px">
                    </button>
                    <div class="card-body p-1">
                      <h6 class="card-title text-center"><?php echo  $row['name'] ?></h6>
                      <h6 class="card-text text-center "><i class="fas fa-dollar-sign"></i>&nbsp;<?php echo number_format($row['price'],2) ?></h6>

                    </div>
                    <div class="card-footer p-1">
                        <input type="hidden" class="pid" value="<?php echo $row['id'] ?>">
                        <input type="hidden" class="pimage" value="<?php echo $row['image'] ?>">
                        <input type="hidden" class="pname" value="<?php echo $row['name'] ?>">
                        <input type="hidden" class="pprice" value="<?php echo $row['price'] ?>">
                        <input type="hidden" class="pcode" value="<?php echo $row['product_code'] ?>">
                        <input type="hidden" class="form-control pquantity" value="<?= $row['quantity'] ?>">
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
            </div>
            </div>
          </div>
          <!-- Displaying Shawrma End -->

          <!-- Displaying Falafel Start -->
          <div class="container">
            <div id="message"></div>
            <div class="image falafel">
            <div class="row">
              <?php
                
                $stmt = $conn->prepare('SELECT * FROM falafel');
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()):
              ?>
              <div class="col-sm-6 col-md-3 col-lg-2">
              <form action="" class="form-submit">
                <div class="card-deck">
                  <div class="card">
                    <button class="addItemBtn">
                      <img src="<?php echo "../../admin/foods/falafel/add-falafel/uploads/".$row['image']; ?>" class="card-img-top" height="120px" width="400px">
                    </button>
                    <div class="card-body p-1">
                      <h6 class="card-title text-center"><?php echo  $row['name'] ?></h6>
                      <h6 class="card-text text-center"><i class="fas fa-dollar-sign"></i>&nbsp;<?php echo number_format($row['price'],2) ?></h6>

                    </div>
                    <div class="card-footer p-1">
                        <input type="hidden" class="pid" value="<?php echo $row['id'] ?>">
                        <input type="hidden" class="pimage" value="<?php echo $row['image'] ?>">
                        <input type="hidden" class="pname" value="<?php echo $row['name'] ?>">
                        <input type="hidden" class="pprice" value="<?php echo $row['price'] ?>">
                        <input type="hidden" class="pcode" value="<?php echo $row['product_code'] ?>">
                        <input type="hidden" class="form-control pquantity" value="<?= $row['quantity'] ?>">
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
            </div>
            </div>
          </div>
          <!-- Displaying Falafel End -->
        </section>
    </div>
   
</body>
</html>

<!-- this script for the leftsidebar -->
<script>
  $('.drink-btn').click(function(){
    $('.leftsidebar ul .drink-show').toggleClass("show");
    $('.leftsidebar ul .first').toggleClass("rotate");
  });

  $('.food-btn').click(function(){
    $('.leftsidebar ul .food-show').toggleClass("show1");
    $('.leftsidebar ul .second').toggleClass("rotate");
  });

  $('.leftsidebar ul li').click(function(){
    $(this).addClass("active").siblings().removeClass("active");
  });
</script>
<!-- <script src="./calculator.js"></script> -->
<!-- <script src="./jquery.nice-number.js"></script> -->
<!-- <script src="./credit-card.js"></script> -->
<!-- <script>
  $(function(){
  $('input[type="number"]').niceNumber();
});
</script> -->


<script>
  $(document).ready(function(){
    $('.controls .buttons').click(function(){

      $(this).addClass('button-active').siblings().removeClass('button-active');

      let filter = $(this).attr('data-filter');
      if(filter == 'all'){
          $('.drinks .image').show(400);
      }else{
          $('.drinks .image').not('.'+filter).hide(200);
          $('.drinks .image').filter('.'+filter).show(400);
      }

  });

  $('.control .buttons').click(function(){

    $(this).addClass('button-active').siblings().removeClass('button-active');

    let filter = $(this).attr('data-filter');
    if(filter == 'all'){
        $('.food .image').show(400);
    }else{
        $('.food .image').not('.'+filter).hide(200);
        $('.food .image').filter('.'+filter).show(400);
    }

    });

  });
</script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script> 

<script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pimage = $form.find(".pimage").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pquantity = $form.find(".pquantity").val();
      var pcode = $form.find(".pcode").val();

      $.ajax({
        url: './pay.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pimage: pimage,
          pquantity: pquantity,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: './pay.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });

</script>

<script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var quantity = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'pay.php',
        method: 'post',
        cache: false,
        data: {
          quantity: quantity,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
          console.log(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'pay.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>



<?php





}else{
    header("Location: ../login/login.php");
    exit();
}
?>