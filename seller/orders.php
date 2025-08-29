<?php include('../includes/header.php'); ?>
<?php include('seller_sidebar.php'); ?>

<style>
.main-content {
        padding: 20px;
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        min-height: 100vh;
    }

    .welcome-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding: 20px 0;
        border-bottom: 2px solid rgba(128, 0, 32, 0.1);
    }

    .welcome-text h1 {
        color: #2c2c2c;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 8px;
        font-family: 'Georgia', serif;
    }

    .welcome-text p {
        color: #666;
        font-size: 16px;
        margin: 0;
    }

    .profile-avatar {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(128, 0, 32, 0.1);
        border: 2px solid rgba(128, 0, 32, 0.05);
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(128, 0, 32, 0.15);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #800020, #a0002a);
    }

    .stat-card .stat-icon {
        font-size: 36px;
        color: #800020;
        margin-bottom: 15px;
    }

    .stat-card .stat-number {
        font-size: 32px;
        font-weight: 700;
        color: #2c2c2c;
        margin-bottom: 5px;
        font-family: 'Georgia', serif;
    }

    .stat-card .stat-label {
        font-size: 16px;
        color: #666;
        font-weight: 500;
    }

    .actions-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .actions-header h2 {
        color: #2c2c2c;
        font-size: 24px;
        font-weight: 600;
        margin: 0;
        font-family: 'Georgia', serif;
    }

    .action-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .btn {
        padding: 12px 24px;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-family: 'Georgia', serif;
    }

    .btn-primary {
        background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
        color: #ffffff;
        box-shadow: 0 4px 15px rgba(128, 0, 32, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(128, 0, 32, 0.4);
    }

    .btn-secondary {
        background: linear-gradient(135deg, #ffffff 0%, #f8f8f8 100%);
        color: #2c2c2c;
        border: 2px solid rgba(128, 0, 32, 0.2);
    }

    .btn-secondary:hover {
        background: rgba(128, 0, 32, 0.05);
        color: #800020;
        border-color: #800020;
    }

    .search-filter-bar {
        background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(128, 0, 32, 0.1);
        border: 2px solid rgba(128, 0, 32, 0.05);
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
    }

    .search-filter-bar::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #800020, #a0002a);
    }

    .search-filter-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr auto;
        gap: 20px;
        align-items: end;
    }

    .search-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .search-label {
        font-size: 14px;
        font-weight: 600;
        color: #2c2c2c;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .search-label i {
        color: #800020;
        font-size: 16px;
    }

    .search-input,
    .search-select {
        padding: 12px 16px;
        border: 2px solid rgba(128, 0, 32, 0.2);
        border-radius: 10px;
        font-size: 14px;
        font-family: 'Georgia', serif;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
        color: #2c2c2c;
    }

    .search-input:focus,
    .search-select:focus {
        outline: none;
        border-color: #800020;
        box-shadow: 0 0 0 3px rgba(128, 0, 32, 0.1);
        background: #ffffff;
    }

    .products-container {
        background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
        border-radius: 15px;
        box-shadow: 0 6px 25px rgba(128, 0, 32, 0.1);
        border: 2px solid rgba(128, 0, 32, 0.05);
        overflow: hidden;
        position: relative;
    }

    .products-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #800020, #a0002a);
    }

    .products-header {
        padding: 25px 30px;
        border-bottom: 2px solid rgba(128, 0, 32, 0.1);
        background: rgba(128, 0, 32, 0.02);
    }

    .products-header h3 {
        color: #2c2c2c;
        font-size: 20px;
        font-weight: 600;
        margin: 0;
        font-family: 'Georgia', serif;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .products-header i {
        color: #800020;
        font-size: 22px;
    }

    .products-table {
        width: 100%;
        border-collapse: collapse;
    }

    .products-table th {
        background: linear-gradient(135deg, rgba(128, 0, 32, 0.05) 0%, rgba(160, 0, 42, 0.05) 100%);
        padding: 18px 20px;
        text-align: left;
        font-weight: 600;
        color: #2c2c2c;
        font-size: 14px;
        border-bottom: 2px solid rgba(128, 0, 32, 0.1);
        font-family: 'Georgia', serif;
    }

    .products-table td {
        padding: 20px;
        border-bottom: 1px solid rgba(128, 0, 32, 0.05);
        vertical-align: middle;
    }

    .products-table tr:hover {
        background: rgba(128, 0, 32, 0.02);
        transition: all 0.3s ease;
    }

    .product-image {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        object-fit: cover;
        border: 2px solid rgba(128, 0, 32, 0.1);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .product-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .product-name {
        font-weight: 600;
        color: #2c2c2c;
        font-size: 16px;
        margin: 0;
    }

    .product-category {
        font-size: 13px;
        color: #666;
    }

    .product-price {
        font-weight: 700;
        color: #800020;
        font-size: 16px;
    }

    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-active {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .status-inactive {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .status-draft {
        background: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }

    .action-buttons-cell {
        display: flex;
        gap: 8px;
    }

    .btn-sm {
        padding: 8px 12px;
        font-size: 12px;
        min-width: auto;
    }

    .btn-edit {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        color: white;
    }

    .btn-edit:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
    }

    .btn-delete {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: white;
    }

    .btn-delete:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
    }

    .btn-view {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
    }

    .btn-view:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    }
    .btn-plus{
        background: linear-gradient(135deg, #3158d9ff 0%, #645be1ff 100%);
        color: white;
    }

    .btn-plus:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    }

    .empty-state {
        padding: 60px 30px;
        text-align: center;
        color: #666;
    }

    .empty-state i {
        font-size: 64px;
        color: rgba(128, 0, 32, 0.3);
        margin-bottom: 20px;
    }

    .empty-state h4 {
        font-size: 20px;
        margin-bottom: 10px;
        color: #2c2c2c;
    }

    .empty-state p {
        font-size: 16px;
        margin-bottom: 25px;
    }

    .pagination {
        display: flex;
        justify-content: center;
        gap: 5px;
        padding: 25px;
        background: rgba(128, 0, 32, 0.02);
        border-top: 1px solid rgba(128, 0, 32, 0.1);
    }

    .pagination a,
    .pagination span {
        padding: 10px 15px;
        border: 1px solid rgba(128, 0, 32, 0.2);
        border-radius: 8px;
        text-decoration: none;
        color: #2c2c2c;
        transition: all 0.3s ease;
    }

    .pagination a:hover,
    .pagination .active {
        background: linear-gradient(135deg, #800020 0%, #a0002a 100%);
        color: white;
        border-color: #800020;
    }

    /* Alert Messages */
    .alert {
        margin: 20px 0;
        padding: 15px 20px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 500;
    }

    .alert-success {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        border: 1px solid #c3e6cb;
        color: #155724;
    }

    .alert-error {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        border: 1px solid #f5c6cb;
        color: #721c24;
    }

    .close-btn {
        margin-left: auto;
        background: none;
        border: none;
        font-size: 18px;
        cursor: pointer;
        opacity: 0.7;
    }

    .close-btn:hover {
        opacity: 1;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .products-table {
            font-size: 12px;
        }

        .products-table th,
        .products-table td {
            padding: 12px 8px;
        }

        .action-buttons-cell {
            flex-direction: column;
        }
    }

    /* Order Management Specific Styles */

/* Order Filters */
.order-filters {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.order-filter-btn {
    padding: 8px 16px;
    border: 2px solid #ddd;
    background: white;
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 14px;
    font-weight: 500;
}

.order-filter-btn:hover {
    border-color: #007bff;
    color: #007bff;
}

.order-filter-btn.active {
    background: #007bff;
    border-color: #007bff;
    color: white;
}

/* Order Items */
.order-item {
    background: white;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 15px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border-left: 4px solid #e9ecef;
}

.order-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    flex-wrap: wrap;
    gap: 10px;
}

.order-id {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

.order-status {
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase;
}

.status-pending {
    background: #fff3cd;
    color: #856404;
}

.status-processing {
    background: #d1ecf1;
    color: #0c5460;
}

.status-shipped {
    background: #d4edda;
    color: #155724;
}

.status-delivered {
    background: #d1ecf1;
    color: #0c5460;
}

.status-cancelled {
    background: #f8d7da;
    color: #721c24;
}

.order-amount {
    font-size: 18px;
    font-weight: bold;
    color: #28a745;
}

.order-actions {
    display: flex;
    gap: 8px;
}

.order-action-btn {
    padding: 6px 12px;
    border: 1px solid #007bff;
    background: white;
    color: #007bff;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
    transition: all 0.3s ease;
}

.order-action-btn:hover {
    background: #007bff;
    color: white;
}

.order-action-btn.process {
    border-color: #28a745;
    color: #28a745;
}

.order-action-btn.process:hover {
    background: #28a745;
    color: white;
}

.order-action-btn.ship {
    border-color: #17a2b8;
    color: #17a2b8;
}

.order-action-btn.ship:hover {
    background: #17a2b8;
    color: white;
}

.order-action-btn.refund {
    border-color: #dc3545;
    color: #dc3545;
}

.order-action-btn.refund:hover {
    background: #dc3545;
    color: white;
}

.order-details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 10px;
    padding-top: 10px;
    border-top: 1px solid #e9ecef;
    color: #666;
    font-size: 14px;
}

.order-customer {
    font-weight: 500;
}

.order-products {
    font-style: italic;
}

.order-date {
    color: #888;
}

/* Responsive Design */
@media (max-width: 768px) {
    .order-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .order-actions {
        width: 100%;
        justify-content: flex-end;
    }
    
    .order-details {
        grid-template-columns: 1fr;
        gap: 5px;
    }
    
    .order-filters {
        justify-content: center;
    }
}
</style>

<div class="main-content">
    <div class="welcome-header">
        <div class="welcome-text">
            <h1>Order Management</h1>
            <p>Manage and track all your customer orders</p>
        </div>
        <div class="profile-avatar">
            <i class="fas fa-shopping-bag"></i>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-info">
                <div class="stat-label">Total Orders</div>
                <div class="stat-value">89</div>
            </div>
            <div class="stat-icon">
                <i class="fas fa-shopping-cart"></i>
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
                <div class="stat-label">Processing</div>
                <div class="stat-value">12</div>
            </div>
            <div class="stat-icon">
                <i class="fas fa-cog"></i>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-info">
                <div class="stat-label">Shipped Today</div>
                <div class="stat-value">7</div>
            </div>
            <div class="stat-icon">
                <i class="fas fa-truck"></i>
            </div>
        </div>
    </div>

    <div class="actions-section">
        <h2 class="section-title">Order Filters</h2>
        <div class="order-filters">
            <button class="order-filter-btn active" data-status="all">All Orders</button>
            <button class="order-filter-btn" data-status="pending">Pending</button>
            <button class="order-filter-btn" data-status="processing">Processing</button>
            <button class="order-filter-btn" data-status="shipped">Shipped</button>
            <button class="order-filter-btn" data-status="delivered">Delivered</button>
            <button class="order-filter-btn" data-status="cancelled">Cancelled</button>
        </div>
    </div>

    <div class="recent-activity">
        <h2 class="section-title">Recent Orders</h2>
        
        <div class="order-item">
            <div class="order-header">
                <div class="order-id">#1458</div>
                <div class="order-status status-pending">Pending</div>
                <div class="order-amount">$299.99</div>
                <div class="order-actions">
                    <button class="order-action-btn view">View</button>
                    <button class="order-action-btn process">Process</button>
                </div>
            </div>
            <div class="order-details">
                <div class="order-customer">Customer: Sarah Johnson</div>
                <div class="order-products">Diamond Earrings Set, Silver Chain Bracelet</div>
                <div class="order-date">Ordered: 2 hours ago</div>
            </div>
        </div>

        <div class="order-item">
            <div class="order-header">
                <div class="order-id">#1457</div>
                <div class="order-status status-processing">Processing</div>
                <div class="order-amount">$149.50</div>
                <div class="order-actions">
                    <button class="order-action-btn view">View</button>
                    <button class="order-action-btn ship">Ship</button>
                </div>
            </div>
            <div class="order-details">
                <div class="order-customer">Customer: Michael Chen</div>
                <div class="order-products">Ruby Necklace, Luxury Lipstick Set</div>
                <div class="order-date">Ordered: 4 hours ago</div>
            </div>
        </div>

        <div class="order-item">
            <div class="order-header">
                <div class="order-id">#1456</div>
                <div class="order-status status-shipped">Shipped</div>
                <div class="order-amount">$89.99</div>
                <div class="order-actions">
                    <button class="order-action-btn view">View</button>
                    <button class="order-action-btn track">Track</button>
                </div>
            </div>
            <div class="order-details">
                <div class="order-customer">Customer: Emma Davis</div>
                <div class="order-products">Gold Ring, Pearl Earrings</div>
                <div class="order-date">Ordered: 1 day ago</div>
            </div>
        </div>

        <div class="order-item">
            <div class="order-header">
                <div class="order-id">#1455</div>
                <div class="order-status status-delivered">Delivered</div>
                <div class="order-amount">$199.00</div>
                <div class="order-actions">
                    <button class="order-action-btn view">View</button>
                    <button class="order-action-btn review">Review</button>
                </div>
            </div>
            <div class="order-details">
                <div class="order-customer">Customer: James Wilson</div>
                <div class="order-products">Emerald Pendant, Silver Watch</div>
                <div class="order-date">Ordered: 3 days ago</div>
            </div>
        </div>

        <div class="order-item">
            <div class="order-header">
                <div class="order-id">#1454</div>
                <div class="order-status status-cancelled">Cancelled</div>
                <div class="order-amount">$75.00</div>
                <div class="order-actions">
                    <button class="order-action-btn view">View</button>
                    <button class="order-action-btn refund">Refund</button>
                </div>
            </div>
            <div class="order-details">
                <div class="order-customer">Customer: Lisa Brown</div>
                <div class="order-products">Crystal Bracelet</div>
                <div class="order-date">Ordered: 5 days ago</div>
            </div>
        </div>
    </div>
</div>
</div>


<?php
include ('../includes/footer.php');
?>