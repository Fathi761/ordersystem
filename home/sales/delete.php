<?php
session_start();
include "../../login/login-system/connection.php";

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