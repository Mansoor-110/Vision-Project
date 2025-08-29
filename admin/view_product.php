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
   <style>
    .description{
      max-width:200px;
     word-wrap: break-word; 
      white-space: normal;
    }
   </style>
   <?php
if(isset($_GET['id'])){
$product_id=$_GET['id'];

?>
<div style="position: fixed; top: 30%; left: 35%; background: #191C24; border:  none; padding: 30px; z-index: 9999; box-shadow: 0 2px 10px #0F1015; width: 400px; border-radius:10px;">
        <h4>Add addtional Images of Product</h4>
        <form action="add_images_product.php" method="POST" enctype="multipart/form-data">
          <label for="">Product-ID : <?php echo $product_id?></label>
            <input type="hidden" name="product_id" value="<?php echo $product_id?>">
            <input type="file" name="added_image[]" value="" class="mb-4" multiple>
            <input type="submit" name="submit" class="btn btn-success" value="Upload">
            <a href="view_product.php" class="btn btn-danger">Cancel</a>
  
          </form>
      </div>
      <?php
}
?>
   <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title text-center font-weight-bold h2">Website Products</h3>
                  
                    </p>
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-muted">

                        <thead>
                          <tr>
                            <th class="text-white font-weight-bold"> Id </th>
                            <th class="text-white font-weight-bold"> Name</th>
                            <th class="text-white font-weight-bold"> Category</th>
                            <th class="text-white font-weight-bold"> SubCategory</th>
                            <th class="text-white font-weight-bold"> Price</th>
                            <th class="text-white font-weight-bold"> Image</th>
                            <th class="text-white font-weight-bold"> Description </th>
                            <th class="text-white font-weight-bold"> Tag </th>
                            <th colspan="2" class="text-center text-white font-weight-bold"> Action </th>
                      
                          </tr>
                        </thead>
                        <tbody>

      <?php
      include('../includes/connection.php');
      $query="select * from add_product";
      $sql=mysqli_query($conn,$query);
      $total=mysqli_num_rows($sql);
      if($total>0){
        while($data=mysqli_fetch_assoc($sql)){
          $tag= $data['product_tag'];
          if(empty($tag)){
            $tag="No Tag";
          }
        ?>

<tr>
                         
                            <td class="text-white"> <?php echo $data['product_id']?></td>
                            <td style="max-width: 150px; word-wrap: break-word; white-space: normal;">  <?php echo $data['product_name']?></td>
                            <td style="max-width: 100px; word-wrap: break-word; white-space: normal;"> <?php echo $data['product_category']?></td>
                            <td style="max-width: 100px; word-wrap: break-word; white-space: normal;"> <?php echo $data['product_subcategory']?></td>
                            <td> <?php echo $data['product_price']?></td>
                            <td><img src="<?php echo $data['product_image']?>" alt="" style="height:100px; width:100px; border-radius:0%;"></td>
                            <td style="max-width: 250px; word-wrap: break-word; white-space: normal;"><?php echo $data['product_description']?></td>
                            <td style="max-width: 250px; word-wrap: break-word; white-space: normal;"><?php echo $tag?></td>
                            <td><a href="update_product.php?id=<?php echo $data['product_id']?>" class="btn btn-success"><i class="mdi mdi-lead-pencil"></i></a> <a href="delete_product.php?id=<?php echo $data['product_id']?>&redirect_url=view_product.php" class="btn btn-danger"><i class="mdi mdi-delete"></i></a> <a href="view_product.php?id=<?php echo $data['product_id']?>" class="btn btn-info "><i class="mdi mdi-plus " title="Add more images"></i></a></td>
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