
<?php
$product_id = $_GET['id'];
include('../includes/connection.php');
$product_query = "SELECT * FROM add_product WHERE product_id='$product_id'";
$product_sql = mysqli_query($conn, $product_query);
$product_data = mysqli_fetch_assoc($product_sql);
?>
<?php
session_start();
if(isset($_SESSION['admin_id'])){
  ?>
<!-- Template header -->
<?php include("header.php"); ?>
<?php include("sideBar.php"); ?>
<?php include("navbar.php"); ?> 

<!-- Update Product Form -->
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-center h3 font-weight-bold">Update Product</h4>

      <form class="forms-sample" method="post" action="update_product_crud.php" enctype="multipart/form-data">
        <!-- Hidden ID -->
        <input type="hidden" name="product_id" value="<?php echo $product_data['product_id']; ?>">

        <div class="form-group">
          <label>Product Name</label>
          <input type="text" class="form-control" name="product_name" value="<?php echo $product_data['product_name']; ?>" required>
        </div>

        <div class="form-group">
          <label for="product_category">Category</label>
          <select class="form-control" name="product_category" id="category" onchange="updateSubcategories()" required>
            <option value="">Select Category</option>
            <option value="Jewellery" <?php if($product_data['product_category'] == 'Jewellery') echo 'selected'; ?>>Jewellery</option>
            <option value="Cosmetics" <?php if($product_data['product_category'] == 'Cosmetics') echo 'selected'; ?>>Cosmetics</option>
            <option value="Beauty Tools" <?php if($product_data['product_category'] == 'Beauty Tools') echo 'selected'; ?>>Beauty Tools</option>
          </select>
        </div>

        <div class="form-group">
          <label for="product_subcategory">Sub-Category</label>
          <select name="product_subcategory" class="form-control" id="subcategory">
            <!-- JS will populate this -->
          </select>
        </div>

        <div class="form-group">
          <label>Price</label>
          <input type="number" class="form-control" name="product_price" value="<?php echo $product_data['product_price']; ?>" required>
        </div>

        <div class="form-group">
          <label>Upload Image</label>
          <input type="file" name="product_image" class="form-control">
        </div>

        <div class="form-group">
          <label>Or Image URL</label>
          <input type="text" name="product_url" class="form-control" value="<?php echo $product_data['product_image']; ?>">
        </div>

        <div class="form-group">
          <label>Product Description</label>
          <textarea class="form-control" name="product_description" rows="4"><?php echo $product_data['product_description']; ?></textarea>
        </div>
                <!-- Product Tag -->
         <div class="form-group">
          <label for="exampleInputEmail3">Product Tag</label>
          <select name="product_tag" class="form-control">
            <option value="">Select Tag</option>
            <option value="Best Sellers"<?php if($product_data['product_tag'] == 'Best Sellers') echo 'selected'; ?>>Best Sellers</option>
            <option value="New Arrivals"<?php if($product_data['product_tag'] == 'New Arrivals') echo 'selected'; ?>>New Arrivals</option>
            <option value="Luxury Picks"<?php if($product_data['product_tag'] == 'Luxury Picks') echo 'selected'; ?>>Luxury Picks</option>
            <option value="Trending"<?php if($product_data['product_tag'] == ' Trending') echo 'selected'; ?>> Trending</option>
          </select>
        </div>

        <input type="submit" class="btn btn-success mr-2" value="Update" name="submit">
        <a href="view_product.php" class="btn btn-danger">Cancel</a>
      </form>
    </div>
  </div>
</div>

<!-- Template footer -->
<?php include("footer.php"); ?>

<!-- JavaScript for Dynamic Subcategory -->
<script>
function updateSubcategories() {
  const category = document.getElementById("category").value;
  const subcategory = document.getElementById("subcategory");

  const subcategories = {
    "Jewellery": ["Necklaces", "Earrings", "Rings", "Bracelets", "Luxury Collection"],
    "Cosmetics": ["Foundation", "Lipstick", "Eyeshadow", "Skincare", "New Arrivals"],
    "Beauty Tools": ["Brushes", "Mirrors", "Accessories"]
  };

  const selectedSub = "<?php echo $product_data['product_subcategory']; ?>";
  subcategory.innerHTML = "<option value=''>Select Subcategory</option>";

  if (subcategories[category]) {
    subcategories[category].forEach(function(sub) {
      const option = document.createElement("option");
      option.value = sub;
      option.textContent = sub;
      if (sub === selectedSub) {
        option.selected = true;
      }
      subcategory.appendChild(option);
    });
  }
}

window.onload = function() {
  updateSubcategories();
};
</script>
      <?php
}else{
  header('location:login.php');
}

?>