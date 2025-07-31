<?php
session_start();
$id=$_GET['id'];
include('../includes/connection.php');
$current_id=$_SESSION['admin_id'];
if(!($current_id==$id)){
$query = "update admin set status='rejected'where user_id='$id'";
$sql=mysqli_query($conn,$query);
header('location:admin_data.php');
}else{
    $_SESSION['can-not']="reject";
    header('location:admin_data.php');
}

?>
