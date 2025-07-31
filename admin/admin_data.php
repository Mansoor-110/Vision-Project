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
   
    <!-- Admin-Data -->
<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <?php
                    if(isset($_SESSION['can-not'])){
                        ?>

                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
  <strong>Alert !</strong> You can't <?php echo $_SESSION['can-not']?> your own self.
</div>
                        <?php
                        unset($_SESSION['can-not']);
                    }
                    ?>
                    <h3 class="card-title text-center font-weight-bold h2"> Admins</h3>
                  
                    </p>
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                      <table class="table table-muted table">
                        <thead>
                          <tr>
                            <th class="text-white font-weight-bold"> User </th>
                            <th class="text-white font-weight-bold"> #</th>
                            <th class="text-white font-weight-bold"> First name </th>
                            <th class="text-white font-weight-bold"> Email </th>
                            <th class="text-white font-weight-bold"> Password </th>
                            <th class="text-white font-weight-bold"> Status</th>
                            <th colspan="2" class="text-center text-white font-weight-bold"> Action </th>
                      
                          </tr>
                        </thead>
                        <tbody>
                            <?php
   include("../includes/connection.php");
   $query="select * from admin";
   $sql=mysqli_query($conn,$query);
   $total=mysqli_num_rows($sql);
   if($total>0){
    while($data=mysqli_fetch_assoc($sql)){
        $id=$data['user_id'];
        $name=$data['user_name'];
        $email= $data['user_email'];
        $password= $data['user_password'];
        $status= $data['status'];
        $image= $data['user_image'];
        ?>

                        <tr>
                            <td class="py-1">
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
                            </td>
                            <td class="text-white"> <?php echo $id?></td>
                            <td> <?php echo $name?></td>
                            <td><?php echo $email?></td>
                            <td><?php echo $password?></td>
                            <td><?php echo $status?></td>
                           <td class="text-center"><a href="approve_admin.php?id=<?php echo $id?>" class="btn btn-outline-success"><i class="fa-solid fa-check" title="Approve"></i></a> <a href="reject_admin.php?id=<?php echo $id?>" class="btn btn-outline-info"><i class="fa-solid fa-xmark" title="Reject"></i></a>  <a href="delete_admin.php?id=<?php echo $id?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash" title="Remove Admin"></i></a></td>
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
   <?php include("footer.php");?>
         <?php
}else{
  header('location:login.php');
}

?>