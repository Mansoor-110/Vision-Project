<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    :root {
      --maroon-primary: #800020;
      --maroon-light: #a0002a;
      --maroon-dark: #600018;
      --white-primary: #ffffff;
      --white-off: #fafafa;
      --black-subtle: rgba(0, 0, 0, 0.8);
      --shadow-light: rgba(0, 0, 0, 0.08);
      --shadow-medium: rgba(0, 0, 0, 0.12);
      --success-color: #10b981;
      --error-color: #ef4444;
      --warning-color: #f59e0b;
    }

    body {
      background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-image: 
        radial-gradient(circle at 1px 1px, rgba(0,0,0,0.04) 1px, transparent 0),
        radial-gradient(circle at 15px 15px, rgba(0,0,0,0.02) 1px, transparent 0);
      background-size: 20px 20px, 40px 40px;
    }

    .password-wrapper {
      padding: 60px 0;
    }

    .page-header {
      background: linear-gradient(135deg, var(--maroon-primary) 0%, var(--maroon-light) 100%);
      color: white;
      padding: 40px 0;
      margin-bottom: 40px;
      border-radius: 15px;
      position: relative;
      overflow: hidden;
      background-image: 
        radial-gradient(circle at 2px 2px, rgba(0,0,0,0.1) 1px, transparent 0);
      background-size: 25px 25px;
    }

    .page-header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.05) 50%, transparent 70%);
      pointer-events: none;
    }

    .page-header h1 {
      font-size: 2.5rem;
      font-weight: 700;
      margin: 0;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
      color: black;
    }

    .page-header p {
      font-size: 1.1rem;
      margin: 10px 0 0 0;
      opacity: 0.9;
      color: black;
    }

    .password-card {
      background: var(--white-primary);
      border-radius: 15px;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      border: 2px solid rgba(128, 0, 32, 0.1);
      box-shadow: 0 4px 12px var(--shadow-light);
      overflow: hidden;
      position: relative;
      margin-bottom: 30px;
      padding: 40px;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    }

    .password-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--maroon-primary), var(--maroon-light));
    }

    .security-header {
      text-align: center;
      margin-bottom: 40px;
      padding-bottom: 25px;
      border-bottom: 2px solid rgba(128, 0, 32, 0.1);
    }

    .security-icon {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--maroon-primary), var(--maroon-light));
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
      color: white;
      margin: 0 auto 20px;
      box-shadow: 0 4px 15px rgba(128, 0, 32, 0.3);
    }

    .security-header h2 {
      color: var(--black-subtle);
      font-size: 1.8rem;
      font-weight: 600;
      margin: 0 0 10px 0;
    }

    .security-header p {
      color: #666;
      font-size: 1rem;
      margin: 0;
    }

    .form-section {
      margin-bottom: 30px;
    }

    .section-title {
      color: var(--maroon-primary);
      font-size: 1.2rem;
      font-weight: 600;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .form-group {
      position: relative;
      margin-bottom: 25px;
    }

    .form-group label {
      display: block;
      color: var(--black-subtle);
      font-weight: 600;
      margin-bottom: 8px;
      font-size: 0.95rem;
    }

    .required {
      color: var(--error-color);
    }

    .form-control {
      width: 100%;
      padding: 15px 20px;
      border: 2px solid rgba(128, 0, 32, 0.2);
      border-radius: 10px;
      font-size: 1rem;
      transition: all 0.3s ease;
      background: var(--white-off);
      box-sizing: border-box;
    }

    .form-control:focus {
      outline: none;
      border-color: var(--maroon-primary);
      background: var(--white-primary);
      box-shadow: 0 0 0 3px rgba(128, 0, 32, 0.1);
    }

    .form-control.error {
      border-color: var(--error-color);
      background: rgba(239, 68, 68, 0.05);
    }

    .form-control.success {
      border-color: var(--success-color);
      background: rgba(16, 185, 129, 0.05);
    }

    .error-message {
      color: var(--error-color);
      font-size: 0.85rem;
      margin-top: 5px;
      display: none;
    }

    .error-message.show {
      display: block;
    }

    .success-message {
      background: rgba(16, 185, 129, 0.1);
      color: var(--success-color);
      padding: 15px 20px;
      border-radius: 10px;
      margin-bottom: 25px;
      border-left: 4px solid var(--success-color);
      display: none;
    }

    .success-message.show {
      display: block;
    }

    .alert {
      padding: 15px 20px;
      border-radius: 10px;
      margin-bottom: 25px;
      border-left: 4px solid;
    }

    .alert-error {
      background: rgba(239, 68, 68, 0.1);
      color: var(--error-color);
      border-left-color: var(--error-color);
    }

    .password-requirements {
      margin-top: 15px;
      padding: 15px;
      background: rgba(128, 0, 32, 0.05);
      border-radius: 8px;
      font-size: 0.85rem;
    }

    .requirement {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 5px;
      color: #666;
    }

    .requirement i {
      font-size: 0.8rem;
      color: var(--maroon-primary);
    }

    .form-actions {
      display: flex;
      gap: 15px;
      justify-content: center;
      padding-top: 30px;
      border-top: 2px solid rgba(128, 0, 32, 0.1);
    }

    .btn {
      padding: 15px 30px;
      border-radius: 10px;
      text-decoration: none;
      font-weight: 600;
      font-size: 1rem;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      border: none;
      cursor: pointer;
      min-width: 140px;
      justify-content: center;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--maroon-primary), var(--maroon-light));
      color: white;
      box-shadow: 0 4px 15px rgba(128, 0, 32, 0.3);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(128, 0, 32, 0.4);
      color: white;
    }

    .btn-secondary {
      background: linear-gradient(135deg, #6b7280, #9ca3af);
      color: white;
      box-shadow: 0 4px 15px rgba(107, 114, 128, 0.3);
    }

    .btn-secondary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(107, 114, 128, 0.4);
      color: white;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .password-wrapper {
        padding: 30px 0;
      }
      
      .page-header {
        padding: 30px 20px;
        margin: 0 15px 30px;
      }
      
      .page-header h1 {
        font-size: 2rem;
      }
      
      .password-card {
        margin: 0 15px 30px;
        padding: 25px;
      }
      
      .form-actions {
        flex-direction: column;
      }
      
      .btn {
        width: 100%;
      }
    }

    /* Animation for page load */
    .password-card {
      animation: fadeInUp 0.6s ease-out forwards;
      opacity: 0;
      transform: translateY(20px);
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Auto-hide messages */
    .success-message.show {
      animation: slideInFadeOut 6s ease-in-out forwards;
    }

    @keyframes slideInFadeOut {
      0% { opacity: 0; transform: translateY(-10px); }
      10%, 80% { opacity: 1; transform: translateY(0); }
      100% { opacity: 0; transform: translateY(-10px); }
    }
  </style>
</head>
<body>

<div class="password-wrapper">
  <div class="container">
    <?php
    include '../includes/connection.php';
    
    // Handle password change
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_password'])) {
      if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        
        $validation_errors = array();
        
        // Validate passwords
        if (empty($current_password)) {
          $validation_errors[] = "Current password is required.";
        }
        
        if (empty($new_password)) {
          $validation_errors[] = "New password is required.";
        } elseif (strlen($new_password) < 8) {
          $validation_errors[] = "New password must be at least 8 characters long.";
        } elseif (!preg_match('/[A-Z]/', $new_password)) {
          $validation_errors[] = "New password must contain at least one uppercase letter.";
        } elseif (!preg_match('/[a-z]/', $new_password)) {
          $validation_errors[] = "New password must contain at least one lowercase letter.";
        } elseif (!preg_match('/[0-9]/', $new_password)) {
          $validation_errors[] = "New password must contain at least one number.";
        } elseif (!preg_match('/[^A-Za-z0-9]/', $new_password)) {
          $validation_errors[] = "New password must contain at least one special character.";
        }
        
        if (empty($confirm_password)) {
          $validation_errors[] = "Please confirm your new password.";
        } elseif ($new_password !== $confirm_password) {
          $validation_errors[] = "New password and confirmation do not match.";
        }
        
        if (empty($validation_errors)) {
          // Get current password from database
          $user_query = "SELECT password FROM user_acc WHERE id='$user_id'";
          $user_result = mysqli_query($conn, $user_query);
          $user_data = mysqli_fetch_assoc($user_result);
          
          if ($user_data) {
            // Verify current password (plain text comparison)
            if ($current_password === $user_data['password']) {
              // Update password in database (store as plain text)
              $update_query = "UPDATE user_acc SET password='$new_password' WHERE id='$user_id'";
              
              if (mysqli_query($conn, $update_query)) {
                $success_message = "Password changed successfully!";
                // Clear the form by redirecting to the same page
                echo "<script>
                  setTimeout(function() {
                    window.location.href = window.location.href;
                  }, 3000);
                </script>";
              } else {
                $validation_errors[] = "Error updating password. Please try again.";
              }
            } else {
              $validation_errors[] = "Current password is incorrect.";
            }
          } else {
            $validation_errors[] = "User account not found.";
          }
        }
        
        if (!empty($validation_errors)) {
          $error_message = implode("<br>", $validation_errors);
        }
      } else {
        $error_message = "Please log in to change your password.";
      }
    }
    
    if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
      
      // Get current user information
      $user_query = "SELECT name FROM user_acc WHERE id='$user_id'";
      $user_result = mysqli_query($conn, $user_query);
      $user_data = mysqli_fetch_assoc($user_result);
      
      if ($user_data) {
        echo '<div class="page-header">
                <div class="container">
                  <h1><i class="fas fa-lock"></i> Change Password</h1>
                  <p>Update your account password for better security</p>
                </div>
              </div>';
        ?>
        
        <div class='password-card'>
          <?php if (isset($success_message)): ?>
            <div class="success-message show">
              <i class="fas fa-check-circle"></i> <?php echo $success_message; ?>
            </div>
          <?php endif; ?>
          
          <?php if (isset($error_message)): ?>
            <div class="alert alert-error">
              <i class="fas fa-exclamation-triangle"></i> <?php echo $error_message; ?>
            </div>
          <?php endif; ?>
          
          <div class='security-header'>
            <div class='security-icon'>
              <i class="fas fa-shield-alt"></i>
            </div>
            <h2>Security Settings</h2>
            <p>Keep your account secure with a strong password</p>
          </div>

          <form method="POST" autocomplete="off">
            <div class="form-section">
              <h3 class="section-title">
                <i class="fas fa-key"></i> Password Information
              </h3>
              
              <div class="form-group">
                <label for="current_password">Current Password <span class="required">*</span></label>
                <input type="password" id="current_password" name="current_password" class="form-control" required
                       placeholder="Enter your current password" autocomplete="current-password">
              </div>
              
              <div class="form-group">
                <label for="new_password">New Password <span class="required">*</span></label>
                <input type="password" id="new_password" name="new_password" class="form-control" required
                       placeholder="Enter your new password" autocomplete="new-password">
                
                <div class="password-requirements">
                  <div class="requirement">
                    <i class="fas fa-check"></i>
                    <span>At least 8 characters</span>
                  </div>
                  <div class="requirement">
                    <i class="fas fa-check"></i>
                    <span>At least one uppercase letter (A-Z)</span>
                  </div>
                  <div class="requirement">
                    <i class="fas fa-check"></i>
                    <span>At least one lowercase letter (a-z)</span>
                  </div>
                  <div class="requirement">
                    <i class="fas fa-check"></i>
                    <span>At least one number (0-9)</span>
                  </div>
                  <div class="requirement">
                    <i class="fas fa-check"></i>
                    <span>At least one special character (!@#$%^&*)</span>
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <label for="confirm_password">Confirm New Password <span class="required">*</span></label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required
                       placeholder="Confirm your new password" autocomplete="new-password">
              </div>
            </div>

            <div class="form-actions">
              <a href="../account/account.php" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancel
              </a>
              <button type="submit" name="change_password" class="btn btn-primary">
                <i class="fas fa-save"></i> Change Password
              </button>
            </div>
          </form>
        </div>
        
        <?php
      } else {
        ?>
        <div class="password-card" style="text-align: center;">
          <div class="security-icon" style="background: linear-gradient(135deg, var(--error-color), #f87171);">
            <i class="fas fa-exclamation-triangle"></i>
          </div>
          <h4>Account information not found</h4>
          <p>There seems to be an issue loading your account details</p>
          <a href="../pages/index.php" class="btn btn-primary">
            <i class="fas fa-home"></i> Go Home
          </a>
        </div>
        <?php
      }
    } else {
      ?>
      <div class="password-card" style="text-align: center;">
        <div class="security-icon" style="background: linear-gradient(135deg, var(--warning-color), #fbbf24);">
          <i class="fas fa-user-lock"></i>
        </div>
        <h4>Please log in to change your password</h4>
        <p>Sign in to access your security settings</p>
        <a href="../auth/login.php" class="btn btn-primary">
          <i class="fas fa-sign-in-alt"></i> Login Now
        </a>
      </div>
      <?php
    }
    ?>
  </div>
</div>

</body>
</html>
<?php include '../includes/footer.php'; ?>