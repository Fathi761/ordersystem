<?php 
session_start();

include "../login/login-system/connection.php";

if (isset($_SESSION['id']) && isset($_SESSION['name'])){
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap">
   <link rel="stylesheet" href="admin.css">
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
				<a href="#" class="sidebar-nav-link active">
					<div>
						<i class="fa fa-th-large" ></i>
					</div>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="./users/user.php" class="sidebar-nav-link ">
					<div>
                        <i class="fas fa-users"></i>
					</div>
					<span>Users</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="./orders/orders.php" class="sidebar-nav-link ">
					<div>
						<i class="fas fa-chart-pie"></i>
					</div>
					<span>Orders</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="./bookingtables/booking.php" class="sidebar-nav-link">
					<div>
						<i class="fas fa-table"></i>
					</div>
					<span>Booking</span>
				</a>
			</li>
			<li  class="sidebar-nav-item">
				<a href="./drinks/hot.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-wine-glass" ></i>
					</div>
					<span>Hot Drinks</span>
				</a>
			</li>
			
			<li  class="sidebar-nav-item">
				<a href="./drinks/cold.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-wine-glass" ></i>
					</div>
					<span>Cold Drinks</span>
				</a>
			</li>

            <li  class="sidebar-nav-item">
				<a href="./drinks/smoothies.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-wine-glass" ></i>
					</div>
					<span>Smoothies Drinks</span>
				</a>
			</li>

            <li  class="sidebar-nav-item">
				<a href="./drinks/speciality.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-wine-glass" ></i>
					</div>
					<span>Speciality Drinks</span>
				</a>
			</li>

            <li  class="sidebar-nav-item">
				<a href="./foods/burger.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-hamburger"></i>
					</div>
					<span>Burger</span>
				</a>
			</li>

            <li  class="sidebar-nav-item">
				<a href="./foods/fries.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-french-fries"></i>
					</div>
					<span>Fries</span>
				</a>
			</li>

            <li  class="sidebar-nav-item">
				<a href="./foods/salad.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-utensils" ></i>
					</div>
					<span>Salad</span>
				</a>
			</li>

            <li  class="sidebar-nav-item">
				<a href="./foods/sandwich.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-utensils" ></i>
					</div>
					<span>Sandwich</span>
				</a>
			</li>

            <li  class="sidebar-nav-item">
				<a href="./foods/shawrma.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-utensils" ></i>
					</div>
					<span>Shawrma</span>
				</a>
			</li>
            <li  class="sidebar-nav-item">
				<a href="./foods/falafel.php" class="sidebar-nav-link">
					<div>
					<i class="fas fa-utensils" ></i>
					</div>
					<span>Falafel</span>
				</a>
			</li>
			
			<li  class="sidebar-nav-item foot">
				<a href="../login/login-system/logout.php" class="sidebar-nav-link">
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
		<div class="row">
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter1 bg-primary">
					<p>
						<i class="fas fa-users"></i>
					</p>
					<h3>
						<?php
							$query = "SELECT id FROM users ORDER BY id";
							$query_run = mysqli_query($conn, $query);

							$row = mysqli_num_rows($query_run);

							echo '<h3> '.$row.' </h3>';
						?>
					</h3>
					<p>Total Users</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter2 bg-warning">
					<p>
						<i class="fas fa-table"></i>
					</p>
					<h3>
					<?php
							$query = "SELECT id FROM booking ORDER BY id";
							$query_run = mysqli_query($conn, $query);

							$row = mysqli_num_rows($query_run);

							echo '<h3> '.$row.' </h3>';
						?>
					</h3>
					<p>Reservations</p>
				</div>
			</div>
			
			 <div class="col-3 col-m-6 col-sm-6">
				<div class="counter3 bg-success">
					<p>
						<i class="fas fa-chart-pie"></i>
					</p>
					<h3>
						<?php
							$query = "SELECT id FROM orders ORDER BY id";
							$query_run = mysqli_query($conn, $query);

							$row = mysqli_num_rows($query_run);

							echo '<h3> '.$row.' </h3>';
						?>
					</h3>
					<p>Total Orders</p>
				</div>
			</div>
			<!-- <div class="col-3 col-m-6 col-sm-6">
				<div class="counter4 bg-danger">
					<p>
						<i class="fa fa-bug"></i>
					</p>
					<h3>100+</h3>
					<p>Issues</p>
				</div>
			</div> -->
		</div>
		<div class="row">
			<div class="col-8 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<a href="./users/user.php">
							<i class="fas fa-users"></i>
						</a>
						<h3>
							Users
						</h3>						
					</div>
					<div class="card-content">
						<table>
							<thead>
								<tr>
									<th>Image</th>
									<th>Name</th>
									<th>Email</th>
									<th>Password</th>
									<th>User_type</th>
								</tr>
							</thead>
							<tbody>
							<?php
								
								$sql = "SELECT * from users";
								$result = mysqli_query($conn, $sql);					
									while ($row = mysqli_fetch_assoc($result)){
										?>
										<tr>
											<td><img src='<?php echo '../login/login-system/uploads/'.$row['image']; ?>' width='50px' height='50px' ></td>
											<td><?php echo $row['name']; ?></td>
											<td><?php echo $row['email']; ?></td>
											<td><?php echo $row['password']; ?></td>
											<td><?php echo $row['usertype']; ?></td>
                                        </tr>
									
							
								<?php
									}
							?>								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-8 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<a href="./orders/orders.php">
							<i class="fas fa-chart-pie"></i>
						</a>
						<h3>
							Orders
						</h3>						
					</div>
					<div class="card-content">
						<table>
							<thead>
								<tr>
									<th>ID</th>
									<th>Table/Takeaway/Delivery</th>
									<th>Amount_USD</th>
									<th>Amount L.L</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$sql = "SELECT * from orders LIMIT 5";
								$result = mysqli_query($conn, $sql);					
									while ($row = mysqli_fetch_assoc($result)){
										?>
										<tr>
											<td><?php echo $row['id']; ?></td>
											<td><?php echo $row['number_table']; ?></td>
											<td><?php echo $row['amount_USD']; ?></td>
											<td><?php echo $row['amount_LL']; ?></td>
                                        </tr>
								<?php
									}
							?>								
							</tbody>
						</table>
					</div>
				</div>
			</div>
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
    header("Location: ../login/login-system/login.php");
    exit();
}
?>