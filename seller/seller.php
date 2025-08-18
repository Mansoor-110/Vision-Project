<?php include('../includes/header.php'); ?>
<?php include('seller_sidebar.php'); ?>



    <div class="main-content">
        <div class="welcome-header">
            <div class="welcome-text">
                <h1>Welcome back, <?php echo $_SESSION['store_name']?></h1>
                <p>Here's what's happening with your store today</p>
            </div>
            <div class="profile-avatar">
                <i class="fas fa-user"></i>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-info">
                    <div class="stat-label">Total Products</div>
                    <div class="stat-value">124</div>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-gem"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <div class="stat-label">Pending Orders</div>
                    <div class="stat-value">18</div>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <div class="stat-label">Total Revenue</div>
                    <div class="stat-value">$12,450</div>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-info">
                    <div class="stat-label">New Messages</div>
                    <div class="stat-value">7</div>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
        </div>

        <div class="actions-section">
            <h2 class="section-title">Quick Actions</h2>
            <div class="actions-grid">
                <a href="#" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <h3 class="action-title">Add New Product</h3>
                    <p class="action-desc">Add jewelry, cosmetics, or beauty tools to your inventory</p>
                </a>
                
                <a href="#" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <h3 class="action-title">Manage Products</h3>
                    <p class="action-desc">Edit, update, or remove existing products from your store</p>
                </a>
                
                <a href="#" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <h3 class="action-title">View Orders</h3>
                    <p class="action-desc">Process and manage customer orders and shipments</p>
                </a>
                
                <a href="#" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3 class="action-title">Sales Analytics</h3>
                    <p class="action-desc">View detailed reports and sales performance data</p>
                </a>
                
                <a href="#" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <h3 class="action-title">Promotions</h3>
                    <p class="action-desc">Create and manage discounts and special offers</p>
                </a>
                
                <a href="#" class="action-card">
                    <div class="action-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="action-title">Customer Reviews</h3>
                    <p class="action-desc">Monitor and respond to customer feedback</p>
                </a>
            </div>
        </div>

        <div class="recent-activity">
            <h2 class="section-title">Recent Activity</h2>
            
            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title">New order received - Diamond Earrings</div>
                    <div class="activity-time">2 hours ago</div>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title">5-star review on Ruby Necklace</div>
                    <div class="activity-time">5 hours ago</div>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title">Order #1247 shipped successfully</div>
                    <div class="activity-time">1 day ago</div>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-icon">
                    <i class="fas fa-plus"></i>
                </div>
                <div class="activity-content">
                    <div class="activity-title">Added new product - Luxury Lipstick Set</div>
                    <div class="activity-time">2 days ago</div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('../includes/footer.php'); ?>