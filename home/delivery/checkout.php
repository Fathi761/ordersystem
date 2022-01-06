<?php
session_start();

include "../../login/login-system/connection.php";

if (isset($_SESSION['id']) && isset($_SESSION['name'])){


?>

<!DOCTYPE html>
<html>
<head>
	<title>Dropdown</title>
	<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
<body>
	<style type="text/css">
		body{
			height: 100vh;
			background: rgb(64, 5, 108);
		}
	</style>

	<div class="container pt-5" style="width: 415px;">
		<div class="card">
			<ul class="nav nav-pills mb-3">
				<li><a href="#nav-tab-card" class="nav-link active" data-toggle="pill"><i class="fa fa-credit-card"></i> Credit Card</a></li>
				<!-- <li><a href="#nav-tab-paypal" class="nav-link" data-toggle="pill"><i class="fab fa-paypal"></i>Paypal</a></li> -->
				<!-- <li><a href="#nav-tab-bank" class="nav-link" data-toggle="pill"><i class="fa fa-university"></i>Bank Transfer</a></li> -->
			</ul>

            <?php
                    

                    $stmt = $conn->prepare('SELECT * FROM delivery');
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $grand_total = 0;
                    $total = 0;
                    $curr = 15000;
                    while ($row = $result->fetch_assoc()):
                  ?>
			<div class="tab-content p-3">
                <?php 
                  
                  $grand_total += $row['total_price'];
                  $total = $grand_total * $curr;
                  $items[] = $row['name'];
                  $allItems = implode(', ', $items);
                
                ?>
                <?php endwhile; ?>
				<div class="tab-pane fade show active" id="nav-tab-card">
					<form role=""form action="./check.php" method="post">
                    <input type="hidden" class="form-control" name="total" value="<?= number_format($grand_total,2); ?>">
                    <input type="text" class="form-control" name="lira" value="<?= $total; ?>">
                        <div class="form-group">
							<label>Total amount</label>
							<input type="text" class="form-control" value="<?= number_format($grand_total,2); ?>" disabled>
						</div>
                        <div class="form-group">
							<label>Total amount</label>
							<input type="text" class="form-control" value="<?= $total; ?>" disabled>
						</div>
						<div class="form-group">
							<label>Full Name (on the card)</label>
							<input type="text" class="form-control" name="fname">
						</div>

						<div class="form-group">
							<label>Card Number</label>
							<div class="input-group w-75">
								<input type="text" name="card" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" >
								<div class="text-primary input-group mt-2">
									<i class="fab fa-cc-visa fa-2x"></i>
									<i class="fab fa-cc-amex fa-2x mx-3"></i>
									<i class="fab fa-cc-mastercard fa-2x"></i>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>Expiration</label>
							<div class="input-group">
								<input type="number" class="form-control" placeholder="MM" name="month">
								<input type="number" class="form-control" placeholder="YY" name="year">
							</div>
						</div>

						<div class="form-group">
							<label>CVV <i class="fa fa-question-circle"></i></label>
							<input type="number" class="form-control" name="cvv">
						</div>

						<div class="form-group text-center">
							<button class="btn btn-primary" type="submit" name="save">Confirm</button>
						</div>
					</form>
				</div>

				<!-- <div class="tab-pane fade text-center" id="nav-tab-paypal">
					<p class="text-left">Paypal is easiest way to pay online</p>
					<button type="button" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login My Paypal</button>
					<p class="mt-3">or</p>
					<button type="button" class="btn btn-primary"><i class="fas fa-user"></i> Create New Account</button>

					<p class="mt-4 text-left"><strong>Note:</strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div> -->

				<!-- <div class="tab-pane fade" id="nav-tab-bank">
					<p>Bank account details</p>
					<dl>
						<dt>BANK:</dt>
						<dd>THE WORLD BANK</dd>

						<dt>Account Number:</dt>
						<dd>12345678912345</dd>

						<dt>IBAN:</dt>
						<dd>12345678987654</dd>
					</dl>
					<p><strong>Note:</strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div> -->
			</div>
		</div>
	</div>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>
</body>
</html>


<?php
}else{
    header("Location: ../login/login.php");
    exit();
}
?>