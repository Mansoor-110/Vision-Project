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
       Gems
      </h3>
      <div class="table-responsive" style="max-height: 400px; overflow-y: auto">
        <table class="table table-muted">
          <thead>
            <tr>
              <th class="text-white font-weight-bold">#</th>
              <th class="text-white font-weight-bold">Gem Name</th>
              <th class="text-white font-weight-bold">Gem Price</th>
              <th class="text-white font-weight-bold">Gem Image</th>
              <th class="text-white font-weight-bold">Action</th>
            </tr>
          </thead>
          <tbody>
          
    <?php
    include('../includes/connection.php');
    $query='select * from gems';
    $sql=mysqli_query($conn,$query);
    $total=mysqli_num_rows($sql);
    if($total>0){
      while($data=mysqli_fetch_assoc($sql)){
?>
  <tr>
              <td class="text-white"><?php echo $data['gem_id']; ?></td>
              <td><?php echo $data['gem_name']; ?></td>
              <td><?php echo $data['gem_price']; ?></td>
              <td><img src="<?php echo $data['gem_image']; ?>" alt="" style=" width:50px; height:50px; border-radius:0px;"></td>
              <td><a href="gem_upload.php ?id=<?php echo $data['gem_id']?>" class="btn btn-success"><i class="mdi mdi-lead-pencil"></i></a> <a href="delete_gem.php ?id=<?php echo $data['gem_id']?>" class="btn btn-danger"><i class="mdi mdi-delete"></i></a></td>
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