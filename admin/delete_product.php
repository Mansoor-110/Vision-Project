<?php
$product_id = $_GET['id'];
$redirect_url = $_GET['redirect_url'];
include('../includes/connection.php');
$query = "DELETE FROM add_product WHERE product_id='$product_id'";
mysqli_query($conn, $query);
header("location:$redirect_url");
?>