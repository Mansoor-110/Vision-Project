<?php
$id=$_GET['id'];
include('../includes/connection.php');
$query = "delete  FROM additional_images WHERE id='$id'";
$sql=mysqli_query($conn,$query);
header("location:additional_product_images.php");

?>