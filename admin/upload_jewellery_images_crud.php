<?php 
include('../includes/connection.php')?>
<?php
if(isset($_POST['submit'])){
   
    $gem=$_POST['gem'];
    $body_id=$_POST['body_id'];
    foreach($_FILES['image']['name'] as $key => $image_name){
    // Check if the image is uploaded (skip if not)
    if(empty($image_name)) {
        continue;
    }

    $image_tmp = $_FILES['image']['tmp_name'][$key];
    $image_type = $_FILES['image']['type'][$key];
    $image_size = $_FILES['image']['size'][$key];
    
    move_uploaded_file($image_tmp , 'custom_jewellery_admin/jewellery/'.$image_name);
    $final_image='custom_jewellery_admin/jewellery/'.$image_name;
    
    $position=$_POST['position'][$key];
    $query="insert into jewellery_variants(body_id,gem,position,images) Values('$body_id','$gem','$position','$final_image')";
    $sql=mysqli_query($conn,$query);
    header("location:upload_jewellery_images.php?body_id=$body_id");
}

   
}

?>