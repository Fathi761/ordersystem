<?php 
session_start();

include "../../login/login-system/connection.php";

if (isset($_SESSION['id']) && isset($_SESSION['name'])){

  if(isset($_POST['add_to_cart'])) {
    if(isset($_SESSION['cart'])){
  
        $session_array_name = array_column($_SESSION['cart'], "name");
  
        if(!in_array($_POST['name'],$session_array_name)) {
            $session_array = array(
                
                "name" => $_POST['name'],
                "price" => $_POST['price'],
                "quantity" => $_POST['quantity']   
            );
    
            $_SESSION['cart'][] = $session_array;
        }
  
    }else{
  
        $session_array = array(
            
            "name" => $_POST['name'],
            "price" => $_POST['price'],
            "quantity" => $_POST['quantity']   
        );
  
        $_SESSION['cart'][] = $session_array;
    }
  }
  

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="foods.css">
    <link rel="stylesheet" href="../jquery.nice-number.css">
    <title>Home</title>
</head>
<body>
  <nav class="navbar navbar-expand-sm ">
    <div class="container-fluid">
      <a class="navbar-brand" href="../home.php">Technoplus</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="text" placeholder="Search">
          <button class="btn btn-primary" type="submit">Search</button>
        </form>

          <div class="dropdown">
            <?php
              $sname = "localhost";
              $uname= "root";
              $password= "";

              $db_name= "resto";

              $conn1 = mysqli_connect($sname, $uname,$password, $db_name);

              $id = $_SESSION['id'];
              if(!$conn) {
                  echo "Connection failed!!!";
              }


              $sql = "SELECT * FROM `users` WHERE id= '$id'";
              $result = mysqli_query($conn1, $sql);

                while($row = mysqli_fetch_assoc($result)){

            ?>
            <button class="btn  dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="rounded-circle" width="50px" src="<?php echo "../../login/login-system/uploads/".$row['image']; ?>"> <br>
              <?php echo $_SESSION['name']; ?>
            </button>

            <?php

                }
            ?>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

              <!-- <a href="./profile/profile.php">
                <button class="dropdown-item" type="button"><i class="far fa-id-card"></i> Profile</button>
              </a> -->

              <a href="../options/currency/currency.php">
                <button class="dropdown-item" type="button"><i class="fas fa-money-check"></i> Currency</button>
              </a>

              <a href="../../login/login-system/logout.php">
                <button class="dropdown-item" type="button"><i class="fas fa-sign-out-alt"></i> Logout</button>
              </a>
            </div>
          </div>
          
      </div>
    </div>
  </nav>
    

      <div class="leftsidebar">
        <div class="text">Menu</div>

          <ul>
              <li><a href="../drinks/drinks.php" class="drink-btn"><i class="fas fa-wine-glass"></i> Drinks </a> </li>

              <li><a href="#" class="food-btn"><i class="fas fa-utensils"></i> Food </a> </li>
          </ul>

          
        </div>
        
      </div>

      <div class="main">
            
        <section class="food" id="food">
            
            <ul class="control">
                <li class="buttons button-active" data-filter="all"> 
                  <img src="./images/food.jpg" alt="" class="img_list"><br>
                  Foods</li>
                <li class="buttons" data-filter="burger">
                <img src="./images/barger.jpg" alt="" class="img_list"><br>
                  Burger</li>
                <li class="buttons" data-filter="fries">
                  <img src="./images/fries.jpg" alt="" class="img_list"><br>
                  Fries</li>
                <li class="buttons" data-filter="salad">
                  <img src="./images/salad.png" alt="" class="img_list"><br>
                  Salad</li>
                <li class="buttons" data-filter="sandwich">
                  <img src="./images/sandwish.jpg" alt="" class="img_list"><br>
                  Sandwich</li>
                <li class="buttons" data-filter="shawrma">
                  <img src="./images/shawarma.png" alt="" class="img_list"><br>
                  Shawrma</li>
                <li class="buttons" data-filter="sub">
                  <img src="./images/plates.jpg" alt="" class="img_list"><br>
                  Plates</li>
                <li class="buttons" data-filter="falafel">
                  <img src="./images/falafel.jpg" alt="" class="img_list"><br>
                  Falafel</li>
              </ul>

                <div class="image-container">

                    <div class="image burger" id="burger">
                        <?php

                            $sql = "SELECT * FROM `burger`";
                            $result = mysqli_query($conn1, $sql);

                            while($row = mysqli_fetch_assoc($result)){

                        ?>
                        
                        <div class="cart">
                        
                        <form action="foods.php?id=<?php echo $row['id']; ?>" method="post" class="fooding">

                          <button name="add_to_cart">
                            <img src="<?php echo "../../admin/foods/burger/add-burger/uploads/".$row['image']; ?>" >

                          </button>
                            
                            <h6><?php echo $row['name']; ?></h6>
                            <h6> $<?php echo number_format( $row['price'],2); ?> </h6>
                            <!-- <h6><?php echo $row['description']; ?></h6> -->
                            
                            <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="description" value="<?php echo $row['price']; ?>">
                            
                            <input type="number" name="quantity"  class="quantity" value="1" ><br>
                            

                            <!-- <input type="submit" name="add_to_cart" class="btn btn-warning btn-block my-2"  value="Add To Bill" style="width: 100px;"> -->
                            </form>
                        </div>
                        

                        <?php    
                        }

                        ?>    
                </div> 

              <div class="image-container">

                <div class="image fries" id="fries">
                    <?php

                        $sql = "SELECT * FROM `fries`";
                        $result = mysqli_query($conn1, $sql);

                        while($row = mysqli_fetch_assoc($result)){

                    ?>
                        
                        <div class="cart">
                        
                        <form action="foods.php?id=<?php echo $row['id']; ?>" method="post" class="fooding">

                            <button name="add_to_cart">
                            <img src="<?php echo "../../admin/foods/fries/add-fries/uploads/".$row['image']; ?>" >

                            </button>

                            <h6><?php echo $row['name']; ?></h6>
                            <h6> $<?php echo number_format( $row['price'],2); ?> </h6>
                            <!-- <h6><?php echo $row['description']; ?></h6> -->
                            
                            <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="description" value="<?php echo $row['description']; ?>">
                            
                            <input type="number" name="quantity"  class="quantity" value="1" ><br>
                            

                            <!-- <input type="submit" name="add_to_cart" class="btn btn-warning btn-block my-2"  value="Add To Bill" style="width: 100px;"> -->
                            </form>
                        </div>
                        

                        <?php    
                        }

                        ?> 
                </div>   
            </div> 

            <div class="image-container">

                <div class="image salad" id="salad">
                    <?php

                        $sql = "SELECT * FROM `salad`";
                        $result = mysqli_query($conn1, $sql);

                        while($row = mysqli_fetch_assoc($result)){

                    ?>
                        
                    <div class="cart">
                         
                        <form action="foods.php?id=<?php echo $row['id']; ?>" method="post" class="fooding">


                            <button name="add_to_cart">
                            <img src="<?php echo "../../admin/foods/salad/add-salad/uploads/".$row['image']; ?>" >

                            </button>
                            
                            <h6><?php echo $row['name']; ?></h6>
                            <h6> $<?php echo number_format( $row['price'],2); ?> </h6>
                            <!-- <h6><?php echo $row['description']; ?></h6> -->
                            
                            <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="description" value="<?php echo $row['price']; ?>">
                            
                            <input type="number" name="quantity"  class="quantity" value="1" ><br>
                            

                            <!-- <input type="submit" name="add_to_cart" class="btn btn-warning btn-block my-2"  value="Add To Bill" style="width: 100px;"> -->
                        </form>
                    </div>
                        

                        <?php    
                        }

                        ?>
                        
                </div>
            </div>
                
                <div class="image-container">

                    <div class="image sandwich" id="sandwich">
                        <?php

                            $sql = "SELECT * FROM `sandwich`";
                            $result = mysqli_query($conn1, $sql);

                            while($row = mysqli_fetch_assoc($result)){

                        ?>
                            
                        <div class="cart">
                            
                            <form action="foods.php?id=<?php echo $row['id']; ?>" method="post" class="fooding">

                                <button name="add_to_cart">
                                <img src="<?php echo "../../admin/foods/sandwich/add-sandwich/uploads/".$row['image']; ?>" >

                                </button>
                                
                                <h6><?php echo $row['name']; ?></h6>
                                <h6> $<?php echo number_format( $row['price'],2); ?> </h6>
                                <!-- <h6><?php echo $row['description']; ?></h6> -->
                                
                                <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                <input type="hidden" name="description" value="<?php echo $row['price']; ?>">
                                
                                <input type="number" name="quantity"  class="quantity" value="1" ><br>
                                

                                <!-- <input type="submit" name="add_to_cart" class="btn btn-warning btn-block my-2"  value="Add To Bill" style="width: 100px;"> -->
                            </form>
                        </div>
                            

                        <?php    
                            }

                        ?>
                    </div>    
                </div>
                
                <div class="image-container">

                    <div class="image shawrma" id="shawrma">
                        <?php

                            $sql = "SELECT * FROM `shawrma`";
                            $result = mysqli_query($conn1, $sql);

                            while($row = mysqli_fetch_assoc($result)){

                        ?>
                            
                        <div class="cart">
                            
                            <form action="foods.php?id=<?php echo $row['id']; ?>" method="post" class="fooding">


                                <button name="add_to_cart">
                                <img src="<?php echo "../../admin/foods/shawrma/add-shawrma/uploads/".$row['image']; ?>" >

                              </button>
                                
                                <h6><?php echo $row['name']; ?></h6>
                                <h6> $<?php echo number_format( $row['price'],2); ?> </h6>
                                <!-- <h6><?php echo $row['description']; ?></h6> -->
                                
                                <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                <input type="hidden" name="description" value="<?php echo $row['price']; ?>">
                                
                                <input type="number" name="quantity"  class="quantity" value="1" ><br>
                                

                                <!-- <input type="submit" name="add_to_cart" class="btn btn-warning btn-block my-2"  value="Add To Bill" style="width: 100px;"> -->
                            </form>
                        </div>
                            

                        <?php    
                            }

                        ?>
                    </div>   
                </div>
                
                <div class="image-container">

                    <div class="image plate" id="plate">
                        <?php

                            $sql = "SELECT * FROM `plate`";
                            $result = mysqli_query($conn1, $sql);

                            while($row = mysqli_fetch_assoc($result)){

                        ?>
                            
                        <div class="cart">
                            
                            <form action="foods.php?id=<?php echo $row['id']; ?>" method="post" class="fooding">

                            <button name="add_to_cart">
                            <img src="<?php echo "../../admin/foods/plate/add-plate/uploads/".$row['image']; ?>" >

                            </button> 
                                <h6><?php echo $row['name']; ?></h6>
                                <h6> $<?php echo number_format( $row['price'],2); ?> </h6>
                                <!-- <h6><?php echo $row['description']; ?></h6> -->
                                
                                <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                <input type="hidden" name="description" value="<?php echo $row['price']; ?>">
                                
                                <input type="number" name="quantity"  class="quantity" value="1" ><br>
                                

                                <!-- <input type="submit" name="add_to_cart" class="btn btn-warning btn-block my-2"  value="Add To Bill" style="width: 100px;"> -->
                            </form>
                        </div>
                            

                        <?php    
                            }

                        ?>
                    </div>   
                </div>

                <div class="image-container">

                    <div class="image falafel" id="falafel">
                        <?php

                            $sql = "SELECT * FROM `falafel`";
                            $result = mysqli_query($conn1, $sql);

                            while($row = mysqli_fetch_assoc($result)){

                        ?>
                            
                        <div class="cart">
                            
                            <form action="foods.php?id=<?php echo $row['id']; ?>" method="post" class="fooding">

                              <button name="add_to_cart">
                              <img src="<?php echo "../../admin/foods/falafel/add-falafel/uploads/".$row['image']; ?>" >

                              </button>
                                <h6><?php echo $row['name']; ?></h6>
                                <h6> $<?php echo number_format( $row['price'],2); ?> </h6>
                                <!-- <h6><?php echo $row['description']; ?></h6> -->
                                
                                <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                                <input type="hidden" name="description" value="<?php echo $row['price']; ?>">
                                
                                <input type="number" name="quantity"  class="quantity" value="1" ><br>
                                

                                <!-- <input type="submit" name="add_to_cart" class="btn btn-warning btn-block my-2"  value="Add To Bill" style="width: 100px;"> -->
                            </form>
                        </div>
                            

                        <?php    
                            }

                        ?>
                    </div>   
                </div>
            
        </section>
          
         
      </div>

            <div class="rightsidebar">
              <h2>Bill</h2>

              <div class='row'>
                      <div class='col-75'>
                          <select name='table' class='form-select'>
                              <option value="<?php echo $row['name']; ?>">Select table</option>
                              <?php
                                  $query=mysqli_query($conn, 'SELECT * FROM tables');
                                  while($row=mysqli_fetch_array($query)){
                                      ?>
                                      <option value='<?php echo $row['name']; ?>'> <?php echo $row['name']; ?> </option>
                                      <?php
                                  }
                              ?>
                          </select>
                      </div>
                  </div>
            
                <?php
                  $totalquantity = 0;
                  $subtotal = 0;
                  $total = 0;

                  $taxes = 2.31;

                  $dailycurrency = 15000;
                  $currency = 0;
                  $curtaxes = 0;
                  $curtotal = 0;
                  $output = "";

                  $output .= "
                  
                  <table class='table '>
                    <tr>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                      <th>Action</th>
                    </tr>
                  
                  
                  ";

                  if(!empty($_SESSION['cart'])){
                    foreach($_SESSION['cart'] as $key => $value){
                      $output .= "
                        <tr> 
                          <td>".$value['name']."</td>
                          <td>$".$value['price']."</td>
                          <td>".$value['quantity']."</td>
                          <td>$".number_format($value['price'] * $value['quantity'],2)."</td>
                          <td>
                            <a href='foods.php?action=remove&name=".$value['name']."'>
                              <button class='btn btn-danger'>Remove</button>
                            </a>
                          </td>
                      
                      ";

                      $totalquantity = $totalquantity + $value['quantity'];
                      $subtotal = $subtotal + $value['quantity'] * $value['price'];
                      $total =  $subtotal + $taxes;

                      $currency = $subtotal * $dailycurrency;
                      $curtaxes = $taxes * $dailycurrency;
                      $curtotal = $total * $dailycurrency;
                    }

                    $output .= "
                      <tr>
                        <td colspan='1'></td>
                        <td><b>Subtotal Price</b></td>
                        <td>".number_format($totalquantity)."</td>
                        <td>$".number_format($subtotal,2)."</td>
                        <td>$currency L.L</td>
                      </tr>
                      <tr>
                        <td colspan='1'></td>
                        <td><b>Taxes</b></td>
                        <td colspan='1'></td>
                        <td>$ $taxes</td>
                        <td>$curtaxes L.L </td>
                      </tr>

                      <tr>
                        <td colspan='1'></td>
                        <td>Total</td>
                        <td colspan='1'></td>
                        <td>$ $total</td>
                        <td>$curtotal L.L</td>
                      </tr>
                      <tr>
                        <td colspan='2'></td>
                        <td>
                          <a href='foods.php?action=clearall'>
                            <button class='btn btn-danger btn-block'>Clear</button>
                          </a> 
                        </td>
                        <td colspan='1'></td>
                        <td>
                          <a href='foods.php?action=pay'>
                            <button class='btn btn-success btn-block'>Pay Bill</button>
                          </a> 
                        </td>
                      </tr>

                      
                      </table>


                      <h5> Or pay using master or visa card </h5> <br> <br>
                        
                          
                      <div class='checkout_form'>
                          <div class='card_number' id='card-container'>
                              <input type='text' class='input' id='card' placeholder='0000 0000 0000 0000'> 
                              <div id='logo'></div>
                          </div>
                          <div class='card_grp'>   
                            <div class='expiry_date'>
                              <input type='text' class='expiry_input' data-mask='00'  placeholder='00'>
                              <input type='text' class='expiry_input' data-mask='00' placeholder='00'>
                            </div>
                            <div class='cvc'>
                              <input type='text' class='cvc_input' data-mask='000' placeholder='000'>
                              <div class='cvc_img'>
                                  ?
                                <div class='img'>
                                  <img src='https://i.imgur.com/2ameC0C.png' alt=''>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='button'>
                            pay
                          </div>
                      </div>
                    "; 
                  }

                  echo $output;
                  ?>

      
                          
                        
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
<script src="../calculator.js"></script>
<!-- <script src="../jquery.nice-number.js"></script> -->
<script src="../credit-card.js"></script>
<script>
  $(function(){
  $('input[type="number"]').niceNumber();
});
</script>


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

<?php

if(isset($_GET['action'])){
  
  if($_GET['action'] == "clearall"){
      unset($_SESSION['cart']);
  }

  if($_GET['action'] == "remove"){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value['name'] == $_GET['name']) {
              unset($_SESSION['cart'][$key]);
          }
      }
  }
}

}else{
    header("Location: ../login/login.php");
    exit();
}
?>