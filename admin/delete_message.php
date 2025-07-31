<?php
$id = $_GET['id'];
include('../includes/connection.php');
$query = "DELETE FROM contact WHERE id='$id'";
mysqli_query($conn, $query);
header('location:messages.php');
?>