<?php
$id=$_GET['item'];
include('../includes/connection.php');
session_start();
$user_id=$_SESSION['user_id'];
$query="select * from wishlist where user_id='$user_id' and id='$id'";
$sql=mysqli_query($conn,$query);
$data=mysqli_fetch_assoc($sql);

  $product_name=$data['product_name'];
  $product_image=$data['product_image'];
  $product_price=$data['product_price'];
  $quantity=$data['quantity'];

    $check_query = "SELECT * FROM cart WHERE user_id = '$user_id' AND product_name = '$product_name'";
    $check_sql = mysqli_query($conn, $check_query);
    $check_total=mysqli_num_rows($check_sql);
    if($check_total>0){
        $existing_data=mysqli_fetch_assoc($check_sql);
        $new_quantity=$existing_data['quantity']+$quantity;
        $update_cart_query="update cart set quantity='$new_quantity' where user_id='$user_id' and product_name='$product_name'";
        $update_cart=mysqli_query($conn,$update_cart_query);
    }else{
  $cart_query="insert into cart(user_id,product_image,product_name,product_price,quantity) 
  values('$user_id','$product_image','$product_name','$product_price','$quantity')";
  $cart_sql=mysqli_query($conn,$cart_query);
    }  
  $remove_query="delete from wishlist where user_id='$user_id' and id='$id'";
$remove_sql=mysqli_query($conn,$remove_query);
header('location:wishlist.php');
?>