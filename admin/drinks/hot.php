<?php 
session_start();

include "../../login/login-system/connection.php";

if (isset($_SESSION['id']) && isset($_SESSION['name'])){
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hot Drinks</title>


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap">
   <link rel="stylesheet" href="drinks.css">
</head>
<body>
    <!-- navbar -->
	<div class="navbar">
		<!-- nav left -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link">
					<i class="fa fa-bars" onclick="collapseSidebar()"></i>
				</a>
			</li>
			
		</ul>
		<!-- end nav left -->
		<!-- form -->
		<form class="navbar-search">
			<input type="text" name="Search" class="navbar-search-input" placeholder="What you looking for...">
			<i class="fa fa-search"></i>
		</form>
		<!-- end form -->
		
	</div>
	<!-- end navbar -->
	<!-- sidebar -->
	<div class="sidebar">
		<ul class="sidebar-nav">
			
			<li class="sidebar-nav-item">
				<a href="../admin.php" class="sidebar-nav-link ">
					<div>
						<i class="fa fa-th-large" ></i>
					</div>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="../box/box.php" class="sidebar-nav-link ">
					<div>
                        <i class="fas fa-box"></i>
					</div>
					<span>BOX</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="../users/user.php" class="sidebar-nav-link ">
					<div>
                        <i class="fas fa-users"></i>
					</div>
					<span>Users</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="../visa/visa.php" class="sidebar-nav-link">
					<div>
                        <i class="fas fa-credit-card"></i>
					</div>
					<span>VISA</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="../orders/orders.php" class="sidebar-nav-link">
					<div>
                        <i class="fas fa-chart-pie"></i>
					</div>
					<span>Orders</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="../bookingtables/booking.php" class="sidebar-nav-link">
					<div>
						<i class="fas fa-table"></i>
					</div>
					<span>Booking</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="./drinks/hot.php" class="sidebar-nav-link active">
					<div>
					<i class="fas fa-wine-glass" ></i>
					</div>
					<span>Hot Drinks</span>
				</a>
			</li>
			
			<li  class="sidebar-nav-item">
				<a href="./cold.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-wine-glass" ></i>
					</div>
					<span>Cold Drinks</span>
				</a>
			</li>

            <li  class="sidebar-nav-item">
				<a href="./smoothies.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-wine-glass" ></i>
					</div>
					<span>Smoothies Drinks</span>
				</a>
			</li>

            <li  class="sidebar-nav-item">
				<a href="./speciality.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-wine-glass" ></i>
					</div>
					<span>Speciality Drinks</span>
				</a>
			</li>

            <li  class="sidebar-nav-item">
				<a href="../foods/burger.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-hamburger"></i>
					</div>
					<span>Burger</span>
				</a>
			</li>

            <li  class="sidebar-nav-item">
				<a href="../foods/fries.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-utensils" ></i>
					</div>
					<span>Fries</span>
				</a>
			</li>

            <li  class="sidebar-nav-item">
				<a href="../foods/salad.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-utensils" ></i>
					</div>
					<span>Salad</span>
				</a>
			</li>

            <li  class="sidebar-nav-item">
				<a href="../foods/sandwich.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-utensils" ></i>
					</div>
					<span>Sandwich</span>
				</a>
			</li>

            <li  class="sidebar-nav-item">
				<a href="../foods/shawrma.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-utensils" ></i>
					</div>
					<span>Shawrma</span>
				</a>
			</li>
            <li  class="sidebar-nav-item">
				<a href="../foods/falafel.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-utensils" ></i>
					</div>
					<span>Falafel</span>
				</a>
			</li>
			
			<li  class="sidebar-nav-item foot">
				<a href="../../login/login-system/logout.php" class="sidebar-nav-link">
					<div>
						<i class="fa fa-sign-out"></i>
					</div>
					<span>Logout</span>
				</a>
			</li>
		</ul>
	</div>
	<!-- end sidebar -->
	<!-- main content -->
	<div class="wrapper">
    <div class="conta">
       <button class="btn1 btn-success"><a href="./hot/add-hot/add.php" class="text-light">Add Hot Drinks</a></button>


       <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>    
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Description</th>
				<th scope="col">Product_code</th>
                <th scope="col">Action</th>                
                </tr>
            </thead>
            <tbody>

                <?php
                    $sql= "SELECT * FROM `hot`";
                    $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            
							$id = $row['id'];
							$image = $row['image'];
							$name = $row['name'];
							$price = $row['price'];
							$quantity = $row['quantity'];
							$description = $row['description'];
							$product_code = $row['product_code'];
							

							echo '
                                <tr>
                                    <td>'.$id.'</td>    
                                    <td scope="row">
                                        <img src="./hot/add-hot/uploads/'.$image.'" width="50px" height="50px" >
                                    </td>
                                    <td>'.$name.'</td>
                                    <td>'.$price.'</td>
                                    <td>'.$quantity.'</td>
                                    <td>'.$description.'</td>
									<td>'.$product_code.'</td>
                                    <td>
                                        <a href="./cruds/hot/update.php?id='.$id.'" class="btn btn-primary">Update</a>
                                        <a href="./cruds/hot/delete.php?id='.$id.'" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>';
                                
                        
                    	}
                    ?>   
            </tbody>
        </table>
   </div>
		
	</div>
	<!-- end main content -->
	<!-- import script -->
	<script src="./admin.js"></script>
	<!-- end import script -->
</body>
</html>
<?php

}else{
    header("Location: ./login/login.php");
    exit();
}
?>