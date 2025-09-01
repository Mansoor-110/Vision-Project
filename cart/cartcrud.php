<?php
session_start();
if (isset($_SESSION['user_id'])){
if(isset($_POST['submit'])){

   include '../includes/connection.php';

// Escape user input before query
$product_name   = mysqli_real_escape_string($conn, $_POST['product_name']);
$product_image  = mysqli_real_escape_string($conn, $_POST['product_image']);
$product_price  = mysqli_real_escape_string($conn, $_POST['product_price']);
$quantity       = mysqli_real_escape_string($conn, $_POST['quantity']);
$seller_id       = mysqli_real_escape_string($conn, $_POST['seller_id']);

      $user_id      =$_SESSION['user_id'];

    include'../includes/connection.php';
    $query="select * from cart where user_id='$user_id' and product_name='$product_name'";
    $sql=mysqli_query($conn,$query);
 
    $total=mysqli_num_rows($sql);

    if(mysqli_num_rows($sql)>0 && $product_name!="Customized jewellery"){
        $data=mysqli_fetch_assoc($sql);
        $new_qty=$data['quantity']+$quantity;
      $update_query="update cart set quantity='$new_qty' where user_id='$user_id' and product_name='$product_name'";
     $update_sql =  mysqli_query($conn,$update_query);
    }else{


    $insert_query="insert into cart(user_id,product_image,product_name,product_price,quantity,seller_id) 
    values('$user_id','$product_image','$product_name','$product_price','$quantity','$seller_id')";
     $insert_sql =  mysqli_query($conn,$insert_query);
    
    } header("location:cart.php");
  }
}else{
  header("location:cart.php");
}
?>