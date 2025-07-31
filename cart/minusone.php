<?php
$item=$_GET['item'];
include'../includes/connection.php';
$query="select quantity from cart where item=$item";
$sql=mysqli_query($conn,$query);
$data=mysqli_fetch_assoc($sql);


$newQty = max(1, $data['quantity'] - 1);
 $query = "UPDATE cart SET quantity = $newQty WHERE item = $item";
            mysqli_query($conn, $query);
            header("location:cart.php");
?>