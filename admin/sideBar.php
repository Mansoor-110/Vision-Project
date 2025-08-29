                  <?php 
                  if(isset($_SESSION['admin_id'])){
                    $user_id=$_SESSION['admin_id'];
                    $user_name=$_SESSION['admin_name'];
                    include('../includes/connection.php');
                    $query="SELECT * FROM admin WHERE user_id='$user_id'";
                    $sql=mysqli_query($conn,$query);
                    $data=mysqli_fetch_assoc($sql);
                  }
                  ?>
 <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="https://www.bootstrapdash.com/demo/corona-free/jquery/template/index.html"><img src="./Corona Admin_files/logo.svg" alt="logo"></a>
          <a class="sidebar-brand brand-logo-mini" href="https://www.bootstrapdash.com/demo/corona-free/jquery/template/index.html"><img src="./Corona Admin_files/logo-mini.svg" alt="logo"></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                                <div class="rounded-circle" 
     style="
         width: 50px; 
         height: 50px; 
         background-image: url('<?php echo $data['user_image']; ?>'); 
         background-size: cover; 
         background-position: center; 
         background-repeat: no-repeat;
         display: inline-block;
     ">
</div>
                  <span class="count bg-success" style="margin-top:12px;"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?php echo $user_name?></h5>
                  <span>Gold Member</span>
                </div>
              </div>
              <a href="https://www.bootstrapdash.com/demo/corona-free/jquery/template/index.html#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="https://www.bootstrapdash.com/demo/corona-free/jquery/template/index.html#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                     <i class="fa-solid fa-gear text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                
                <div class="dropdown-divider"></div>
                <a  href="logout.php"class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Logout</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items active">
            <a class="nav-link" href="index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="user.php">
              <span class="menu-icon">
                <i class="mdi mdi-account-multiple-outline text-primary"></i>
              </span>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="cart.php">
              <span class="menu-icon">
                <i class="mdi mdi-cart text-warning"></i>
              </span>
              <span class="menu-title">Cart Entries</span>
            </a>
          </li>          

          <li class="nav-item menu-items">
            <a class="nav-link" href="messages.php">
              <span class="menu-icon">
                <i class="mdi mdi-message-processing"></i>
              </span>
              <span class="menu-title">User Messages</span>
            </a>
          </li>

 <!-- Product Dropdown -->
<li class="nav-item menu-items">
  <a class="nav-link" data-toggle="collapse" href="#product-menu" aria-expanded="false" aria-controls="product-menu">
    <span class="menu-icon">
      <i class="fa-solid fa-upload"></i>
    </span>
    <span class="menu-title">Product</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="product-menu">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"> <a class="nav-link" href="product.php">Add Product</a></li>
      <li class="nav-item"> <a class="nav-link" href="view_product.php">View Products</a></li>
      <li class="nav-item"> <a class="nav-link" href="additional_product_images.php">View Added Images</a></li>
    </ul>
  </div>
</li>

<!-- // add-product-page -->
    
          <li class="nav-item menu-items">
            <a class="nav-link" href="admin_data.php">
              <span class="menu-icon">
                <i class="icon-md fa-solid fa-user-secret text-danger"></i>
              </span>
              <span class="menu-title">Admins</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="orders.php">
              <span class="menu-icon">
                <i class="icon-md fa-solid fa-user-secret text-danger"></i>
              </span>
              <span class="menu-title">Orders</span>
            </a>
          </li>
          
      <!-- Custom Jewellery Dropdown -->
<li class="nav-item menu-items">
  <a class="nav-link" data-toggle="collapse" href="#custom-jewellery-menu" aria-expanded="false" aria-controls="custom-jewellery-menu">
    <span class="menu-icon">
      <i class="fa-solid fa-upload"></i>
    </span>
    <span class="menu-title">Custom Jewellery</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="custom-jewellery-menu">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"> <a class="nav-link" href="gem_upload.php">Add Gems</a></li>
      <li class="nav-item"> <a class="nav-link" href="view_gems.php">View Gems</a></li>
      <li class="nav-item"> <a class="nav-link" href="upload_body.php">Add Jewellery Body</a></li>
      <li class="nav-item"> <a class="nav-link" href="view_jewellery_body.php">View Jewellery Bodies</a></li>
    </ul>
  </div>
</li>
 
          
        </ul>
      </nav>