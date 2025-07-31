<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
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
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background elements */
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

        .signup-container {
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
            overflow: hidden;
        }

        .signup-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(128, 0, 32, 0.05), transparent);
            animation: shimmer 4s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .logo-section {
            text-align: center;
            margin-bottom: 35px;
            position: relative;
            z-index: 2;
        }

        .logo {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            color: #2c2c2c;
            font-weight: bold;
            font-size: 32px;
            text-shadow: 0 0 20px rgba(128, 0, 32, 0.4);
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

        .welcome-text {
            color: rgba(44, 44, 44, 0.8);
            font-size: 17px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #800020;
            font-size: 15px;
            font-weight: 500;
        }

        .signup-form {
            position: relative;
            z-index: 2;
        }

        .form-group {
            margin-bottom: 22px;
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 18px 25px 18px 55px;
            background: rgba(248, 248, 248, 0.8);
            border: 2px solid rgba(128, 0, 32, 0.3);
            border-radius: 50px;
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
            box-shadow: 0 0 25px rgba(128, 0, 32, 0.3);
            transform: translateY(-3px);
        }

        .form-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #800020;
            font-size: 18px;
            text-shadow: 0 0 10px rgba(128, 0, 32, 0.5);
            transition: all 0.3s ease;
        }

        .form-group:hover .form-icon {
            transform: translateY(-50%) scale(1.2);
            text-shadow: 0 0 15px rgba(128, 0, 32, 0.8);
        }

        .password-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(44, 44, 44, 0.6);
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .password-toggle:hover {
            color: #800020;
            transform: translateY(-50%) scale(1.2);
        }

        .terms-group {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 28px;
            padding: 0 10px;
        }

        .custom-checkbox {
            position: relative;
            width: 22px;
            height: 22px;
            cursor: pointer;
            flex-shrink: 0;
        }

        .custom-checkbox input {
            opacity: 0;
            position: absolute;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            width: 22px;
            height: 22px;
            background: rgba(248, 248, 248, 0.8);
            border: 2px solid rgba(128, 0, 32, 0.3);
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .custom-checkbox:hover .checkmark {
            border-color: #800020;
            background: rgba(128, 0, 32, 0.1);
            transform: scale(1.1);
        }

        .custom-checkbox input:checked ~ .checkmark {
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            border-color: #800020;
        }

        .checkmark::after {
            content: '';
            position: absolute;
            left: 6px;
            top: 2px;
            width: 6px;
            height: 12px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .custom-checkbox input:checked ~ .checkmark::after {
            opacity: 1;
        }

        .terms-text {
            color: rgba(44, 44, 44, 0.8);
            font-size: 14px;
            line-height: 1.4;
        }

        .terms-text a {
            color: #800020;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .terms-text a:hover {
            text-shadow: 0 0 10px rgba(128, 0, 32, 0.8);
            text-decoration: underline;
        }

        .submit-btn {
            width: 100%;
            padding: 20px;
            background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
            border: none;
            border-radius: 50px;
            color: #fff;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(128, 0, 32, 0.4);
            position: relative;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(128, 0, 32, 0.6);
            background: linear-gradient(135deg, #a0002a 0%, #800020 100%);
        }

        .submit-btn:active {
            transform: translateY(-2px);
        }

        .social-login {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 25px;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 15px;
            background: rgba(248, 248, 248, 0.8);
            border: 2px solid rgba(128, 0, 32, 0.3);
            border-radius: 50px;
            color: #2c2c2c;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            background: rgba(128, 0, 32, 0.1);
            border-color: #800020;
            color: #800020;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(128, 0, 32, 0.3);
        }

        .login-link {
            text-align: center;
            color: rgba(44, 44, 44, 0.8);
            font-size: 15px;
        }

        .login-link a {
            color: #800020;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            text-shadow: 0 0 10px rgba(128, 0, 32, 0.8);
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .signup-container {
                padding: 35px 25px;
                margin: 10px;
                max-width: 400px;
            }

            .logo {
                font-size: 28px;
            }

            .logo-icon {
                width: 48px;
                height: 48px;
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            .signup-container {
                padding: 30px 20px;
                max-width: 350px;
            }

            .social-login {
                grid-template-columns: 1fr;
            }

            .form-input {
                padding: 16px 20px 16px 50px;
                font-size: 15px;
            }

            .submit-btn {
                padding: 18px;
                font-size: 16px;
            }

            .logo {
                font-size: 26px;
            }

            .welcome-text {
                font-size: 16px;
            }
        }

        /* Loading animation */
        .loading {
            opacity: 0.7;
            pointer-events: none;
        }

        .loading .submit-btn::after {
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
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Success state */
        .success .form-input {
            border-color: #4CAF50;
        }

        .success .form-icon {
            color: #4CAF50;
        }

        /* Error state */
        .error .form-input {
            border-color: #f44336;
            animation: shake 0.5s ease-in-out;
        }

        .error .form-icon {
            color: #f44336;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
    </style>   
</head>
<body>
    <div class="signup-container">
        <div class="logo-section">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-gem"></i>
                </div>
                <span>LUMINA</span>
            </div>
            <div class="welcome-text">Welcome to Lumina</div>
            <div class="subtitle">Create your luxury account</div>
        </div>

        <form action="signup_process.php" class="signup-form" id="signupForm" method="post" >
            <div class="form-group">
                <i class="form-icon fas fa-user"></i>
                <input type="text" class="form-input" name = "name" placeholder="Full Name" required>
            </div>

            <div class="form-group">
                <i class="form-icon fas fa-envelope"></i>
                <input type="email" class="form-input" name="email" placeholder="Email Address" required>
            </div>

            <div class="form-group">
                <i class="form-icon fas fa-lock"></i>
                <input type="password" class="form-input" name="password" placeholder="Password" id="password" required>
                <button type="button" class="password-toggle" onclick="togglePassword('password')">
                    <i class="fas fa-eye" id="password-eye"></i>
                </button>
            </div>

            <div class="form-group">
                <i class="form-icon fas fa-lock"></i>
                <input type="password" class="form-input" name="confirm_password" placeholder="Confirm Password" id="confirmPassword" required>
                <button type="button" class="password-toggle" onclick="togglePassword('confirmPassword')">
                    <i class="fas fa-eye" id="confirmPassword-eye"></i>
                </button>
            </div>
                 <?php 
                if(isset($_SESSION['not-matched'])){
                 ?>
                 <p class="text-danger">Sorry your doesn't matched. Please double-check your password.</p>
                <?php 
              unset($_SESSION['not-matched']);  
              }
                ?>   
            <div class="terms-group">
                <label class="custom-checkbox">
                    <input type="checkbox" required>
                    <span class="checkmark"></span>
                </label>
                <div class="terms-text">
                    I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                </div>
            </div>

            <input type="submit" value = "Create Account" name = "submit" class="submit-btn">
        </form>

        <div class="login-link">
            Already have an account? <a href="login.php">Sign In</a>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const eye = document.getElementById(fieldId + '-eye');
            
            if (field.type === 'password') {
                field.type = 'text';
                eye.classList.remove('fa-eye');
                eye.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                eye.classList.remove('fa-eye-slash');
                eye.classList.add('fa-eye');
            }
        }

        // Enhanced input focus effects
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.closest('.form-group').classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.closest('.form-group').classList.remove('focused');
                
                // Validate on blur
                if (this.value.trim() !== '') {
                    this.closest('.form-group').classList.add('success');
                } else {
                    this.closest('.form-group').classList.remove('success');
                }
            });
        });

    </script>
</body>
</html>