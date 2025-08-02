<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
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

    .edit-wrapper {
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

    .edit-card {
      background: var(--white-primary);
      border-radius: 15px;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      border: 2px solid rgba(128, 0, 32, 0.1);
      box-shadow: 0 4px 12px var(--shadow-light);
      overflow: hidden;
      position: relative;
      margin-bottom: 30px;
      padding: 40px;
    }

    .edit-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--maroon-primary), var(--maroon-light));
    }

    .profile-header {
      display: flex;
      align-items: center;
      gap: 25px;
      margin-bottom: 40px;
      padding-bottom: 25px;
      border-bottom: 2px solid rgba(128, 0, 32, 0.1);
    }

    .profile-avatar {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--maroon-primary), var(--maroon-light));
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.5rem;
      color: white;
      font-weight: 600;
      box-shadow: 0 4px 15px rgba(128, 0, 32, 0.3);
      position: relative;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .profile-avatar:hover {
      transform: scale(1.05);
      box-shadow: 0 6px 20px rgba(128, 0, 32, 0.4);
    }

    .avatar-upload {
      position: absolute;
      bottom: -5px;
      right: -5px;
      width: 35px;
      height: 35px;
      background: var(--white-primary);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
      border: 3px solid var(--maroon-primary);
    }

    .avatar-upload i {
      color: var(--maroon-primary);
      font-size: 0.9rem;
    }

    .profile-info h2 {
      color: var(--black-subtle);
      font-size: 2rem;
      font-weight: 600;
      margin: 0 0 5px 0;
    }

    .profile-info p {
      color: #666;
      font-size: 1.1rem;
      margin: 0;
    }

    .form-section {
      margin-bottom: 40px;
    }

    .section-title {
      color: var(--maroon-primary);
      font-size: 1.3rem;
      font-weight: 600;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .form-row {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 25px;
      margin-bottom: 25px;
    }

    .form-group {
      position: relative;
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

    .form-actions {
      display: flex;
      gap: 15px;
      justify-content: flex-end;
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

    .loading {
      opacity: 0.7;
      pointer-events: none;
    }

    .loading::after {
      content: '';
      display: inline-block;
      width: 16px;
      height: 16px;
      border: 2px solid transparent;
      border-top: 2px solid currentColor;
      border-radius: 50%;
      animation: spin 1s linear infinite;
      margin-left: 8px;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .edit-wrapper {
        padding: 30px 0;
      }
      
      .page-header {
        padding: 30px 20px;
        margin: 0 15px 30px;
      }
      
      .page-header h1 {
        font-size: 2rem;
      }
      
      .edit-card {
        margin: 0 15px 30px;
        padding: 25px;
      }
      
      .profile-header {
        flex-direction: column;
        text-align: center;
        gap: 20px;
      }
      
      .form-row {
        grid-template-columns: 1fr;
        gap: 20px;
      }
      
      .form-actions {
        flex-direction: column-reverse;
      }
      
      .btn {
        width: 100%;
      }
    }

    /* Animation for page load */
    .edit-card {
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

    .input-icon {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #666;
      pointer-events: none;
      z-index: 1;
    }

    .form-group.has-icon .form-control {
      padding-right: 45px;
    }
  </style>
</head>
<body>

<div class="edit-wrapper">
  <div class="container">
    <?php
    include '../includes/connection.php';
    
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
      $user_id = $_SESSION['user_id'];
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $phone = mysqli_real_escape_string($conn, $_POST['phone']);
      $address = mysqli_real_escape_string($conn, $_POST['address']);
      $city = mysqli_real_escape_string($conn, $_POST['city']);
      $country = mysqli_real_escape_string($conn, $_POST['country']);
      
      // Validate email format
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Please enter a valid email address.";
      } else {
        // Check if email already exists for another user
        $email_check = "SELECT id FROM user_acc WHERE email='$email' AND id != '$user_id'";
        $email_result = mysqli_query($conn, $email_check);
        
        if (mysqli_num_rows($email_result) > 0) {
          $error_message = "This email is already registered with another account.";
        } else {
          // Update user profile
          $update_query = "UPDATE user_acc SET 
                          name='$name', 
                          email='$email', 
                          phone='$phone', 
                          address='$address', 
                          city='$city', 
                          country='$country' 
                          WHERE id='$user_id'";
          
          if (mysqli_query($conn, $update_query)) {
            $success_message = "Profile updated successfully!";
          } else {
            $error_message = "Error updating profile. Please try again.";
          }
        }
      }
    }
    
    if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
      
      // Get current user information
      $user_query = "SELECT * FROM user_acc WHERE id='$user_id'";
      $user_result = mysqli_query($conn, $user_query);
      $user_data = mysqli_fetch_assoc($user_result);
      
      if ($user_data) {
        echo '<div class="page-header">
                <div class="container">
                  <h1><i class="fas fa-user-edit"></i> Edit Profile</h1>
                  <p>Update your personal information and preferences</p>
                </div>
              </div>';
        ?>
        
        <div class='edit-card'>
          <?php if (isset($success_message)): ?>
            <div class="success-message show">
              <i class="fas fa-check-circle"></i> <?php echo $success_message; ?>
            </div>
          <?php endif; ?>
          
          <?php if (isset($error_message)): ?>
            <div class="error-message show" style="background: rgba(239, 68, 68, 0.1); color: var(--error-color); padding: 15px 20px; border-radius: 10px; margin-bottom: 25px; border-left: 4px solid var(--error-color);">
              <i class="fas fa-exclamation-triangle"></i> <?php echo $error_message; ?>
            </div>
          <?php endif; ?>
          
          <div class='profile-header'>
            <div class='profile-avatar' onclick="document.getElementById('avatar-upload').click()">
              <?php echo strtoupper(substr($user_data['name'], 0, 2)); ?>
              <div class='avatar-upload'>
                <i class="fas fa-camera"></i>
              </div>
            </div>
            <input type="file" id="avatar-upload" accept="image/*" style="display: none;">
            <div class='profile-info'>
              <h2><?php echo htmlspecialchars($user_data['name']); ?></h2>
              <p>Member since <?php echo isset($user_data['created_at']) ? date('F Y', strtotime($user_data['created_at'])) : 'N/A'; ?></p>
            </div>
          </div>

          <form method="POST" id="editProfileForm" novalidate>
            <!-- Personal Information Section -->
            <div class="form-section">
              <h3 class="section-title">
                <i class="fas fa-user"></i> Personal Information
              </h3>
              
              <div class="form-row">
                <div class="form-group">
                  <label for="name">Full Name <span class="required">*</span></label>
                  <input type="text" id="name" name="name" class="form-control" 
                         value="<?php echo htmlspecialchars($user_data['name']); ?>" required>
                  <div class="error-message">Please enter your full name</div>
                </div>
                
                <div class="form-group has-icon">
                  <label for="email">Email Address <span class="required">*</span></label>
                  <input type="email" id="email" name="email" class="form-control" 
                         value="<?php echo htmlspecialchars($user_data['email']); ?>" required>
                  <div class="error-message">Please enter a valid email address</div>
                </div>
              </div>
              
              <div class="form-row">
                <div class="form-group has-icon">
                  <label for="phone">Phone Number</label>
                  <input type="tel" id="phone" name="phone" class="form-control" 
                         value="<?php echo isset($user_data['phone']) ? htmlspecialchars($user_data['phone']) : ''; ?>">
                  <div class="error-message">Please enter a valid phone number</div>
                </div>
                
                <div class="form-group">
                  <label for="gender">Gender</label>
                  <select id="gender" name="gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="male" <?php echo (isset($user_data['gender']) && $user_data['gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
                    <option value="female" <?php echo (isset($user_data['gender']) && $user_data['gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
                    <option value="other" <?php echo (isset($user_data['gender']) && $user_data['gender'] == 'other') ? 'selected' : ''; ?>>Other</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Address Information Section -->
            <div class="form-section">
              <h3 class="section-title">
                <i class="fas fa-map-marker-alt"></i> Address Information
              </h3>
              
              <div class="form-row">
                <div class="form-group" style="grid-column: 1 / -1;">
                  <label for="address">Street Address</label>
                  <textarea id="address" name="address" class="form-control" rows="3" 
                            placeholder="Enter your complete address"><?php echo isset($user_data['address']) ? htmlspecialchars($user_data['address']) : ''; ?></textarea>
                </div>
              </div>
              
              <div class="form-row">
                <div class="form-group">
                  <label for="city">City</label>
                  <input type="text" id="city" name="city" class="form-control" 
                         value="<?php echo isset($user_data['city']) ? htmlspecialchars($user_data['city']) : ''; ?>">
                </div>
                
                <div class="form-group">
                  <label for="country">Country</label>
                  <select id="country" name="country" class="form-control">
                    <option value="">Select Country</option>
                    <option value="Pakistan" <?php echo (isset($user_data['country']) && $user_data['country'] == 'Pakistan') ? 'selected' : ''; ?>>Pakistan</option>
                    <option value="India" <?php echo (isset($user_data['country']) && $user_data['country'] == 'India') ? 'selected' : ''; ?>>India</option>
                    <option value="Bangladesh" <?php echo (isset($user_data['country']) && $user_data['country'] == 'Bangladesh') ? 'selected' : ''; ?>>Bangladesh</option>
                    <option value="United States" <?php echo (isset($user_data['country']) && $user_data['country'] == 'United States') ? 'selected' : ''; ?>>United States</option>
                    <option value="United Kingdom" <?php echo (isset($user_data['country']) && $user_data['country'] == 'United Kingdom') ? 'selected' : ''; ?>>United Kingdom</option>
                    <option value="Canada" <?php echo (isset($user_data['country']) && $user_data['country'] == 'Canada') ? 'selected' : ''; ?>>Canada</option>
                    <option value="Australia" <?php echo (isset($user_data['country']) && $user_data['country'] == 'Australia') ? 'selected' : ''; ?>>Australia</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-actions">
              <a href="../account/account.php" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancel
              </a>
              <button type="submit" name="update_profile" class="btn btn-primary" id="submitBtn">
                <i class="fas fa-save"></i> Update Profile
              </button>
            </div>
          </form>
        </div>
        
        <?php
      } else {
        ?>
        <div class="empty-state">
          <div class="empty-state-icon">
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
      <div class="empty-state">
        <div class="empty-state-icon">
          <i class="fas fa-user-lock"></i>
        </div>
        <h4>Please log in to edit your profile</h4>
        <p>Sign in to access and modify your account information</p>
        <a href="../auth/login.php" class="btn btn-primary">
          <i class="fas fa-sign-in-alt"></i> Login Now
        </a>
      </div>
      <?php
    }
    ?>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('editProfileForm');
  const submitBtn = document.getElementById('submitBtn');
  
  // Form validation
  function validateForm() {
    let isValid = true;
    
    // Name validation
    const name = document.getElementById('name');
    if (name.value.trim().length < 2) {
      showError(name, 'Name must be at least 2 characters long');
      isValid = false;
    } else {
      showSuccess(name);
    }
    
    // Email validation
    const email = document.getElementById('email');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value)) {
      showError(email, 'Please enter a valid email address');
      isValid = false;
    } else {
      showSuccess(email);
    }
    
    // Phone validation (optional but if provided, should be valid)
    const phone = document.getElementById('phone');
    if (phone.value.trim() && phone.value.trim().length < 10) {
      showError(phone, 'Please enter a valid phone number');
      isValid = false;
    } else if (phone.value.trim()) {
      showSuccess(phone);
    }
    
    return isValid;
  }
  
  function showError(input, message) {
    input.classList.add('error');
    input.classList.remove('success');
    const errorDiv = input.nextElementSibling.classList.contains('input-icon') ? 
                     input.parentNode.querySelector('.error-message') : 
                     input.nextElementSibling;
    if (errorDiv && errorDiv.classList.contains('error-message')) {
      errorDiv.textContent = message;
      errorDiv.classList.add('show');
    }
  }
  
  function showSuccess(input) {
    input.classList.add('success');
    input.classList.remove('error');
    const errorDiv = input.nextElementSibling.classList.contains('input-icon') ? 
                     input.parentNode.querySelector('.error-message') : 
                     input.nextElementSibling;
    if (errorDiv && errorDiv.classList.contains('error-message')) {
      errorDiv.classList.remove('show');
    }
  }
  
  // Real-time validation
  document.getElementById('name').addEventListener('blur', function() {
    if (this.value.trim().length < 2) {
      showError(this, 'Name must be at least 2 characters long');
    } else {
      showSuccess(this);
    }
  });
  
  document.getElementById('email').addEventListener('blur', function() {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(this.value)) {
      showError(this, 'Please enter a valid email address');
    } else {
      showSuccess(this);
    }
  });
  
  document.getElementById('phone').addEventListener('blur', function() {
    if (this.value.trim() && this.value.trim().length < 10) {
      showError(this, 'Please enter a valid phone number');
    } else if (this.value.trim()) {
      showSuccess(this);
    }
  });
  
  // Form submission
  form.addEventListener('submit', function(e) {
    if (!validateForm()) {
      e.preventDefault();
      return false;
    }
    
    // Show loading state
    submitBtn.classList.add('loading');
    submitBtn.disabled = true;
  });
  
  // Avatar upload handling
  document.getElementById('avatar-upload').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      // Here you would typically upload the file to server
      // For now, we'll just show a placeholder
      console.log('Avatar file selected:', file.name);
      // You can implement actual file upload functionality here
    }
  });
  
  // Auto-hide success message after 5 seconds
  const successMessage = document.querySelector('.success-message.show');
  if (successMessage) {
    setTimeout(() => {
      successMessage.style.opacity = '0';
      setTimeout(() => {
        successMessage.remove();
      }, 300);
    }, 5000);
  }
});
</script>

</body>
</html>
<?php include '../includes/footer.php'; ?>