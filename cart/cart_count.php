<?php
include('../includes/connection.php');
session_start();
$cart_count = 0;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT SUM(quantity) as total_items FROM cart WHERE user_id='$user_id'";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);
    $cart_count = $result['total_items'] ?? 0;
    $_SESSION['cart_count']=$cart_count;

}
?>
