<?php
include '../includes/connection.php';
session_start();
if (isset($_GET['item']) && isset($_SESSION['user_id'])) {
  $id = $_GET['item'];
  $user_id = $_SESSION['user_id'];
  mysqli_query($conn, "DELETE FROM wishlist WHERE id='$id' AND user_id='$user_id'");
}
header("Location: wishlist.php");
?>
