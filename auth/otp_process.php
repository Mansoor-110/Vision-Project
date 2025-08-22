<?php 
session_start();

if(!isset($_SESSION['temp_user'])){
    header('location:signup.php');
    exit();
}

if(isset($_POST['verify_otp'])){
    $entered_otp = $_POST['otp1'] . $_POST['otp2'] . $_POST['otp3'] . $_POST['otp4'] . $_POST['otp5'] . $_POST['otp6'];
    $stored_otp = $_SESSION['temp_user']['otp'];
    $otp_expiry = $_SESSION['temp_user']['otp_expiry'];
    
    // Check if OTP has expired
    if(strtotime($otp_expiry) < time()){
        $_SESSION['otp_error'] = 'OTP has expired. Please request a new one.';
        header('location:otp.php');
        exit();
    }
    
    // Verify OTP
    if($entered_otp == $stored_otp){
        // OTP is correct, NOW create the user account
        include '../includes/connection.php';
        
        $role = $_SESSION['temp_user']['role'];
        $name = mysqli_real_escape_string($conn, $_SESSION['temp_user']['name']);
        $email = mysqli_real_escape_string($conn, $_SESSION['temp_user']['email']);
        $password = $_SESSION['temp_user']['password'];
        
        // Insert user into database (without hashing password)
        $query = "INSERT INTO user_acc(name, email, password, user_role, email_verified, created_at) 
                  VALUES ('$name', '$email', '$password', '$role', 1, NOW())";
        
        $sql = mysqli_query($conn, $query);
        
        if($sql){
            // Clear temp user data
            unset($_SESSION['temp_user']);
            
            // Set success message
            $_SESSION['account_created'] = 'Account created successfully! Your email has been verified. Please login.';
            header("location:login.php");
            exit();
        } else {
            $_SESSION['otp_error'] = 'Error creating account: ' . mysqli_error($conn) . '. Please try again.';
            header('location:otp.php');
            exit();
        }
        
    } else {
        $_SESSION['otp_error'] = 'Invalid OTP. Please check and try again.';
        header('location:otp.php');
        exit();
    }
} else {
    // If accessed without form submission, redirect to OTP page
    header('location:otp.php');
    exit();
}
?>