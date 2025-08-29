<?php
include('../includes/connection.php');
$id=$_GET['id'];
$body_id=$_GET['body_id'];


$query="delete from jewellery_variants where id=$id";
$sql=mysqli_query($conn,$query);
    header("location:view_jewellery_images.php?body_id=$body_id");


?>