<?php 
include('../includes/connection.php');
?>

<?php
if(isset($_POST['submit'])){
  $body_type=$_POST['body_type'];
  $body_price=$_POST['body_price'];
    if(isset($_FILES['image'])){
        $image_name=$_FILES['image']['name'];
        $image_tmp=$_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp,'custom_jewellery_admin/jewellery/bodies/'.$image_name);
      echo  $body_image='custom_jewellery_admin/jewellery/bodies/'.$image_name;
        $query="Insert into jewellery_bodies (body_type,body_image,body_price) Values('$body_type','$body_image','$body_price')";
        $sql=mysqli_query($conn,$query);
        if($sql){
          $id=mysqli_insert_id($conn);
      
          header("location:upload_jewellery_images.php?body_id=$id");
        }



    }
}



?>