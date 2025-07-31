<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
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
            position: relative;
            overflow: hidden;
        }

        /* Animated background particles */
        .bg-particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .particle {
            position: absolute;
            background: rgba(128, 0, 32, 0.1);
            border-radius: 50%;
            animation: float 20s infinite linear;
        }

        .particle:nth-child(1) {
            width: 4px;
            height: 4px;
            left: 10%;
            animation-delay: 0s;
            animation-duration: 15s;
        }

        .particle:nth-child(2) {
            width: 6px;
            height: 6px;
            left: 20%;
            animation-delay: 2s;
            animation-duration: 18s;
        }

        .particle:nth-child(3) {
            width: 3px;
            height: 3px;
            left: 30%;
            animation-delay: 4s;
            animation-duration: 22s;
        }

        .particle:nth-child(4) {
            width: 5px;
            height: 5px;
            left: 40%;
            animation-delay: 6s;
            animation-duration: 16s;
        }

        .particle:nth-child(5) {
            width: 4px;
            height: 4px;
            left: 50%;
            animation-delay: 8s;
            animation-duration: 20s;
        }

        .particle:nth-child(6) {
            width: 7px;
            height: 7px;
            left: 60%;
            animation-delay: 10s;
            animation-duration: 14s;
        }

        .particle:nth-child(7) {
            width: 3px;
            height: 3px;
            left: 70%;
            animation-delay: 12s;
            animation-duration: 19s;
        }

        .particle:nth-child(8) {
            width: 5px;
            height: 5px;
            left: 80%;
            animation-delay: 14s;
            animation-duration: 17s;
        }

        .particle:nth-child(9) {
            width: 4px;
            height: 4px;
            left: 90%;
            animation-delay: 16s;
            animation-duration: 21s;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Login container */
        .login-container {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 2px solid rgba(128, 0, 32, 0.3);
            border-radius: 25px;
            padding: 50px 40px;
            width: 100%;
            max-width: 450px;
            box-shadow: 
                0 20px 60px rgba(128, 0, 32, 0.2),
                0 0 80px rgba(128, 0, 32, 0.1),
                inset 0 1px 0 rgba(128, 0, 32, 0.2);
            position: relative;
            overflow: hidden;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(128, 0, 32, 0.05) 0%, transparent 70%);
            animation: rotate 30s linear infinite;
            z-index: -1;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Header */
        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .logo-icon {
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            color: #fff;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 0 30px rgba(128, 0, 32, 0.5);
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { box-shadow: 0 0 30px rgba(128, 0, 32, 0.5); }
            to { box-shadow: 0 0 50px rgba(128, 0, 32, 0.8); }
        }

        .logo-text {
            font-size: 36px;
            font-weight: bold;
            color: #2c2c2c;
            text-shadow: 0 0 20px rgba(128, 0, 32, 0.3);
        }

        .login-subtitle {
            color: rgba(44, 44, 44, 0.7);
            font-size: 16px;
            margin: 0;
        }

        /* Form styles */
        .login-form {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .form-group {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 18px 25px 18px 55px;
            background: rgba(248, 248, 248, 0.8);
            border: 2px solid rgba(128, 0, 32, 0.3);
            border-radius: 15px;
            color: #2c2c2c;
            font-size: 16px;
            outline: none;
            transition: all 0.4s ease;
            backdrop-filter: blur(10px);
        }

        .form-input::placeholder {
            color: rgba(44, 44, 44, 0.5);
        }

        .form-input:focus {
            border-color: #800020;
            background: rgba(248, 248, 248, 1);
            box-shadow: 
                0 0 25px rgba(128, 0, 32, 0.3),
                inset 0 1px 0 rgba(128, 0, 32, 0.1);
            transform: translateY(-3px);
        }

        .form-input:hover {
            border-color: rgba(128, 0, 32, 0.6);
            transform: translateY(-1px);
        }

        .input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(128, 0, 32, 0.7);
            font-size: 18px;
            transition: all 0.3s ease;
            z-index: 1;
        }

        .form-group:focus-within .input-icon {
            color: #800020;
            transform: translateY(-50%) scale(1.1);
            text-shadow: 0 0 10px rgba(128, 0, 32, 0.5);
        }

        /* Password toggle */
        .password-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(128, 0, 32, 0.7);
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
            padding: 5px;
            border-radius: 50%;
        }

        .password-toggle:hover {
            color: #800020;
            background: rgba(128, 0, 32, 0.1);
            transform: translateY(-50%) scale(1.1);
        }

        /* Remember me & Forgot password */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            user-select: none;
        }

        .custom-checkbox {
            position: relative;
            width: 20px;
            height: 20px;
            background: rgba(248, 248, 248, 0.8);
            border: 2px solid rgba(128, 0, 32, 0.3);
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .custom-checkbox::after {
            content: '';
            position: absolute;
            left: 6px;
            top: 2px;
            width: 6px;
            height: 10px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .checkbox-wrapper input {
            display: none;
        }

        .checkbox-wrapper input:checked + .custom-checkbox {
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            border-color: #800020;
            box-shadow: 0 0 15px rgba(128, 0, 32, 0.4);
        }

        .checkbox-wrapper input:checked + .custom-checkbox::after {
            opacity: 1;
        }

        .checkbox-wrapper:hover .custom-checkbox {
            border-color: #800020;
            box-shadow: 0 0 10px rgba(128, 0, 32, 0.2);
        }

        .checkbox-label {
            color: rgba(44, 44, 44, 0.8);
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .checkbox-wrapper:hover .checkbox-label {
            color: #800020;
        }

        .forgot-password {
            color: rgba(128, 0, 32, 0.8);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .forgot-password::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #800020;
            transition: width 0.3s ease;
        }

        .forgot-password:hover {
            color: #800020;
            text-shadow: 0 0 10px rgba(128, 0, 32, 0.5);
        }

        .forgot-password:hover::after {
            width: 100%;
        }

        /* Login button */
        .login-btn {
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            color: #fff;
            border: none;
            padding: 18px 30px;
            border-radius: 15px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(128, 0, 32, 0.3);
            margin-top: 10px;
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(128, 0, 32, 0.5);
            background: linear-gradient(135deg, #a0002a 0%, #800020 100%);
        }

        .login-btn:active {
            transform: translateY(-1px);
        }

        /* Sign up link */
        .signup-link {
            text-align: center;
            margin-top: 30px;
            color: rgba(44, 44, 44, 0.7);
            font-size: 14px;
        }

        .signup-link a {
            color: #800020;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }

        .signup-link a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #800020;
            transition: width 0.3s ease;
        }

        .signup-link a:hover {
            text-shadow: 0 0 10px rgba(128, 0, 32, 0.5);
        }

        .signup-link a:hover::after {
            width: 100%;
        }

        /* Loading state */
        .login-btn.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .login-btn.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid transparent;
            border-top: 2px solid #fff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive design */
        @media (max-width: 480px) {
            .login-container {
                margin: 20px;
                padding: 40px 30px;
            }

            .logo-text {
                font-size: 32px;
            }

            .logo-icon {
                width: 50px;
                height: 50px;
                font-size: 24px;
            }

            .form-input {
                padding: 16px 20px 16px 50px;
                font-size: 15px;
            }

            .input-icon {
                left: 18px;
                font-size: 16px;
            }

            .password-toggle {
                right: 18px;
                font-size: 16px;
            }

            .form-options {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
        }

        /* Focus states for accessibility */
        .login-btn:focus,
        .forgot-password:focus {
            outline: 2px solid #800020;
            outline-offset: 2px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-header">
            <div class="logo-container">
                <div class="logo-icon">
                    <i class="fas fa-gem"></i>
                </div>
                <div class="logo-text">LUMINA</div>
            </div>
            <p class="login-subtitle">Welcome back to luxury</p>
        </div>

               <?php
              if(isset($_SESSION['account_created'])){
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <i class="fa-solid fa-circle-check" style="font-size: 17px;"></i>
                Account created successfully
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                <?php
              unset($_SESSION['account_created']);
              }
              ?>

              <?php
              if(isset($_SESSION['status'])){
                $msg=$_SESSION['status'];
                if(str_contains($msg, "Incorrect Password")){
                $alert_class="alert-warning";
                $link=null;
              
                }elseif(str_contains($msg, "Account does not exist")){
                  $alert_class="alert-danger";
                  $link=".Create";
                }?>

                <div class="alert <?php echo $alert_class?> alert-dismissible fade show " role="alert">
                  <i class="fa-solid fa-circle-exclamation" style="font-size:20px;"></i>
  <?php echo $msg?> <a href="signup.php" class="text-danger-emphasis "><?php echo $link;?></a>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                <?php
                unset($_SESSION['status']);
              }
              
              ?>

                <!------------form ------------------->
        <form action="login_process.php" class="login-form" id="loginForm" method="POST">
            <div class="form-group">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" class="form-input" name="email" placeholder="Email Address" required>
            </div>

            <div class="form-group">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" class="form-input" id="password" name="password" placeholder="Password" required>
                <button type="button" class="password-toggle" id="togglePassword">
                    <i class="fas fa-eye"></i>
                </button>
            </div>

            <div class="form-options">
                <label class="checkbox-wrapper">
                    <input type="checkbox">
                    <div class="custom-checkbox"></div>
                    <span class="checkbox-label">Remember me</span>
                </label>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>

            <input type="submit" name="submit" value="Sign In" class="login-btn" id="loginBtn"
                <i class="fas fa-sign-in-alt"></i>
        </form>

        <div class="signup-link">
            Don't have an account? <a href="signup.php">Create Account</a>
        </div>
    </div>

    <script>
        // Password toggle functionality
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });

        // Add floating animation to input focus
        const formInputs = document.querySelectorAll('.form-input');
        formInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });


        // Particle animation enhancement
        const particles = document.querySelectorAll('.particle');
        particles.forEach((particle, index) => {
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 20 + 's';
            particle.style.animationDuration = (15 + Math.random() * 10) + 's';
        });

        // Add subtle glow effect on form interaction
        const loginContainer = document.querySelector('.login-container');
        formInputs.forEach(input => {
            input.addEventListener('focus', () => {
                loginContainer.style.boxShadow = `
                    0 20px 60px rgba(0, 0, 0, 0.5),
                    0 0 120px rgba(255, 215, 0, 0.15),
                    inset 0 1px 0 rgba(255, 215, 0, 0.2)
                `;
            });
            
            input.addEventListener('blur', () => {
                loginContainer.style.boxShadow = `
                    0 20px 60px rgba(0, 0, 0, 0.5),
                    0 0 80px rgba(255, 215, 0, 0.1),
                    inset 0 1px 0 rgba(255, 215, 0, 0.2)
                `;
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>