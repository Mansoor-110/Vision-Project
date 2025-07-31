  <!-- Template header -->
   <?php
session_start();
if(isset($_SESSION['admin_id'])){
  $user_name=$_SESSION['admin_name'];
  ?>
   <?php include("header.php"); ?>
  
  <!-- Template side bar -->
   <?php include("sideBar.php"); ?>

   <!-- -- Navbar -- -->
   <?php include("navbar.php"); ?>
    
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h3 class="card-title text-center font-weight-bold h2">
        All Additonal Product Images
      </h3>
      <div class="table-responsive" style="max-height: 400px; overflow-y: auto">
        <table class="table table-muted">
          <thead>
            <tr>
              <th class="text-white font-weight-bold">ID</th>
              <th class="text-white font-weight-bold">Product ID</th>
              <th class="text-white font-weight-bold">Product Images</th>
              <th class="text-white font-weight-bold">Action</th>
            </tr>
          </thead>
          <tbody>
          
    <?php
    include('../includes/connection.php');
    $query='select * from additional_images ';
    $sql=mysqli_query($conn,$query);
    $total=mysqli_num_rows($sql);
    if($total>0){
      while($data=mysqli_fetch_assoc($sql)){
?>
  <tr>
              <td class="text-white"><?php echo $data['id']; ?></td>
              <td><?php echo $data['product_id']; ?></td>
              <td><img src="<?php echo $data['product_image']; ?>" alt="" style=" width:50px; height:50px; border-radius:0px;"></td>
              <td><a href="delete_image.php ?id=<?php echo $data['id']?>" class="btn btn-danger"><i class="mdi mdi-delete"></i></a></td>
            </tr>
            <?php 
          }
          } ?>
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