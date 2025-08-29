<?php
include('../includes/connection.php');
if(isset($_POST['submit'])){
$gem_name=$_POST['gem_name'];
$gem_id=$_POST['gem_id'];
$gem_price=$_POST['gem_price'];
if(isset($_FILES['gem_image'])){
    $gem_image_name=$_FILES['gem_image']['name'];
    $gem_image_type=$_FILES['gem_image']['type'];
    $gem_image_size=$_FILES['gem_image']['size'];
    $gem_image_tmp=$_FILES['gem_image']['tmp_name'];
    move_uploaded_file($gem_image_tmp,'custom_jewellery_admin/gems/'.$gem_image_name);
    $gem_image_path='custom_jewellery_admin/gems/'.$gem_image_name;

    $query="update gems set
    gem_name='$gem_name',
    gem_price='$gem_price',
    gem_image='$gem_image_path'
    where gem_id='$gem_id'
    ";
    $sql=mysqli_query($conn,$query);
    header('location:view_gems.php');
}


}

?>