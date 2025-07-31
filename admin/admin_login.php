
<?php
include('../includes/connection.php');
session_start();
if(isset($_POST['submit'])){
    $user_name=$_POST['user_name'];
    $user_password=$_POST['user_password'];


    $query="select * from admin where user_name='$user_name' and user_password='$user_password'";
     $sql=mysqli_query($conn,$query);
     $data=mysqli_fetch_assoc($sql);
     $total=mysqli_num_rows($sql);
     if($total>0){
        $status=$data['status'];
        $_SESSION['admin_id']=$data['user_id'];
        $_SESSION['admin_name']=$data['user_name'];
        if($data['status']==="approved"){
            header('location:index.php');
        }else{
            $_SESSION['N/A']="Status: Not Approved";
            header('location:login.php');
        }
    }else{
        $_SESSION['N/A']="Invalid User Name or Password";
        header('location:login.php');
    }
}

?>
