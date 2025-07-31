<?php
session_start();
$current_id=$_SESSION['admin_id'];

$id=$_GET['id'];
include('../includes/connection.php');
if(!($current_id==$id)){
$query = "delete from admin where user_id='$id'";
$sql=mysqli_query($conn,$query);

header('location:admin_data.php');
}else{
    $_SESSION['can-not']="delete";
    header('location:admin_data.php');
}

?>
?>