<?php
if(isset($_POST['submit'])){
  include '../includes/connection.php';
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password=$_POST['password'];

  $query = "UPDATE user_acc SET name='$name', email='$email',password='$password' WHERE id='$id'";
  $sql=mysqli_query($conn, $query);

  header("location:user.php");
}
?>
