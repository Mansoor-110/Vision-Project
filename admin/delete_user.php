<?php
$id=$_GET['id'];
include('../includes/connection.php');
$query = "delete FROM user_acc WHERE id='$id'";
$sql=mysqli_query($conn, $query);
header('location:user.php');
?>