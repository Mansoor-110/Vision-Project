<?php
$item=$_GET['item'];
include'../includes/connection.php';
$query="delete from cart where item=$item";
$sql=mysqli_query($conn,$query);
header("location:cart.php");
?>