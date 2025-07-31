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
    <!-- Dashboard -->

 <?php 
    include"../includes/connection.php";
    $users_q="SELECT COUNT(*) AS users FROM user_acc";
    $carts_q="SELECT COUNT(*) AS carts FROM cart";
    $msg_q="SELECT COUNT(*) AS messages FROM contact";
    $product_q="SELECT COUNT(*) AS products FROM add_product";
    $wishlist_q="SELECT COUNT(*) AS wishlist FROM wishlist";
    $admin_q="SELECT COUNT(*) AS adminn FROM admin";
    // sql 
    $user_sql=mysqli_query($conn,$users_q);
    $cart_sql=mysqli_query($conn,$carts_q);
    $msg_sql=mysqli_query($conn,$msg_q);
    $product_sql=mysqli_query($conn,$product_q);
    $wishlist_sql=mysqli_query($conn,$wishlist_q);
    $admin_sql=mysqli_query($conn,$admin_q);
    // fetch data
    $user_data=mysqli_fetch_assoc($user_sql);
    $cart_data=mysqli_fetch_assoc($cart_sql);
    $msg_data=mysqli_fetch_assoc($msg_sql);
    $product_data=mysqli_fetch_assoc($product_sql);
    $wishlist_data=mysqli_fetch_assoc($wishlist_sql);
    $admin_data=mysqli_fetch_assoc($admin_sql);
    // display data
    ?>
<div class="row">
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Total Users</h5>
                    <div class="row">
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-account-multiple-plus text-primary ml-auto"></i>
                      </div>
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php echo $user_data['users']?></h2>
                         
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Cart Entries</h5>
                    <div class="row">
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-cart text-warning ml-auto"></i>
                      </div>
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php echo $cart_data['carts']?></h2>
                          
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Total Products on Website</h5>
                    <div class="row">
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-content-paste text-muted ml-auto"></i>
                      </div>
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php echo $product_data['products']?></h2>
                          
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Wishlist Entries</h5>
                    <div class="row">
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-heart text-danger ml-auto"></i>
                      </div>
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php echo $wishlist_data['wishlist']?></h2>
                          
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Total Admins</h5>
                    <div class="row">
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                   <i class=" icon-lg mdi mdi-account ml-auto text-info"></i>
                      </div>
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php echo $admin_data['adminn']?></h2>
                          
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-sm-4 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5>Messages</h5>
                    <div class="row">
                      <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                        <i class="icon-lg mdi mdi-message-text-outline text-success ml-auto"></i>
                      </div>
                      <div class="col-8 col-sm-12 col-xl-8 my-auto">
                        <div class="d-flex d-sm-block d-md-flex align-items-center">
                          <h2 class="mb-0"><?php echo $msg_data['messages']?></h2>
                        
                        </div>
                       
                      </div>
                    </div>
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