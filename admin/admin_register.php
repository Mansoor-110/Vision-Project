<?php
include('../includes/connection.php');
if(isset($_POST['submit'])){
    $user_name= $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $r_password = $_POST['r_password'];
    if($r_password===$user_password){
        if(isset($_FILES['user_image'])){
            $image_name = $_FILES['user_image']['name'];
            $image_size = $_FILES['user_image']['size'];
            $image_tmp = $_FILES['user_image']['tmp_name'];
            $image_type = $_FILES['user_image']['type'];
            move_uploaded_file($image_tmp,'users/'.$image_name);
            $final_image='users/'.$image_name;
            $query="insert into admin(user_name,user_image,user_email,user_password,status) values('$user_name','$final_image','$user_email','$user_password','pending')";
            $sql=mysqli_query($conn,$query);
            header('location:login.php');
        }
    }else{
        echo"password incorrect";
    }
}


?>