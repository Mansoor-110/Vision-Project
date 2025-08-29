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
<?php include("../includes/connection.php"); ?> 

<!-- Insert-Product -->
 <?php 
 if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query="select * from gems where gem_id='$id'";
    $sql=mysqli_query($conn,$query);
    $data=mysqli_fetch_assoc($sql);
    
    ?>
    <div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-center h3 font-weight-bold">Update Gem</h4>

      <form class="forms-sample" method="post" action="update_gem_crud.php" enctype="multipart/form-data">


        <!-- File upload -->
        <div class="form-group">
          <label>Write Gem Name Here</label>
          <input type="text" name="gem_name" class="form-control" value="<?php echo $data['gem_name']?>" required>
          <input type="hidden" name="gem_id" class="form-control" Value="<?php echo $id?>" >
        </div>
        <div class="form-group">
          <label>Enter Price</label>
          <input type="number" name="gem_price" class="form-control"value="<?php echo $data['gem_price']?>" required>
        </div>
        <div class="form-group">
          <label>Upload Image</label>
          <input type="file" name="gem_image" class="form-control" required>
        </div>
               <!-- Buttons -->
        <input type="submit" class="btn btn-success mr-2" value="Insert" name="submit">
        <a href="view_gems.php" class="btn btn-danger">Cancel</a>

      </form>
    </div>
  </div>
</div>

    <?php
 }else{
    ?>
    <div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-center h3 font-weight-bold">Upload Gem</h4>

      <form class="forms-sample" method="post" action="upload_gem_crud.php" enctype="multipart/form-data">


        <!-- File upload -->
        <div class="form-group">
          <label>Write Gem Name Here</label>
          <input type="text" name="gem_name" class="form-control" placeholder="Gem Name." required>
        </div>
        <div class="form-group">
          <label>Enter Price</label>
          <input type="number" name="gem_price" class="form-control" placeholder="Gem Price." required>
        </div>
        <div class="form-group">
          <label>Upload Image</label>
          <input type="file" name="gem_image" class="form-control" required>
        </div>

        
        
        
        
      
        <!-- Buttons -->
        <input type="submit" class="btn btn-success mr-2" value="Insert" name="submit">
        <a href="#" class="btn btn-danger">Cancel</a>

      </form>
    </div>
  </div>
</div>
    <?php
 }
 ?>


<!-- Template footer -->
<?php include("footer.php"); ?>

<!-- JavaScript for category-subcategory linking -->

      <?php
}else{
  header('location:login.php');
}

?>