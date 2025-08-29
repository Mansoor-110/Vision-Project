<?php
$gem_id=$_GET['id'];
include('../includes/connection.php');
$query="delete from gems where gem_id='$gem_id'";
$sql=mysqli_query($conn,$query);
if($sql){
    header("location:view_gems.php");
}
?>