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
include('../includes/connection.php');

?>

  <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="container mt-5">
  <h3 class="card-title text-center font-weight-bold h2">User Messages</h3>
   <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
  <table class="table  table-muted">
    <thead>
      <tr>
        <th class="text-white font-weight-bold">ID</th>
         <th class="text-white font-weight-bold">Name</th>
       <th class="text-white font-weight-bold">Email</th>
         <th class="text-white font-weight-bold">Phone</th>
         <th class="text-white font-weight-bold">Subject</th>
         <th class="text-white font-weight-bold">Message</th>
         <th class="text-white font-weight-bold">Action</th>
      </tr>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM contact";
$sql = mysqli_query($conn, $query);
while($data = mysqli_fetch_assoc($sql)){
?>
      <tr>
        <td class="text-white"><?php echo $data['id']; ?></td>
        <td><?php echo $data['FirstName'] . ' ' . $data['Lastname']; ?></td>
        <td   style="max-width: 150px; word-wrap: break-word; white-space: normal;"><?php echo $data['Email']; ?></td>
        <td><?php echo $data['Phnum']; ?></td>
        <td><?php echo $data['Subject']; ?></td>
        <td style="min-width: 180px; word-wrap: break-word; white-space: normal;"><?php echo $data['Message']; ?></td>
        <td>
          <a href="delete_message.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
        </td>
      </tr>
<?php } ?>
    </tbody>
  </table>
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