<?php
include('../includes/connection.php');
$body_id=$_GET['body_id'];


$query="delete from jewellery_bodies where id=$body_id";
$sql=mysqli_query($conn,$query);
    header('location:view_jewellery_body.php');


?>