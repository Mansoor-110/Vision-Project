<?php
session_start();
if(isset($_SESSION['admin_id'])){
  $user_name=$_SESSION['admin_name'];
  ?>
<!-- Template header -->
 
<?php include("header.php"); ?>

<!-- Template side bar -->
<?php include("sideBar.php"); ?>

<!-- -- Navbar -- -->
<?php include("navbar.php"); ?>

<!-- Cart Entries -->
<?php
include('../includes/connection.php');

?>

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h3 class="card-title text-center font-weight-bold h2">
        Coupons
      </h3>
      <div class="table-responsive" style="max-height: 400px; overflow-y: auto">
        <table class="table table-muted">
          <thead>
            <tr>
              <th class="text-white font-weight-bold">ID</th>
              <th class="text-white font-weight-bold">Coupon Code</th>
              <th class="text-white font-weight-bold">Discount Type</th>
              <th class="text-white font-weight-bold">Discount Value</th>
              <th class="text-white font-weight-bold">Min Amount</th>
              <th class="text-white font-weight-bold">Max Amount</th>
              <th class="text-white font-weight-bold">Usage Limit</th>
              <th class="text-white font-weight-bold">Used Count</th>
              <th class="text-white font-weight-bold">Valid From</th>
              <th class="text-white font-weight-bold">Valid Until</th>
              <th class="text-white font-weight-bold">Status</th>
              <th class="text-white font-weight-bold">Created At</th>
            </tr>
          </thead>
          <tbody>
            <?php
$query = "SELECT * FROM coupons";
$sql = mysqli_query($conn, $query);
while($data = mysqli_fetch_assoc($sql)){
?>
            <tr>
              <td class="text-white"><?php echo $data['id']; ?></td>
              <td><?php echo $data['coupon_code']; ?></td>
              <td><?php echo $data['discount_type']; ?></td>
              <td><?php echo $data['discount_value']; ?></td>
              <td><?php echo $data['minimum_amount']; ?></td>
              <td><?php echo $data['maximum_discount']; ?></td>
              <td><?php echo $data['usage_limit']; ?></td>
              <td><?php echo $data['used_count']; ?></td>
              <td><?php echo $data['valid_from']; ?></td>
              <td><?php echo $data['valid_until']; ?></td>
              <td><?php echo $data['status']; ?></td>
              <td><?php echo $data['created_at']; ?></td>
              <td>
            
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Template footer -->
<?php include("footer.php"); ?>
      <?php
}else{
  header('location:login.php');
}

?>