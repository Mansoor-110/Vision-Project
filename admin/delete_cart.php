<?php
$item = $_GET['item'];
include('../includes/connection.php');
$query = "DELETE FROM cart WHERE item='$item'";
mysqli_query($conn, $query);
header('location:cart.php');
?>
