<?php
include('../includes/connection.php');
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $body_id=$_POST['body_id'];
    $gem=$_POST['gem'];
    $position=$_POST['position'];
    if(isset($_FILES['image'])){
        $image_name=$_FILES['image']['name'];
        $image_tmp=$_FILES['image']['tmp_name'];
        $image_size=$_FILES['image']['size'];
        $image_type=$_FILES['image']['type'];
    move_uploaded_file($image_tmp , 'custom_jewellery_admin/jewellery/'.$image_name);
    $final_image='custom_jewellery_admin/jewellery/'.$image_name;

    $query="update jewellery_variants SET
    body_id='$body_id',
    gem='$gem',
    position='$position',
    images='$final_image'
    where id='$id'";
    $sql=mysqli_query($conn,$query);
    if($sql){
        header("location:view_jewellery_images.php?body_id=$body_id");
    }
    }
}


?>