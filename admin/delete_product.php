<?php
$product_id = $_GET['id'];
include('../includes/connection.php');
$query = "DELETE FROM add_product WHERE product_id='$product_id'";
mysqli_query($conn, $query);
header('location:view_product.php');
?>