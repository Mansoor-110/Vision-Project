<?php
session_start();

// include PHPMailer files
 require '../PHPMailer/src/Exception.php';
 require '../PHPMailer/src/PHPMailer.php';
 require '../PHPMailer/src/SMTP.php';

 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(!isset($_SESSION['temp_user'])){
    header('location:signup.php');
    exit();
}

// Generate new OTP
$new_otp = sprintf("%06d", mt_rand(1, 999999));
$new_otp_expiry = date('Y-m-d H:i:s', strtotime('+10 minutes'));

// Update session data
$_SESSION['temp_user']['otp'] = $new_otp;
$_SESSION['temp_user']['otp_expiry'] = $new_otp_expiry;

$email = $_SESSION['temp_user']['email'];
$name = $_SESSION['temp_user']['name'];

// Send new OTP
if(sendOTPEmail($email, $name, $new_otp)){
    $_SESSION['otp_success'] = 'New OTP sent successfully!';
} else {
    $_SESSION['otp_error'] = 'Failed to send new OTP. Please try again.';
}

header('location:otp.php');

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
        $mail->Subject = 'Email Verification - Lumina Account (Resent)';
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
                <h2>Email Verification (Resent)</h2>
            </div>
            <p>Hello $name,</p>
            <p>Here's your new verification code:</p>
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