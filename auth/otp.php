<?php 
session_start();

// Redirect if no temp user data
if(!isset($_SESSION['temp_user'])){
    header('location:signup.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP - Lumina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ffffff 0%, #f8f8f8 50%, #ffffff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(128, 0, 32, 0.03) 0%, transparent 70%);
            animation: rotate 30s linear infinite;
            z-index: 0;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .verify-container {
            background: linear-gradient(135deg, rgba(248, 248, 248, 0.95) 0%, rgba(255, 255, 255, 0.98) 100%);
            border: 2px solid rgba(128, 0, 32, 0.3);
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(128, 0, 32, 0.2);
            backdrop-filter: blur(20px);
            padding: 40px;
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .logo-section {
            margin-bottom: 35px;
        }

        .logo {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            color: #2c2c2c;
            font-weight: bold;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .logo-icon {
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            color: #fff;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 0 25px rgba(128, 0, 32, 0.5);
            animation: glow 3s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { box-shadow: 0 0 25px rgba(128, 0, 32, 0.5); }
            to { box-shadow: 0 0 35px rgba(128, 0, 32, 0.8); }
        }

        .verify-title {
            color: #2c2c2c;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .verify-subtitle {
            color: rgba(44, 44, 44, 0.7);
            font-size: 16px;
            margin-bottom: 30px;
        }

        .email-display {
            color: #800020;
            font-weight: 600;
        }

        .otp-input-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 30px 0;
        }

        .otp-input {
            width: 55px;
            height: 55px;
            border: 2px solid rgba(128, 0, 32, 0.3);
            border-radius: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #2c2c2c;
            background: rgba(248, 248, 248, 0.8);
            outline: none;
            transition: all 0.3s ease;
        }

        .otp-input:focus {
            border-color: #800020;
            background: rgba(248, 248, 248, 1);
            box-shadow: 0 0 15px rgba(128, 0, 32, 0.3);
            transform: scale(1.05);
        }

        .timer {
            color: #800020;
            font-size: 18px;
            font-weight: 600;
            margin: 20px 0;
        }

        .verify-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            border: none;
            border-radius: 50px;
            color: #fff;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(128, 0, 32, 0.4);
            margin: 20px 0;
        }

        .verify-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(128, 0, 32, 0.6);
        }

        .verify-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .resend-link {
            color: #800020;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .resend-link:hover {
            text-decoration: underline;
        }

        .resend-link.disabled {
            color: #ccc;
            cursor: not-allowed;
        }

        .error-message {
            color: #dc3545;
            background: rgba(220, 53, 69, 0.1);
            padding: 12px;
            border-radius: 10px;
            margin: 15px 0;
            font-weight: 500;
        }

        .success-message {
            color: #28a745;
            background: rgba(40, 167, 69, 0.1);
            padding: 12px;
            border-radius: 10px;
            margin: 15px 0;
            font-weight: 500;
        }

        @media (max-width: 480px) {
            .verify-container {
                padding: 30px 20px;
            }
            
            .otp-input-container {
                gap: 10px;
            }
            
            .otp-input {
                width: 45px;
                height: 45px;
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="verify-container">
        <div class="logo-section">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-gem"></i>
                </div>
                <span>LUMINA</span>
            </div>
        </div>

        <div class="verify-title">Verify Your Email</div>
        <div class="verify-subtitle">
            We've sent a verification code to<br>
            <span class="email-display"><?php echo $_SESSION['temp_user']['email']; ?></span>
        </div>

        <?php 
        if(isset($_SESSION['otp_error'])){
            echo '<div class="error-message">' . $_SESSION['otp_error'] . '</div>';
            unset($_SESSION['otp_error']);
        }
        if(isset($_SESSION['otp_success'])){
            echo '<div class="success-message">' . $_SESSION['otp_success'] . '</div>';
            unset($_SESSION['otp_success']);
        }
        ?>

        <form action="otp_process.php" method="POST">
            <div class="otp-input-container">
                <input type="text" class="otp-input" maxlength="1" name="otp1" required>
                <input type="text" class="otp-input" maxlength="1" name="otp2" required>
                <input type="text" class="otp-input" maxlength="1" name="otp3" required>
                <input type="text" class="otp-input" maxlength="1" name="otp4" required>
                <input type="text" class="otp-input" maxlength="1" name="otp5" required>
                <input type="text" class="otp-input" maxlength="1" name="otp6" required>
            </div>

            <div class="timer" id="timer">10:00</div>

            <input type="submit" value="Verify Account" class="verify-btn" name="verify_otp">
        </form>

        <div>
            Didn't receive the code? 
            <a href="resend_otp.php" class="resend-link" id="resendLink" onclick="resendOTP()">Resend Code</a>
        </div>
    </div>

    <script>
        // Auto-focus next input
        const otpInputs = document.querySelectorAll('.otp-input');
        
        otpInputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                if (e.target.value.length === 1 && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && e.target.value === '' && index > 0) {
                    otpInputs[index - 1].focus();
                }
            });

            // Only allow numbers
            input.addEventListener('input', (e) => {
                e.target.value = e.target.value.replace(/[^0-9]/g, '');
            });
        });

        // Countdown timer
        let timeLeft = 600; // 10 minutes in seconds
        const timer = document.getElementById('timer');
        const resendLink = document.getElementById('resendLink');

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            timer.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
            
            if (timeLeft <= 0) {
                timer.textContent = 'OTP Expired';
                timer.style.color = '#dc3545';
                resendLink.classList.remove('disabled');
            } else {
                timeLeft--;
            }
        }

        setInterval(updateTimer, 1000);

        function resendOTP() {
            if (timeLeft <= 0) {
                window.location.href = 'resend_otp.php';
            }
        }

        // Auto-submit when all fields are filled
        otpInputs.forEach(input => {
            input.addEventListener('input', () => {
                const allFilled = Array.from(otpInputs).every(input => input.value.length === 1);
                if (allFilled) {
                    setTimeout(() => {
                        document.getElementById('otpForm').submit();
                    }, 500);
                }
            });
        });
    </script>
</body>
</html>