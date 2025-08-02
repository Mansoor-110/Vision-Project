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
   
      <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title text-center font-weight-bold h2">Custom Jewellery Bodies</h3>
                  
                    </p>
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                      <table class="table table-muted table">
                        <thead>
                          <tr>
                            <th class="text-white font-weight-bold">#</th>
                            <th class="text-white font-weight-bold"style="max-width:80px;">Type</th>
                            <th class="text-white font-weight-bold"style="max-width:80px;">Image </th>
                            <th class="text-white font-weight-bold"style="max-width:80px;">View</th>
                            <th class="text-white font-weight-bold"style="max-width:80px;">Action</th> 
                        </tr>
                        </thead>
                        <tbody>
                            <?php
   include("../includes/connection.php");
   $query="select * from jewellery_bodies";
   $sql=mysqli_query($conn,$query);
   $total=mysqli_num_rows($sql);
   if($total>0){
    while($data=mysqli_fetch_assoc($sql)){
      
        ?>

                        <tr>
                            <td class="text-white"> <?php echo $data['id']?></td>
                            <td style="max-width:70px;"> <?php echo $data['body_type']?></td>
                    <td style="max-width:80px;"><img src="<?php echo $data['body_image']?>" alt="" style="height:80px; width:80px; border-radius:10%;"></td>
                <td class="text-white"style="max-width:70px;"><a href="view_jewellery_images.php?body_id= <?php echo $data['id']?>" class="btn btn-outline-success"><i class="mdi mdi-arrow-top-left" title="view uploaded image"></i></a></td>
                <td class="text-white"style="max-width:70px;">
                    <a href="upload_jewellery_images.php?body_id= <?php echo $data['id']?>" class="btn btn-outline-info" title="add images"><i class="mdi mdi-plus"></i></a>  <a href="delete_jewellery_bodies.php?body_id= <?php echo $data['id']?>" class="btn btn-outline-danger" title="delete"><i class="mdi mdi-delete"></i></a></td>
                                     
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