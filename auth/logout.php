<?php
session_start();
unset($_SESSION['login_success']);
unset($_SESSION['user_id']);
$_SESSION['logout']="logout";
header("location:../pages/index.php");
?>