<?php
session_start();
include "../../../../login/login-system/connection.php";

//Add items into the cart table
if(isset($_POST['pcode'])){
    $pid = $_POST['pid'];
    $pimage = $_POST['pimage'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pcode = $_POST['pcode'];
    $pquantity = $_POST['pquantity'];
    $total_price = $pprice * $pquantity;

    $stmt = $conn->prepare('SELECT product_code FROM cart8 WHERE product_code=?');
    $stmt->bind_param('s',$pcode);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    $code = $r['product_code'] ?? '';

    if (!$code) {
	    $query = $conn->prepare('INSERT INTO cart8 (image,name,price,quantity,total_price,product_code) VALUES (?,?,?,?,?,?)');
	    $query->bind_param('ssssss',$pimage,$pname,$pprice,$pquantity,$total_price,$pcode);
	    $query->execute();

	    echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item added to your cart!</strong>
						</div>';
	  } else {
	    echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item already added to your cart!</strong>
						</div>';
	  }
}

// Get no.of items available in the cart table
if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
    $stmt = $conn->prepare('SELECT * FROM cart8');
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;

    echo $rows;
}

// Remove single items from cart
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];

    $stmt = $conn->prepare('DELETE FROM cart8 WHERE id=?');
    $stmt->bind_param('i',$id);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Item removed from the cart!';
    header('location:table22.php');
}

// Remove all items at once from cart
if (isset($_GET['clear'])) {
    $stmt = $conn->prepare('DELETE FROM cart8');
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'All Item removed from the cart!';
    header('location:table22.php');
}
// Set total price of the product in the cart table
if (isset($_POST['quantity'])) {
    $quantity = $_POST['quantity'];
    $pid = $_POST['pid'];
    $pprice = $_POST['pprice'];

    $tprice = $quantity * $pprice;

    $stmt = $conn->prepare('UPDATE cart8 SET quantity=?, total_price=? WHERE id=?');
    $stmt->bind_param('isi',$quantity,$tprice,$pid);
    $stmt->execute();
}


?>

