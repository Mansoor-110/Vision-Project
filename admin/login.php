<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body style="background-image:url('Login_bg.jpg'); background-size:cover;">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            
          <div class="card col-lg-4 mx-auto">
                                <?php 
                    if(isset($_SESSION['N/A'])){
                      $msg=$_SESSION['N/A'];
                      if(str_contains($msg,"Invalid User Name or Password")){
                        $message="Please enter valid user name and password";
                      }elseif(str_contains($msg,"Status: Not Approved")){
                        $message=" Your account is not approved by the admin";
                      }
                      ?>
                      <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        <i class="fa-solid fa-triangle-exclamation"></i>
  <strong><?php echo $msg?></strong><p class=""><?php echo $message?></p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                      <?php
                      unset($_SESSION['N/A']);
                    }
                    ?>
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form action="admin_login.php" method="POST">
                  <div class="form-group">

                    <!-- // yahan se krna hai agla kaam -->
                    <label class="text-white">Username Email</label>
                    <input type="text" class="form-control p_input" name="user_name">
                  </div>
                  <div class="form-group">
                    <label class="text-white">Password *</label>
                    <input type="text" class="form-control p_input" name="user_password" Required>
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between" Required>

                    <a href="#" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <input type="submit" class="btn btn-primary btn-block enter-btn" name="submit" value="Login">
                  </div>
                  <p class="sign-up text-muted">Don't have an Account?<a href="register.php"> Sign Up</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
     <script src="https://kit.fontawesome.com/8b620ac60c.js" crossorigin="anonymous"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>