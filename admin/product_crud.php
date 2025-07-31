<?php
include('../includes/connection.php');
if(isset($_POST['submit'])){
    
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_category = mysqli_real_escape_string($conn, $_POST['product_category']);
    $product_subcategory = mysqli_real_escape_string($conn, $_POST['product_subcategory']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
    $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
    $product_url = mysqli_real_escape_string($conn, $_POST['product_url']);
    $product_tag = mysqli_real_escape_string($conn, $_POST['product_tag'])  ;
    $final_image=$product_url;
    if(empty($product_url)){
      if(isset($_FILES['product_image'])){
    $product_image_name = $_FILES['product_image']['name'];
    $product_image_size = $_FILES['product_image']['size'];
    $product_image_type = $_FILES['product_image']['type'];
    $product_image_tmp  = $_FILES['product_image']['tmp_name'];
    move_uploaded_file($product_image_tmp,'../product_images/'.$product_image_name);
     $final_image = '../product_images/'.$product_image_name;
} 
}  
$query = "INSERT INTO add_product(product_name,product_category,product_subcategory,product_price,product_image,product_description,product_tag) 
Values('$product_name','$product_category','$product_subcategory','$product_price','$final_image','$product_description','$product_tag')";
$sql=mysqli_query($conn,$query);
header('location:view_product.php');
}
?>