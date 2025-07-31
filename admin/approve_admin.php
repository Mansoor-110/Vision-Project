<?php
$id=$_GET['id'];
include('../includes/connection.php');
$query = "update admin set status='approved'where user_id='$id'";
$sql=mysqli_query($conn,$query);
header('location:admin_data.php');

?>