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
        All Cart Entries
      </h3>
      <div class="table-responsive" style="max-height: 400px; overflow-y: auto">
        <table class="table table-muted">
          <thead>
            <tr>
              <th class="text-white font-weight-bold">ID</th>
              <th class="text-white font-weight-bold">User ID</th>
              <th class="text-white font-weight-bold">Product</th>
              <th class="text-white font-weight-bold">Price</th>
              <th class="text-white font-weight-bold">Quantity</th>
              <th class="text-white font-weight-bold">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
$query = "SELECT * FROM cart";
$sql = mysqli_query($conn, $query);
while($data = mysqli_fetch_assoc($sql)){
?>
            <tr>
              <td class="text-white"><?php echo $data['item']; ?></td>
              <td><?php echo $data['user_id']; ?></td>
              <td><?php echo $data['product_name']; ?></td>
              <td><?php echo $data['product_price']; ?></td>
              <td><?php echo $data['quantity']; ?></td>
              <td>
                <a
                  href="delete_cart.php?item=<?php echo $data['item']; ?>"
                  class="btn btn-danger btn-sm"
                  ><i class="fa-solid fa-trash"></i
                ></a>
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