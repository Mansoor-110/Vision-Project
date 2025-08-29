<style>
    body {
        margin: 0;
        font-family: 'Georgia', serif;
        background: linear-gradient(135deg, #ffffff 0%, #f8f8f8 50%, #ffffff 100%);
        color: #2c2c2c;
        line-height: 1.6;
        min-height: 100vh;
    }

    .dashboard-container {
        display: flex;
        flex-direction: row;
        min-height: calc(100vh - 40px);
        margin-top: 20px;
        padding: 20px;
        box-sizing: border-box;
        gap: 30px;
        max-width: 1400px;
        margin-left: auto;
        margin-right: auto;
    }

    .sidebar {
        width: 280px;
        background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
        color: #2c2c2c;
        padding: 30px 25px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(128, 0, 32, 0.15);
        border: 2px solid rgba(128, 0, 32, 0.1);
        height: fit-content;
        position: sticky;
        top: 40px;
    }

    .sidebar-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 35px;
        padding-bottom: 25px;
        border-bottom: 2px solid rgba(128, 0, 32, 0.2);
    }

    .sidebar-icon {
        background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
        color: #ffffff;
        width: 55px;
        height: 55px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        box-shadow: 0 6px 20px rgba(128, 0, 32, 0.3);
    }

    .sidebar h2 {
        font-size: 24px;
        margin: 0;
        color: #800020;
        font-weight: 600;
        text-shadow: 0 2px 4px rgba(128, 0, 32, 0.1);
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar ul li {
        margin: 12px 0;
    }

    .sidebar ul li a {
        color: #2c2c2c;
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 18px 20px;
        border-radius: 15px;
        transition: all 0.3s ease;
        font-size: 16px;
        font-weight: 500;
        gap: 15px;
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
    }

    .sidebar ul li a:hover {
        color: #800020;
        background: rgba(128, 0, 32, 0.1);
        border-color: rgba(128, 0, 32, 0.3);
    }

    .sidebar ul li a i {
        font-size: 18px;
        width: 24px;
        text-align: center;
    }

    .sidebar ul li a.active {
        background: linear-gradient(135deg, rgba(128, 0, 32, 0.15) 0%, rgba(160, 0, 42, 0.15) 100%);
        color: #800020;
        border-color: rgba(128, 0, 32, 0.3);
        box-shadow: 0 6px 20px rgba(128, 0, 32, 0.2);
    }

    .main-content {
        flex: 1;
        background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(128, 0, 32, 0.15);
        border: 2px solid rgba(128, 0, 32, 0.1);
    }

    .welcome-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
        padding-bottom: 25px;
        border-bottom: 2px solid rgba(128, 0, 32, 0.2);
    }

    .welcome-text h1 {
        font-size: 36px;
        margin: 0 0 8px 0;
        color: #800020;
        font-weight: 600;
        text-shadow: 0 2px 4px rgba(128, 0, 32, 0.1);
    }

    .welcome-text p {
        font-size: 18px;
        margin: 0;
        color: #666;
        font-style: italic;
    }

    .profile-avatar {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: #ffffff;
        box-shadow: 0 8px 25px rgba(128, 0, 32, 0.3);
        border: 4px solid rgba(128, 0, 32, 0.2);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 50px;
    }

    .stat-card {
        background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
        color: #2c2c2c;
        padding: 30px;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(128, 0, 32, 0.12);
        border: 2px solid rgba(128, 0, 32, 0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #800020, #a0002a);
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(128, 0, 32, 0.15);
    }

    .stat-info {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .stat-label {
        font-size: 16px;
        color: #666;
        font-weight: 500;
    }

    .stat-value {
        font-size: 32px;
        font-weight: bold;
        color: #800020;
        text-shadow: 0 2px 4px rgba(128, 0, 32, 0.1);
    }

    .stat-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, rgba(128, 0, 32, 0.15) 0%, rgba(160, 0, 42, 0.15) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        color: #800020;
        border: 2px solid rgba(128, 0, 32, 0.2);
        transition: all 0.3s ease;
    }

    .stat-card:hover .stat-icon {
        background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
        color: #ffffff;
    }

    .actions-section {
        margin-bottom: 40px;
    }

    .section-title {
        font-size: 24px;
        color: #800020;
        margin-bottom: 25px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .section-title::before {
        content: '';
        width: 4px;
        height: 30px;
        background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
        border-radius: 2px;
    }

    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
    }

    .action-card {
        background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
        color: #2c2c2c;
        padding: 30px 25px;
        border-radius: 18px;
        text-align: center;
        transition: all 0.3s ease;
        text-decoration: none;
        box-shadow: 0 8px 25px rgba(128, 0, 32, 0.12);
        border: 2px solid rgba(128, 0, 32, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        position: relative;
        overflow: hidden;
    }

    .action-card::before {
        display: none;
    }

    .action-card:hover {
        transform: translateY(-2px);
        background: rgba(128, 0, 32, 0.05);
        color: #800020;
        text-decoration: none;
    }

    .action-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, rgba(128, 0, 32, 0.15) 0%, rgba(160, 0, 42, 0.15) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: #800020;
        border: 3px solid rgba(128, 0, 32, 0.2);
        transition: all 0.3s ease;
        z-index: 1;
        position: relative;
    }

    .action-card:hover .action-icon {
        background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
        color: #ffffff;
    }

    .action-title {
        font-size: 18px;
        font-weight: 600;
        margin: 0;
        z-index: 1;
        position: relative;
    }

    .action-desc {
        font-size: 14px;
        color: #666;
        margin: 0;
        z-index: 1;
        position: relative;
        text-align: center;
    }

    .recent-activity {
        background: linear-gradient(135deg, rgba(128, 0, 32, 0.05) 0%, rgba(160, 0, 42, 0.05) 100%);
        padding: 30px;
        border-radius: 18px;
        border: 2px solid rgba(128, 0, 32, 0.1);
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 20px;
        background: #ffffff;
        border-radius: 12px;
        margin-bottom: 15px;
        box-shadow: 0 4px 15px rgba(128, 0, 32, 0.1);
        border: 1px solid rgba(128, 0, 32, 0.1);
        transition: all 0.3s ease;
    }

    .activity-item:hover {
        background: rgba(128, 0, 32, 0.05);
    }

    .activity-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, rgba(128, 0, 32, 0.15) 0%, rgba(160, 0, 42, 0.15) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: #800020;
        flex-shrink: 0;
    }

    .activity-content {
        flex: 1;
    }

    .activity-title {
        font-weight: 600;
        color: #2c2c2c;
        margin: 0 0 5px 0;
    }

    .activity-time {
        font-size: 14px;
        color: #666;
        margin: 0;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .dashboard-container {
            padding: 20px;
            gap: 20px;
        }
        
        .sidebar {
            width: 260px;
            padding: 25px 20px;
        }
        
        .main-content {
            padding: 30px;
        }
    }

        @media (max-width: 992px) {
        .dashboard-container {
            flex-direction: column;
            margin-top: 20px;
        }

        .sidebar {
            width: 100%;
            position: static;
            margin-bottom: 20px;
        }

        .sidebar ul {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .sidebar ul li {
            margin: 0;
        }

        .welcome-header {
            flex-direction: column;
            gap: 20px;
            text-align: center;
        }

        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
    }

    @media (max-width: 768px) {
        .dashboard-container {
            padding: 15px;
            margin-top: 15px;
        }

        .main-content {
            padding: 25px 20px;
        }

        .welcome-text h1 {
            font-size: 28px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .actions-grid {
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .sidebar ul {
            grid-template-columns: 1fr;
        }

        .sidebar ul li a {
            padding: 15px 18px;
        }
    }

    @media (max-width: 576px) {
        .stat-card {
            padding: 25px 20px;
        }

        .action-card {
            padding: 25px 20px;
        }

        .profile-avatar {
            width: 60px;
            height: 60px;
            font-size: 24px;
        }

        .welcome-text h1 {
            font-size: 24px;
        }

        .welcome-text p {
            font-size: 16px;
        }
    }

    /* Remove excessive animations */
    
    /* Loading animation - removed */

    /* Focus states for accessibility */
    .sidebar ul li a:focus,
    .action-card:focus {
        outline: 3px solid rgba(128, 0, 32, 0.5);
        outline-offset: 2px;
    }
</style>

<div class="dashboard-container">
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-icon">
                <i class="fas fa-store"></i>
            </div>
            <h2>Seller Panel</h2>
        </div>
        <ul>
            <li><a href="seller.php" class=""><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="seller_add_product.php"><i class="fas fa-plus-circle"></i> Add Product</a></li>
            <li><a href="manage_product.php"><i class="fas fa-boxes"></i> Manage Products</a></li>
            <li><a href="orders.php"><i class="fas fa-shopping-cart"></i> Orders</a></li>
            <!-- <li><a href="messages.php"><i class="fas fa-comments"></i> Messages</a></li> -->
            <!-- <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li> -->
            <li><a href="../auth/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    