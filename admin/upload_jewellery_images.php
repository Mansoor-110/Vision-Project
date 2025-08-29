<?php
session_start();
if(isset($_SESSION['admin_id'])){
  $user_name=$_SESSION['admin_name'];
  ?>
<!-- Template header -->
<?php include("header.php"); ?>

<!-- Template side bar -->
<?php include("sideBar.php"); ?>

<!-- Navbar -->
<?php include("navbar.php"); ?> 



<?php
 $body_id=$_GET['body_id'];
include('../includes/connection.php');
?>

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-center h3 font-weight-bold">Upload Jewellery Images</h4>

      <form class="forms-sample" method="post" action="upload_jewellery_images_crud.php" enctype="multipart/form-data">

         <input type="hidden" name="body_id" value="<?php echo $body_id?>">

              <!-- Product Tag -->
         <div class="form-group">
          <label for="exampleInputEmail3">Select Gem</label>
          <select name="gem" class="form-control" required>
            <option value=>Select</option>
            <?php 
            $query="select * from gems";
            $sql=mysqli_query($conn,$query);
            $total=mysqli_num_rows($sql);
            if($total>0){
              while($data=mysqli_fetch_assoc($sql)){
                ?>
              <option value="<?php echo $data['gem_name']?>"><?php echo ucwords($data['gem_name'])?></option>
                <?php
              }
            }
              ?>
         </select>
        </div>



        <!-- File upload -->
        <div class="form-group">
          <label>Preview Image</label>
          <input type="file" name="image[]" class="form-control" >
          <input type="hidden" name="position[]" class="form-control" value="1">
        </div>

        
        <div class="form-group">
          <label>Image 2</label>
          <input type="file" name="image[]" class="form-control" >
          <input type="hidden" name="position[]" class="form-control" value="2">
        </div>

        
        <div class="form-group">
          <label>Image 3</label>
          <input type="file" name="image[]" class="form-control">
          <input type="hidden" name="position[]" class="form-control" value="3">
        </div>

        
        <div class="form-group">
          <label>Image 4</label>
          <input type="file" name="image[]" class="form-control" >
          <input type="hidden" name="position[]" class="form-control" value="4">
        </div>

        
        
        
      
        <!-- Buttons -->
        <input type="submit" class="btn btn-success mr-2" value="Insert" name="submit">
        <a href="#" class="btn btn-danger">Cancel</a>

      </form>
    </div>
  </div>
</div>



<!-- Template footer -->
<?php include("footer.php"); ?>

<!-- JavaScript for category-subcategory linking -->

      <?php
}else{
  header('location:login.php');
}

?>