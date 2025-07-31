<?php
session_start();
if(isset($_POST['submit'])){

      $product_image        =  $_POST['product_image'];
     $product_name  =  $_POST['product_name'];
      $product_price        =  $_POST['product_price'];
      $quantity     =  $_POST['quantity'];
      $user_id      =$_SESSION['user_id'];

    include'../includes/connection.php';
    $query="select * from cart where user_id='$user_id' and product_name='$product_name'";
    $sql=mysqli_query($conn,$query);
 
    $total=mysqli_num_rows($sql);

    if($sql){
        $data=mysqli_fetch_assoc($sql);
        $new_qty=$data['quantity']+$quantity;
      $update_query="update cart set quantity='$new_qty' where user_id='$user_id' and product_name='$product_name'";
     $update_sql =  mysqli_query($conn,$update_query);
    }else{


    $insert_query="insert into cart(user_id,product_image,product_name,product_price,quantity) 
    values('$user_id','$product_image','$product_name','$product_price','$quantity')";
     $insert_sql =  mysqli_query($conn,$insert_query);
    
    } header("location:cart.php");
  }

?>