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
        ORDERS
      </h3>
      <div class="table-responsive" style="max-height: 400px; overflow-y: auto">
        <table class="table table-muted">
          <thead>
            <tr>
              <th class="text-white font-weight-bold">ID</th>
              <th class="text-white font-weight-bold">User ID</th>
              <th class="text-white font-weight-bold">Order No</th>
              <th class="text-white font-weight-bold">First Name</th>
              <th class="text-white font-weight-bold">Last Name</th>
              <th class="text-white font-weight-bold">Email</th>
              <th class="text-white font-weight-bold">Phone</th>
              <th class="text-white font-weight-bold">Address</th>
              <th class="text-white font-weight-bold">City</th>
              <th class="text-white font-weight-bold">Postal Code</th>
              <th class="text-white font-weight-bold">Payment Method</th>
              <th class="text-white font-weight-bold">Payment Status</th>
              <th class="text-white font-weight-bold">Transaction ID</th>
              <th class="text-white font-weight-bold">Subtotal</th>
              <th class="text-white font-weight-bold">Shipping Cost</th>
              <th class="text-white font-weight-bold">Discount Amount</th>
              <th class="text-white font-weight-bold">Total Amount</th>
              <th class="text-white font-weight-bold">Order Status</th>
              <th class="text-white font-weight-bold">Created At</th>
              <th class="text-white font-weight-bold">Updated At</th>
            </tr>
          </thead>
          <tbody>
            <?php
$query = "SELECT * FROM orders";
$sql = mysqli_query($conn, $query);
while($data = mysqli_fetch_assoc($sql)){
?>
            <tr>
              <td class="text-white"><?php echo $data['id']; ?></td>
              <td><?php echo $data['user_id']; ?></td>
              <td><?php echo $data['order_number']; ?></td>
              <td><?php echo $data['first_name']; ?></td>
              <td><?php echo $data['last_name']; ?></td>
              <td><?php echo $data['email']; ?></td>
              <td><?php echo $data['phone']; ?></td>
                <td><?php echo $data['address']; ?></td>
                <td><?php echo $data['city']; ?></td>
                <td><?php echo $data['postal_code']; ?></td>
                <td><?php echo $data['payment_method']; ?></td>
                <td><?php echo $data['payment_status']; ?></td>
                <td><?php echo $data['transaction_id']; ?></td>
                <td><?php echo $data['subtotal']; ?></td>
                <td><?php echo $data['shipping_cost']; ?></td>
                <td><?php echo $data['discount_amount']; ?></td>
                <td><?php echo $data['total_amount']; ?></td>
                <td><?php echo $data['order_status']; ?></td>
                <td><?php echo $data['created_at']; ?></td>
                <td><?php echo $data['updated_at']; ?></td>
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