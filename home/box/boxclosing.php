<?php
include "../../login/login-system/connection.php";


if(isset($_POST['save'])){
    $usd = $_POST['usd'];
    $lira = $_POST['lira'];

    $sql = "INSERT into `box` (usd, lira) VALUES ('$usd', '$lira')";
    $result = mysqli_query($conn, $sql);

    if($result){
        
        header("Location: ../../login/login.php");
    }else{
        die(mysqli_error($conn));
    }
}

if (isset($_GET['clear'])) {
    $stmt = $conn->prepare('DELETE FROM orders');
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'All Item removed from the cart!';
    header("Location: box.php");
}

// Remove single items from order
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];

    $stmt = $conn->prepare('DELETE FROM orders WHERE id=?');
    $stmt->bind_param('i',$id);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Item removed from the order!';
    header('location:sales.php');
}

?> 



?>  