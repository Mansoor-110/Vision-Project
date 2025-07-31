<?php
session_start();
if(isset($_SESSION['admin_id'])){
  $user_name=$_SESSION['admin_name'];
  ?>
  
<?php

include('../includes/connection.php');


if (isset($_POST['submit'])) {
    $product_id = $_POST['product_id'];

    foreach ($_FILES['added_image']['name'] as $key => $product_image_name) {
        $product_image_tmp = $_FILES['added_image']['tmp_name'][$key];
          move_uploaded_file($product_image_tmp,'../product_images/'.$product_image_name);
     $final_image = '../product_images/'.$product_image_name;
     $query="insert into additional_images(product_id,product_image) Values('$product_id','$final_image')";
     $sql=mysqli_query($conn,$query);

} 
header('location:view_product.php');

    }
?>
      <?php
}else{
  header('location:login.php');
}

?>