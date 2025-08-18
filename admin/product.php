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
      <input type="hidden" name="seller_name" value="Offical Lumina">
      <h4 class="card-title text-center h3 font-weight-bold">Insert Product</h4>

      <form class="forms-sample" method="post" action="product_crud.php" enctype="multipart/form-data">

        <!-- Product Name -->
        <div class="form-group">
          <label for="exampleInputName1">Product Name</label>
          <input type="text" class="form-control" placeholder="Product Name" name="product_name">
        </div>

        <!-- Category -->
        <div class="form-group">
          <label for="exampleInputEmail3">Category</label>
          <select class="form-control" name="product_category" id="category" onchange="updateSubcategories()">
            <option value="">Select Category</option>
            <option value="Jewellery">Jewellery</option>
            <option value="Cosmetics">Cosmetics</option>
            <option value="Beauty Tools">Beauty Tools</option>
          </select>
        </div>
        <input type="hidden" name="seller_id" value="admin">
        <input type="hidden" name="redirect_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <!-- Subcategory -->
        <div class="form-group">
          <label for="exampleInputEmail3">Sub-Category</label>
          <select name="product_subcategory" class="form-control" id="subcategory">
            <option value="">Select Subcategory</option>
          </select>
        </div>

        <!-- Price -->
        <div class="form-group">
          <label for="Price">Price</label>
          <input type="number" class="form-control" placeholder="Price" name="product_price">
        </div>

        <!-- File upload -->
        <div class="form-group">
          <label>File upload</label>
          <input type="file" name="product_image" class="form-control">
        </div>

        <!-- Image URL -->
        <div class="form-group">
          <label for="product_url">URL</label>
          <input type="text" class="form-control" placeholder="Enter image URL (optional)" name="product_url">
        </div>

        <!-- Description -->
        <div class="form-group">
          <label for="exampleTextarea1">Product Description</label>
          <textarea class="form-control" rows="4" name="product_description"></textarea>
        </div>
        
        <!-- Product Tag -->
         <div class="form-group">
          <label for="exampleInputEmail3">Product Tag</label>
          <select name="product_tag" class="form-control">
            <option value="">Select Tag</option>
            <option value="Best Sellers">Best Sellers</option>
            <option value="New Arrivals">New Arrivals</option>
            <option value="Luxury Picks">Luxury Picks</option>
            <option value="Trending"> Trending</option>
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
<script>
function updateSubcategories() {
  const category = document.getElementById("category").value;
  const subcategory = document.getElementById("subcategory");

  const subcategories = {
    "Jewellery": ["Necklaces", "Earrings", "Rings", "Bracelets", "Luxury Collection"],
    "Cosmetics": ["Foundation", "Lipstick", "Eyeshadow", "Skincare", "New Arrivals"],
    "Beauty Tools": ["Brushes", "Mirrors", "Accessories"]
  };

  subcategory.innerHTML = "<option value=''>Select Subcategory</option>";

  if (subcategories[category]) {
    subcategories[category].forEach(function(sub) {
      const option = document.createElement("option");
      option.value = sub;
      option.textContent = sub;
      subcategory.appendChild(option);
    });
  }
}
</script>
      <?php
}else{
  header('location:login.php');
}

?>