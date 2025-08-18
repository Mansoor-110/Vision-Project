<?php
session_start();
if(isset($_POST['submit'])){
    $role=$_POST['role'];
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    if($password==$confirm_password){


        include'../includes/connection.php';
        $query="INSERT INTO user_acc(name,email,password,user_role) VALUES ('$name','$email','$password','$role')";
        $sql=mysqli_query($conn,$query);
        $_SESSION['account_created']='created';
        header("location:login.php");
    }else{
        $_SESSION['not-matched']='not-matched';
        header('location:signup.php');
    }
}
?>