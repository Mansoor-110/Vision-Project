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
   <?php $body_id=$_GET['body_id']?>
    <?php
  if(isset($_GET['id'])){
    include '../includes/connection.php';
   
    $id = $_GET['id'];
    $query = "SELECT * FROM jewellery_variants order by position ASC WHERE id='$id'";
    $sql = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($sql);
    ?>
    <div style="position: fixed; top: 25%; left: 35%; background: #191C24; border:  none; padding: 30px; z-index: 9999; box-shadow: 0 2px 10px #0F1015; width: 400px; border-radius:10px;">
        <h4>Update Image</h4>
        <form action="update_jewellery_images.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <input type="hidden" name="body_id" value="<?php echo $data['body_id']; ?>">
            <input type="hidden" name="gem" value="<?php echo $data['gem']; ?>">
            <input type="hidden" name="position" value="<?php echo $data['position']; ?>">
            <input type="file" name="image" class="mt-2" required>
          <input type="submit" name="submit" class="btn btn-success mt-3" value="Update">
            <a href="view_jewellery_images.php?body_id=<?php echo $body_id?>" class="btn btn-danger mt-3">Cancel</a>
  
          </form>
      </div>
    <?php
}?>
   
      <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title text-center font-weight-bold h2">Jewellery Images of Body: <?php echo $body_id?></h3>
                  
                    </p>
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                      <table class="table table-muted table">
                        <thead>
                          <tr>
                           <td  class="text-white font-weight-bold">#</td>
                           <td class="text-white font-weight-bold">Body ID</td>
                           <td class="text-white font-weight-bold">Gem</td>
                           <td class="text-white font-weight-bold">Position</td>
                           <td class="text-white font-weight-bold">Images</td>
                           <td class="text-white font-weight-bold">Action</td>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
   include("../includes/connection.php");
   $query="select * from jewellery_variants where body_id=$body_id";
   $sql=mysqli_query($conn,$query);
   $total=mysqli_num_rows($sql);
   if($total>0){
    while($data=mysqli_fetch_assoc($sql)){
      
        ?>

                        <tr>
                            <td class="text-white font-weight-bold"><?php echo $data['id']?></td>
                            <td><?php echo $data['body_id']?></td>
                            <td><?php echo $data['gem']?></td>
                            <td><?php echo $data['position']?></td>
                              <td style="max-width:80px;"><img src="<?php echo $data['images']?>" alt="" style="height:80px; width:80px; border-radius:10%;"></td>
                                <td> <a href="delete_jewellery_images.php?id=<?php echo $data['id']?>&body_id=<?php echo $body_id?>" class="btn btn-outline-danger" title="delete"><i class="mdi mdi-delete"></i></a>
                                     
                </tr>
                              <?php
    }
   }
   ?>
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