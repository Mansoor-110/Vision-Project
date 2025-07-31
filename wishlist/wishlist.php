<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Wishlist</title>
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

    .wishlist-wrapper {
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

    .product-card {
      background: var(--white-primary);
      border-radius: 15px;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      border: 2px solid rgba(128, 0, 32, 0.1);
      box-shadow: 0 4px 12px var(--shadow-light);
      overflow: hidden;
      position: relative;
      margin-bottom: 20px;
    }

    .product-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--maroon-primary), var(--maroon-light));
    }

    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px var(--shadow-medium);
      border-color: var(--maroon-primary);
    }

    .product-image {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 12px;
      border: 2px solid rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease;
    }

    .product-card:hover .product-image {
      transform: scale(1.05);
    }

    .product-name {
      font-size: 1.3rem;
      font-weight: 600;
      color: var(--black-subtle);
      margin-bottom: 8px;
      line-height: 1.4;
    }

    .product-meta {
      color: #666;
      font-size: 0.9rem;
      margin-bottom: 5px;
    }

    .stock-status {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      font-size: 0.9rem;
      font-weight: 500;
    }

    .in-stock {
      color: #16a34a;
    }

    .product-price {
      font-size: 1.4rem;
      font-weight: 700;
      color: var(--maroon-primary);
      text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }

    .action-buttons {
      display: flex;
      gap: 15px;
      align-items: center;
    }

    .action-btn {
      width: 45px;
      height: 45px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      border: 2px solid transparent;
    }

    .move-to-cart {
      background: red;
      color: white;
      box-shadow: 0 2px 8px rgba(22, 163, 74, 0.3);
    }

    .move-to-cart:hover {
      transform: scale(1.1);
      box-shadow: 0 4px 15px rgba(22, 163, 74, 0.4);
      color: red;
    }

    .remove-btn {
      background: linear-gradient(135deg, #dc2626, #ef4444);
      color: white;
      box-shadow: 0 2px 8px rgba(220, 38, 38, 0.3);
    }

    .remove-btn:hover {
      transform: scale(1.1);
      box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4);
      color: red;
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

    .primary-btn {
      background: linear-gradient(135deg, var(--maroon-primary), var(--maroon-light));
      border: none;
      padding: 15px 35px;
      font-size: 1.1rem;
      font-weight: 600;
      border-radius: 50px;
      color: red;
      text-decoration: none;
      display: inline-block;
      transition: all 0.3s ease;
      box-shadow: 2px 8px 15px rgba(128, 0, 32, 0.3);
      /* Black texture */
      background-image: 
        radial-gradient(circle at 1px 1px, rgba(0,0,0,0.1) 1px, transparent 0);
      background-size: 20px 20px;
    }

    .primary-btn:hover {
      transform: translateY(-2px);
      background : red;
      box-shadow: 0 6px 20px rgba(128, 0, 32, 0.4);
      color: white;
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

    .wishlist-count {
      background: var(--maroon-primary);
      color: white;
      padding: 8px 16px;
      border-radius: 25px;
      font-size: 0.9rem;
      font-weight: 600;
      display: inline-block;
      margin-left: 15px;
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
      
      .product-card {
        margin: 0 15px 20px;
      }
      
      .product-image {
        width: 100px;
        height: 100px;
      }
      
      .action-buttons {
        flex-direction: column;
        gap: 10px;
      }
      
      .empty-state {
        margin: 0 15px;
        padding: 40px 20px;
      }
    }

    /* Animation for page load */
    .product-card {
      animation: fadeInUp 0.6s ease-out forwards;
      opacity: 0;
      transform: translateY(20px);
    }

    .product-card:nth-child(1) { animation-delay: 0.1s; }
    .product-card:nth-child(2) { animation-delay: 0.2s; }
    .product-card:nth-child(3) { animation-delay: 0.3s; }
    .product-card:nth-child(4) { animation-delay: 0.4s; }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

<div class="wishlist-wrapper">
  <div class="container">
    <?php
    include '../includes/connection.php';
    if (isset($_SESSION['user_id'])) {
      $user_id = $_SESSION['user_id'];
      $query = "SELECT * FROM wishlist WHERE user_id='$user_id'";
      $sql = mysqli_query($conn, $query);
      $total = mysqli_num_rows($sql);

      if ($total > 0) {
        echo '<div class="page-header">
                <div class="container">
                  <h1><i class="fas fa-heart"></i> My Wishlist<span class="wishlist-count">' . $total . ' items</span></h1>
                  <p>Your carefully curated collection of favorite products</p>
                </div>
              </div>';
        
        while ($data = mysqli_fetch_assoc($sql)) {
          ?>
          <div class='product-card p-4'>
            <div class='row align-items-center'>
              <div class='col-lg-2 col-md-3 col-sm-4 mb-3 mb-sm-0'>
                <img src="<?php echo $data['product_image']; ?>" class='product-image' alt="<?php echo $data['product_name']; ?>">
              </div>
              <div class='col-lg-6 col-md-5 col-sm-8 mb-3 mb-md-0'>
                <h5 class='product-name'><?php echo $data['product_name']; ?></h5>
                <p class='product-meta'>Added to your wishlist</p>
                <div class="stock-status in-stock">
                  <i class="fas fa-check-circle"></i>
                  <span>In Stock</span>
                </div>
              </div>
              <div class='col-lg-2 col-md-2 col-sm-6 mb-3 mb-md-0'>
                <div class='product-price'>Rs. <?php echo number_format($data['product_price']); ?></div>
              </div>
              <div class='col-lg-2 col-md-2 col-sm-6'>
                <div class='action-buttons justify-content-end'>
                  <a href="move_to_cart.php?item=<?php echo $data['id']; ?>" class="action-btn move-to-cart" title="Move to Cart">
                    <i class="fas fa-shopping-cart"></i>
                  </a>
                  <a href="remove_wishlist.php?item=<?php echo $data['id']; ?>" class="action-btn remove-btn" title="Remove from wishlist" onclick="return confirm('Are you sure you want to remove this item from your wishlist?')">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
      } else {
        ?>
        <div class="empty-state">
          <div class="empty-state-icon">
            <i class="fas fa-heart-broken"></i>
          </div>
          <h4>Your wishlist is empty</h4>
          <p>Discover amazing products and start building your dream collection!</p>
          <a href="../pages/index.php" class="primary-btn">
            <i class="fas fa-shopping-bag"></i> Start Shopping
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
        <h4>Please log in to view your wishlist</h4>
        <p>Sign in to save your favorite items and access them from any device</p>
        <a href="../auth/login.php" class="warning-btn">
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