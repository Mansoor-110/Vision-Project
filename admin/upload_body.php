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

<!-- Insert-Product -->
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-center h3 font-weight-bold">Upload Jewellery Body</h4>

      <form class="forms-sample" method="post" action="upload_body_crud.php" enctype="multipart/form-data">


        <!-- File upload -->
        <div class="form-group">
          <label>Upload Image</label>
          <input type="file" name="image" class="form-control" required>
        </div>

        
        
        
        <!-- Product Tag -->
         <div class="form-group">
          <label for="exampleInputEmail3">Jewellery Type</label>
          <select name="body_type" class="form-control" required>
            <option value=>Select Type</option>
            <option value="necklace">Necklace</option>
            <option value="ring">Rings</option>
            <option value="earrings">Earrings</option>
            <option value="bracelet"> Bracelets</option>
          </select>
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