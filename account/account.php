<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Account</title>
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
    }

    body {
      background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      /* Subtle black dot texture */
      background-image: 
        radial-gradient(circle at 1px 1px, rgba(0,0,0,0.04) 1px, transparent 0),
        radial-gradient(circle at 15px 15px, rgba(0,0,0,0.02) 1px, transparent 0);
      background-size: 20px 20px, 40px 40px;
    }

    .account-wrapper {
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
      /* Black texture overlay */
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

    .account-card {
      background: var(--white-primary);
      border-radius: 15px;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      border: 2px solid rgba(128, 0, 32, 0.1);
      box-shadow: 0 4px 12px var(--shadow-light);
      overflow: hidden;
      position: relative;
      margin-bottom: 30px;
      padding: 30px;
    }

    .account-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--maroon-primary), var(--maroon-light));
    }

    .account-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px var(--shadow-medium);
      border-color: var(--maroon-primary);
    }

    .profile-section {
      display: flex;
      align-items: center;
      gap: 25px;
      margin-bottom: 30px;
    }

    .profile-avatar {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--maroon-primary), var(--maroon-light));
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
      color: white;
      font-weight: 600;
      box-shadow: 0 4px 15px rgba(128, 0, 32, 0.3);
    }

    .profile-info h3 {
      color: var(--black-subtle);
      font-size: 1.8rem;
      font-weight: 600;
      margin: 0 0 5px 0;
    }

    .profile-info p {
      color: #666;
      font-size: 1.1rem;
      margin: 0;
    }

    .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .info-item {
      padding: 20px;
      background: rgba(128, 0, 32, 0.05);
      border-radius: 12px;
      border-left: 4px solid var(--maroon-primary);
    }

    .info-item h5 {
      color: var(--maroon-primary);
      font-size: 0.9rem;
      font-weight: 600;
      text-transform: uppercase;
      margin: 0 0 8px 0;
      letter-spacing: 0.5px;
    }

    .info-item p {
      color: var(--black-subtle);
      font-size: 1.1rem;
      font-weight: 500;
      margin: 0;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .stat-card {
      background: linear-gradient(135deg, var(--white-primary), var(--white-off));
      padding: 25px 20px;
      border-radius: 12px;
      text-align: center;
      border: 2px solid rgba(128, 0, 32, 0.1);
      transition: all 0.3s ease;
    }

    .stat-card:hover {
      transform: translateY(-3px);
      border-color: var(--maroon-primary);
      box-shadow: 0 6px 20px var(--shadow-light);
    }

    .stat-icon {
      font-size: 2.5rem;
      color: var(--maroon-primary);
      margin-bottom: 15px;
    }

    .stat-number {
      font-size: 2rem;
      font-weight: 700;
      color: var(--black-subtle);
      margin-bottom: 5px;
    }

    .stat-label {
      color: #666;
      font-size: 0.9rem;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .action-buttons {
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
    }

    .action-btn {
      padding: 12px 25px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      border: none;
      cursor: pointer;
    }

    .action-btn.primary-btn {
      background: linear-gradient(135deg, var(--maroon-primary), var(--maroon-light));
      color: white;
      box-shadow: 0 4px 15px rgba(128, 0, 32, 0.3);
      padding: 20px 60px;
    }

    .action-btn.primary-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(128, 0, 32, 0.4);
      color: white;
    }

    .secondary-btn {
      background: linear-gradient(135deg, #6b7280, #9ca3af);
      color: white;
      box-shadow: 0 4px 15px rgba(107, 114, 128, 0.3);
      padding: 20px 60px;
    }

    .secondary-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(107, 114, 128, 0.4);
      color: black;
    }


    .warning-btn {
      background: linear-gradient(135deg, #f59e0b, #fbbf24);
      border: none;
      padding: 15px 35px;
      font-size: 1.1rem;
      font-weight: 600;
      border-radius: 50px;
      color: white;
      text-decoration: none;
      display: inline-block;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
    }

    .warning-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
      color: white;
    }

    .danger-btn {
      background: linear-gradient(135deg, #dc2626, #ef4444);
      color: white;
      box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
      padding: 20px 60px;
    }

    .danger-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
      color: black;
    }

    .empty-state {
      background: var(--white-primary);
      border-radius: 20px;
      padding: 60px 40px;
      text-align: center;
      border: 2px solid rgba(128, 0, 32, 0.1);
      box-shadow: 0 8px 30px var(--shadow-light);
      /* Subtle black texture */
      background-image: 
        radial-gradient(circle at 3px 3px, rgba(0,0,0,0.02) 1px, transparent 0);
      background-size: 30px 30px;
    }

    .empty-state-icon {
      font-size: 4rem;
      color: var(--maroon-primary);
      margin-bottom: 25px;
      opacity: 0.8;
    }

    .empty-state h4 {
      color: var(--black-subtle);
      font-size: 1.8rem;
      font-weight: 600;
      margin-bottom: 15px;
    }

    .empty-state p {
      color: #666;
      font-size: 1.1rem;
      margin-bottom: 30px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .page-header {
        padding: 30px 20px;
        margin: 0 15px 30px;
      }
      
      .page-header h1 {
        font-size: 2rem;
      }
      
      .account-card {
        margin: 0 15px 30px;
        padding: 20px;
      }
      
      .profile-section {
        flex-direction: column;
        text-align: center;
        gap: 15px;
      }
      
      .info-grid {
        grid-template-columns: 1fr;
      }
      
      .stats-grid {
        grid-template-columns: repeat(2, 1fr);
      }
      
      .action-buttons {
        justify-content: center;
      }
      
      .empty-state {
        margin: 0 15px;
        padding: 40px 20px;
      }
    }

    /* Animation for page load */
    .account-card {
      animation: fadeInUp 0.6s ease-out forwards;
      opacity: 0;
      transform: translateY(20px);
    }

    .account-card:nth-child(1) { animation-delay: 0.1s; }
    .account-card:nth-child(2) { animation-delay: 0.2s; }
    .account-card:nth-child(3) { animation-delay: 0.3s; }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

<div class="account-wrapper">
  <div class="container">
    <?php
    include '../includes/connection.php';
    if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
      
      // Get user information (assuming user_registration table based on your session structure)
      $user_query = "SELECT * FROM user_acc WHERE id='$user_id'";
      $user_result = mysqli_query($conn, $user_query);
      $user_data = mysqli_fetch_assoc($user_result);
      
      // Get user statistics (with error handling for missing tables)
      $orders_data = array('order_count' => 0);
      if (mysqli_query($conn, "SHOW TABLES LIKE 'orders'")) {
        $orders_query = "SELECT COUNT(*) as order_count FROM cart WHERE user_id='$user_id'";
        $orders_result = mysqli_query($conn, $orders_query);
        if ($orders_result) {
          $orders_data = mysqli_fetch_assoc($orders_result);
        }
      }
      
      $wishlist_data = array('wishlist_count' => 0);
      if (mysqli_query($conn, "SHOW TABLES LIKE 'wishlist'")) {
        $wishlist_query = "SELECT COUNT(*) as wishlist_count FROM wishlist WHERE user_id='$user_id'";
        $wishlist_result = mysqli_query($conn, $wishlist_query);
        if ($wishlist_result) {
          $wishlist_data = mysqli_fetch_assoc($wishlist_result);
        }
      }
      
      $cart_data = array('cart_count' => 0);
      if (mysqli_query($conn, "SHOW TABLES LIKE 'cart'")) {
        $cart_query = "SELECT COUNT(*) as cart_count FROM cart WHERE user_id='$user_id'";
        $cart_result = mysqli_query($conn, $cart_query);
        if ($cart_result) {
          $cart_data = mysqli_fetch_assoc($cart_result);
        }
      }

      if ($user_data) {
        echo '<div class="page-header">
                <div class="container">
                  <h1><i class="fas fa-user-circle"></i> My Account</h1>
                  <p>Manage your profile and account settings</p>
                </div>
              </div>';
        ?>
        
        <!-- Profile Information Card -->
        <div class='account-card'>
          <div class='profile-section'>
            <div class='profile-avatar'>
              <?php echo strtoupper(substr($user_data['name'], 0, 2)); ?>
            </div>
            <div class='profile-info'>
              <h3><?php echo htmlspecialchars($user_data['name']); ?></h3>
              <p><?php echo htmlspecialchars($user_data['email']); ?></p>
            </div>
          </div>
          
          <div class='info-grid'>
            <div class='info-item'>
              <h5>Full Name</h5>
              <p><?php echo htmlspecialchars($user_data['name']); ?></p>
            </div>
            <div class='info-item'>
              <h5>Email Address</h5>
              <p><?php echo htmlspecialchars($user_data['email']); ?></p>
            </div>
            <div class='info-item'>
              <h5>Phone Number</h5>
              <p><?php echo isset($user_data['phone']) ? htmlspecialchars($user_data['phone']) : 'Not provided'; ?></p>
            </div>
            <div class='info-item'>
              <h5>Member Since</h5>
              <p><?php echo isset($user_data['created_at']) ? date('F Y', strtotime($user_data['created_at'])) : 'N/A'; ?></p>
            </div>
          </div>
          
          <div class='action-buttons'>
            <a href="edit_profile.php" class="action-btn primary-btn">
              <i class="fas fa-edit"></i> Edit Profile
            </a>
            <a href="change_password.php" class="action-btn secondary-btn">
              <i class="fas fa-key"></i> Change Password
            </a>
          </div>
        </div>

        <!-- Account Statistics Card -->
        <div class='account-card'>
          <h4 style="color: var(--black-subtle); margin-bottom: 25px; font-size: 1.5rem;">
            <i class="fas fa-chart-bar"></i> Account Overview
          </h4>
          
          <div class='stats-grid'>
            <div class='stat-card'>
              <div class='stat-icon'>
                <i class="fas fa-shopping-bag"></i>
              </div>
              <div class='stat-number'><?php echo $orders_data['order_count']; ?></div>
              <div class='stat-label'>Total Orders</div>
            </div>
            
            <div class='stat-card'>
              <div class='stat-icon'>
                <i class="fas fa-heart"></i>
              </div>
              <div class='stat-number'><?php echo $wishlist_data['wishlist_count']; ?></div>
              <div class='stat-label'>Wishlist Items</div>
            </div>
            
            <div class='stat-card'>
              <div class='stat-icon'>
                <i class="fas fa-shopping-cart"></i>
              </div>
              <div class='stat-number'><?php echo $cart_data['cart_count']; ?></div>
              <div class='stat-label'>Cart Items</div>
            </div>
            
            <div class='stat-card'>
              <div class='stat-icon'>
                <i class="fas fa-calendar-alt"></i>
              </div>
             <div class='stat-number'>
  <?php 
    echo isset($user_data['created_at']) 
      ? number_format((time() - strtotime($user_data['created_at'])) / (60 * 60 * 24), 0) 
      : 0; 
  ?>
</div>

              <div class='stat-label'>Days Active</div>
            </div>
          </div>
        </div>

        <!-- Quick Actions Card -->
        <div class='account-card'>
          <h4 style="color: var(--black-subtle); margin-bottom: 25px; font-size: 1.5rem;">
            <i class="fas fa-bolt"></i> Quick Actions
          </h4>
          
          <div class='action-buttons'>
            <a href="../wishlist/wishlist.php" class="action-btn primary-btn">
              <i class="fas fa-heart"></i> My Wishlist
            </a>
            <a href="../cart/cart.php" class="action-btn primary-btn">
              <i class="fas fa-shopping-cart"></i> Shopping Cart
            </a>
            <a href="../pages/index.php" class="action-btn danger-btn">
              <i class="fas fa-shopping-bag"></i> Continue Shopping
            </a>
            <a href="../auth/logout.php" class="action-btn danger-btn" onclick="return confirm('Are you sure you want to logout?')">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a>
          </div>
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
          <a href="../pages/index.php" class="primary-btn">
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
        <h4>Please log in to view your account</h4>
        <p>Sign in to access your profile, orders, and account settings</p>
        <a href="../auth/login.php" class="warning-btn login">
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