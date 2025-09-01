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

<!-- Coupon Form -->  
<?php   
if(isset($_GET['id'])){     
  $id = $_GET['id'];     
  $query = "SELECT * FROM coupons WHERE id='$id'";     
  $sql = mysqli_query($conn, $query);     
  $data = mysqli_fetch_assoc($sql);          
?>     
<div class="col-12 grid-margin stretch-card">   
  <div class="card">     
    <div class="card-body">       
      <h4 class="card-title text-center h3 font-weight-bold">Update Coupon</h4>        
      <form class="forms-sample" method="post" action="update_coupon_crud.php">           
        <!-- Hidden ID field -->
        <input type="hidden" name="coupon_id" value="<?php echo $id; ?>">
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">               
              <label>Coupon Code</label>               
              <input type="text" name="coupon_code" class="form-control" value="<?php echo $data['coupon_code']; ?>" required>           
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">               
              <label>Discount Type</label>               
              <select name="discount_type" class="form-control" required>
                <option value="percentage" <?php echo ($data['discount_type'] == 'percentage') ? 'selected' : ''; ?>>Percentage (%)</option>
                <option value="fixed" <?php echo ($data['discount_type'] == 'fixed') ? 'selected' : ''; ?>>Fixed Amount</option>
              </select>           
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">               
              <label>Discount Value</label>               
              <input type="number" step="0.01" name="discount_value" class="form-control" value="<?php echo $data['discount_value']; ?>" required>           
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">               
              <label>Minimum Amount</label>               
              <input type="number" step="0.01" name="minimum_amount" class="form-control" value="<?php echo $data['minimum_amount']; ?>" required>           
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">               
              <label>Maximum Discount</label>               
              <input type="number" step="0.01" name="maximum_discount" class="form-control" value="<?php echo $data['maximum_discount']; ?>">           
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">               
              <label>Usage Limit</label>               
              <input type="number" name="usage_limit" class="form-control" value="<?php echo $data['usage_limit']; ?>">           
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">               
              <label>Valid From</label>               
              <input type="datetime-local" name="valid_from" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($data['valid_from'])); ?>" required>           
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">               
              <label>Valid Until</label>               
              <input type="datetime-local" name="valid_until" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($data['valid_until'])); ?>" required>           
            </div>
          </div>
        </div>
        
        <div class="form-group">               
          <label>Status</label>               
          <select name="status" class="form-control" required>
            <option value="active" <?php echo ($data['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
            <option value="inactive" <?php echo ($data['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
            <option value="expired" <?php echo ($data['status'] == 'expired') ? 'selected' : ''; ?>>Expired</option>
          </select>           
        </div>
        
        <!-- Buttons -->         
        <input type="submit" class="btn btn-success mr-2" value="Update" name="submit">         
        <a href="view_coupons.php" class="btn btn-danger">Cancel</a>        
      </form>     
    </div>   
  </div> 
</div>      

<?php  
} else {     
?>     
<div class="col-12 grid-margin stretch-card">   
  <div class="card">     
    <div class="card-body">       
      <h4 class="card-title text-center h3 font-weight-bold">Create New Coupon</h4>        
      <form class="forms-sample" method="post" action="create_coupon_crud.php">           
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">               
              <label>Coupon Code</label>               
              <input type="text" name="coupon_code" class="form-control" placeholder="Enter coupon code" required>           
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">               
              <label>Discount Type</label>               
              <select name="discount_type" class="form-control" required>
                <option value="">Select discount type</option>
                <option value="percentage">Percentage (%)</option>
                <option value="fixed">Fixed Amount</option>
              </select>           
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">               
              <label>Discount Value</label>               
              <input type="number" step="0.01" name="discount_value" class="form-control" placeholder="Enter discount value" required>           
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">               
              <label>Minimum Amount</label>               
              <input type="number" step="0.01" name="minimum_amount" class="form-control" placeholder="Minimum order amount" required>           
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">               
              <label>Maximum Discount (Optional)</label>               
              <input type="number" step="0.01" name="maximum_discount" class="form-control" placeholder="Maximum discount limit">           
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">               
              <label>Usage Limit (Optional)</label>               
              <input type="number" name="usage_limit" class="form-control" placeholder="How many times can be used">           
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">               
              <label>Valid From</label>               
              <input type="datetime-local" name="valid_from" class="form-control" required>           
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">               
              <label>Valid Until</label>               
              <input type="datetime-local" name="valid_until" class="form-control" required>           
            </div>
          </div>
        </div>
        
        <div class="form-group">               
          <label>Status</label>               
          <select name="status" class="form-control" required>
            <option value="">Select status</option>
            <option value="active" selected>Active</option>
            <option value="inactive">Inactive</option>
          </select>           
        </div>
        
        <!-- Buttons -->         
        <input type="submit" class="btn btn-success mr-2" value="Create Coupon" name="submit">         
        <a href="view_coupons.php" class="btn btn-danger">Cancel</a>        
      </form>     
    </div>   
  </div> 
</div>     
<?php  
}  
?>   

<!-- Template footer --> 
<?php include("footer.php"); ?>  

<?php 
} else {   
  header('location:login.php'); 
}  
?>