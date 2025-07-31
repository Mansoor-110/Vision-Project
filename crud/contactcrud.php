<?php
session_start();
include'../includes/connection.php';
if(isset($_POST['submitbtn'])){
   $FirstName = mysqli_real_escape_string($conn, $_POST['FirstName']);
    $LastName  = mysqli_real_escape_string($conn, $_POST['LastName']);
    $Email     = mysqli_real_escape_string($conn, $_POST['Email']);
    $Phnum     = mysqli_real_escape_string($conn, $_POST['Phnum']);
    $Subject   = mysqli_real_escape_string($conn, $_POST['subject']);
    $message   = mysqli_real_escape_string($conn, $_POST['message']);


    // echo "First Name $FirstName";
    // echo "Last Name $LastName";
    // echo "Email $Email ";
    // echo "Phone $Phnum ";
    // echo "Subject $Subject";
    // echo "Message $message ";
    // $subject=strtoupper($Subject);

    $query = "insert into contact (FirstName,Lastname,Email,Phnum,Subject,Message) values ('$FirstName','$LastName','$Email','$Phnum','$Subject','$message')";
    $sql =  mysqli_query($conn,$query);
    if($sql){
        $_SESSION['submited']="Your request regarding $Subject has been delivered to us.";
        header("location:../pages/contact.php");
    }
}
?>