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
    <title>Users</title>


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap">
   <link rel="stylesheet" href="../drinks/drinks.css">
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
				<a href="../users/user.php" class="sidebar-nav-link">
					<div>
                        <i class="fas fa-users"></i>
					</div>
					<span>Users</span>
				</a>
			</li>
            <li class="sidebar-nav-item">
				<a href="#" class="sidebar-nav-link active">
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
				<a href="../drinks/hot.php" class="sidebar-nav-link ">
					<div>
					<i class="fas fa-wine-glass" ></i>
					</div>
					<span>Hot Drinks</span>
				</a>
			</li>
			
			<li  class="sidebar-nav-item">
				<a href="../drinks/cold.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-wine-glass" ></i>
					</div>
					<span>Cold Drinks</span>
				</a>
			</li>

            <li  class="sidebar-nav-item">
				<a href="../drinks/smoothies.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-wine-glass" ></i>
					</div>
					<span>Smoothies Drinks</span>
				</a>
			</li>

            <li  class="sidebar-nav-item">
				<a href="../drinks/speciality.php" class="sidebar-nav-link">
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
					<i class="fas fa-french-fries"></i>
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

       <table class="table">
            <h2 style="margin-top: 60px;font-size: 25px;font-weight: 800;">VISA Managment</h2>
            <thead>
                <tr>
                <th scope="col">ID</th>    
                <th scope="col">Total_USD</th>
                <th scope="col">Total_Lira</th>
                <th scope="col">Full Name</th>
                <th scope="col">Card Number</th>
                <th scope="col">Month</th>
                <th scope="col">Year</th>
                <th scope="col">CVV</th>
                <th scope="col">Action</th>                
                </tr>
            </thead>
            <tbody>

                <?php
                    $sql= "SELECT * FROM `visa`";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                            
						$id = $row['id'];
						$total = $row['total'];
						$lira = $row['lira'];
						$fname = $row['full_name'];
						$card = $row['card_number'];
						$month= $row['month'];
                        $year= $row['year'];
                        $cvv= $row['cvv'];
						

						echo '
							<tr>
								<td>'.$id.'</td>    
								<td scope="row">
									'.$total.'
								</td>
								<td>'.$lira.'</td>
								<td>'.$fname.'</td>
								<td>'.$card.'</td>
								<td>'.$month.'</td>
                                <td>'.$year.'</td>
                                <td>'.$cvv.'</td>
								<td>
									<a href="./delete.php?id='.$id.'" class="btn btn-danger">Delete</a>
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