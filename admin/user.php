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
  <?php
  if(isset($_GET['id'])){
    include '../includes/connection.php';
   
    $id = $_GET['id'];
    $query = "SELECT * FROM user_acc WHERE id='$id'";
    $sql = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($sql);
    ?>
    <div style="position: fixed; top: 25%; left: 35%; background: #191C24; border:  none; padding: 30px; z-index: 9999; box-shadow: 0 2px 10px #0F1015; width: 400px; border-radius:10px;">
        <h4>Edit User</h4>
        <form action="update_user.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $data['name']; ?>" class="form-control mb-2 ">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $data['email']; ?>" class="form-control mb-2">
            <label>Password</label>
            <input type="text" name="password" value="<?php echo $data['password']; ?>" class="form-control mb-2">
            <input type="submit" name="submit" class="btn btn-success" value="Update">
            <a href="user.php" class="btn btn-danger">Cancel</a>
  
          </form>
      </div>
    <?php
}?>
   

      <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title text-center font-weight-bold h2"> User Accounts</h3>
                  
                    </p>
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                      <table class="table table-muted table">
                        <thead>
                          <tr>
                            <th class="text-white font-weight-bold"> #</th>
                            <th class="text-white font-weight-bold"> First name </th>
                            <th class="text-white font-weight-bold"> Email </th>
                            <th class="text-white font-weight-bold"> Password </th>
                            <th colspan="2" class="text-center text-white font-weight-bold"> Action </th>
                      
                          </tr>
                        </thead>
                        <tbody>
                            <?php
   include("../includes/connection.php");
   $query="select * from user_acc";
   $sql=mysqli_query($conn,$query);
   $total=mysqli_num_rows($sql);
   if($total>0){
    while($data=mysqli_fetch_assoc($sql)){
        $id=$data['id'];
        $name=$data['name'];
        $email= $data['email'];
        $password= $data['password'];
        ?>

                        <tr>
                            <td class="text-white"> <?php echo $id?></td>
                            <td> <?php echo $name?></td>
                            <td><?php echo $email?></td>
                            <td><?php echo $password?></td>
                            <td class="text-center"><a href="user.php?id=<?php echo $data['id']?>"class="btn btn-success"><i class="fa-solid fa-pencil"></i></a> <a href="delete_user.php?id=<?php echo $data['id']?>"class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
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