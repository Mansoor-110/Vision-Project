<?php
session_start();

// include PHPMailer files
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

// Add these use statements to fix the error
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
    $role = $_POST['role'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if($password == $confirm_password){
        include '../includes/connection.php';
        
        // Check if email already exists
        $check_email = "SELECT * FROM user_acc WHERE email = '$email'";
        $check_result = mysqli_query($conn, $check_email);
        
        if(mysqli_num_rows($check_result) > 0){
            $_SESSION['email_exists'] = 'Email already registered';
            header('location:signup.php');
            exit();
        }
        
        // Generate 6-digit OTP
        $otp = sprintf("%06d", mt_rand(1, 999999));
        $otp_expiry = date('Y-m-d H:i:s', strtotime('+10 minutes'));
        
        // Store user data and OTP in session temporarily (DO NOT CREATE ACCOUNT YET!)
        $_SESSION['temp_user'] = [
            'role' => $role,
            'name' => $name,
            'email' => $email,
            'password' => $password, // We'll hash this in the verification process
            'otp' => $otp,
            'otp_expiry' => $otp_expiry
        ];
        
        // Send OTP via email
        if(sendOTPEmail($email, $name, $otp)){
            $_SESSION['otp_sent'] = 'OTP sent successfully to your email';
            header('location:otp.php');
            exit();
        } else {
            $_SESSION['email_error'] = 'Failed to send OTP. Please try again.';
            header('location:signup.php');
            exit();
        }
        
    } else {
        $_SESSION['not-matched'] = 'not-matched';
        header('location:signup.php');
        exit();
    }
} else {
    // If accessed without form submission, redirect to signup
    header('location:signup.php');
    exit();
}

function sendOTPEmail($email, $name, $otp) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'aliyanahmed833@gmail.com'; // Your email
        $mail->Password   = 'hzoo xljo ujfn rrdn';       // Your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('aliyanahmed833@gmail.com', 'Lumina');
        $mail->addAddress($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification - Lumina Account';
        $mail->Body    = getOTPEmailTemplate($name, $otp);

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}

function getOTPEmailTemplate($name, $otp) {
    return "
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
            .container { max-width: 600px; margin: 0 auto; background-color: white; padding: 40px; border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.1); }
            .header { text-align: center; margin-bottom: 30px; }
            .logo { color: #800020; font-size: 32px; font-weight: bold; margin-bottom: 10px; }
            .otp-code { background: linear-gradient(135deg, #800020 0%, #a0002a 100%); color: white; padding: 20px; border-radius: 10px; text-align: center; font-size: 32px; font-weight: bold; letter-spacing: 5px; margin: 20px 0; }
            .footer { text-align: center; margin-top: 30px; color: #666; font-size: 14px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <div class='logo'>LUMINA</div>
                <h2>Email Verification</h2>
            </div>
            <p>Hello $name,</p>
            <p>Thank you for signing up with Lumina! Please use the following OTP to verify your email address:</p>
            <div class='otp-code'>$otp</div>
            <p><strong>This OTP will expire in 10 minutes.</strong></p>
            <p>If you didn't request this verification, please ignore this email.</p>
            <div class='footer'>
                <p>&copy; 2024 Lumina. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>
    ";
}
?>