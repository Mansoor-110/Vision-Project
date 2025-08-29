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
</style>

   <?php
if(isset($_GET['id'])){
$product_id=$_GET['id'];
$product_name=$_GET['name'];

?>
<div style="position: fixed; top: 30%; left: 35%; background: #ffffffff; border:  none; padding: 30px; z-index: 9999; box-shadow: 0 2px 10px #8000204c; width: 400px; border-radius:10px;">
        <h4 style="color: #721c24; font-weight:bolder;">Add More Images of Your Product: <?php echo $product_name?></h4>
        <form action="../admin/add_images_product.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="<?php echo $product_id?>">
            <input type="file" name="added_image[]" value="" class="mb-4" multiple>
            <input type="submit" name="submit" class="btn btn-success" value="Upload">
            <a href="manage_product.php" class="btn btn-danger">Cancel</a>
               <input type="hidden" name="redirect_url" value="<?php echo "../seller/manage_product.php"; ?>">
  
          </form>
      </div>
      <?php
}
?>


<div class="main-content">
    <div class="welcome-header">
        <div class="welcome-text">
            <h1>Manage Your Products</h1>
            <p>Here's what's happening with your store today</p>
        </div>
        <div class="profile-avatar">
            <i class="fas fa-user"></i>
        </div>
    </div>

    <!-- Success/Error Messages -->
    <?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <?php echo isset($_GET['message']) ? htmlspecialchars(urldecode($_GET['message'])) : 'Operation completed successfully!'; ?>
            <button type="button" class="close-btn" onclick="this.parentElement.remove();">&times;</button>
        </div>
    <?php endif; ?>

    <?php if(isset($_GET['error']) && $_GET['error'] == 1): ?>
        <div class="alert alert-error">
            <i class="fas fa-exclamation-triangle"></i>
            <?php echo isset($_GET['message']) ? htmlspecialchars(urldecode($_GET['message'])) : 'An error occurred!'; ?>
            <button type="button" class="close-btn" onclick="this.parentElement.remove();">&times;</button>
        </div>
    <?php endif; ?>



    <!-- Products Table -->
    <div class="products-container">
        <div class="products-header">
            <h3>
                <i class="fas fa-table"></i>
                Your Products
            </h3>
        </div>

        <table class="products-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Info</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include('../includes/connection.php');

                $seller_id=$_SESSION['user_id'];
                $query="Select * from add_product where seller_id=$seller_id";
                $sql=mysqli_query($conn,$query);
                $total=mysqli_num_rows($sql);
                if($total>0){
                    while($data=mysqli_fetch_assoc($sql)){
                        $product_id= $data['product_id'];
                        ?>

                     
                <!-- Sample Product Row 1 -->
                <tr>
                    <td>
                        <img src="<?php echo $data['product_image']?>" alt="Product" class="product-image">
                    </td>
                    <td>
                        <div class="product-info">
                            <div class="product-name"><?php echo $data['product_name']?></div>
                            <!-- <div class="product-category">Premium Collection</div> -->
                        </div>
                    </td>
                    <td>
                        <span class="product-category"><?php echo $data['product_subcategory']?></span>
                    </td>
                    <td>
                        <span class="product-price">Rs. <?php echo $data['product_price']?></span>
                    </td>
                   
                 
                    <td>
                        <div class="action-buttons-cell">
                            <a href="../products/product_detail.php?id=<?php echo $product_id?>" class="btn btn-sm btn-view" title="View">
                                <i class="fas fa-eye"></i>
                    </a>
                            <a href="manage_product.php?id=<?php echo $product_id?>&name=<?php echo $data['product_name']?>" class="btn btn-sm btn-plus" title="Add More Images">
                                <i class="fas fa-plus"></i>
                    </a>
                            <a href="updated_product.php?id=<?php echo $product_id?>" class="btn btn-sm btn-edit" title="Edit">
                                <i class="fas fa-edit"></i>
                    </a>
                            <a href="../admin/delete_product.php?id=<?php echo $product_id?>&redirect_url=../seller/manage_product.php" class="btn btn-sm btn-delete" title="Delete" onclick="return confirm('Are you sure you want to delete this product?')">
                                <i class="fas fa-trash"></i>
                    </a>
                        </div>
                    </td>
                </tr>
                   <?php
                    }
                }
                ?>

                            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination">
            <a href="#">&laquo;</a>
            <span class="active">1</span>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">&raquo;</a>
        </div>
    </div>
</div>
</div>

<script>
    // Search and filter functionality removed - only products table needed
    
    // Auto-hide alert messages after 5 seconds
    setTimeout(function() {
        var alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            alert.style.opacity = '0';
            alert.style.transition = 'opacity 0.5s ease';
            setTimeout(function() {
                alert.remove();
            }, 500);
        });
    }, 5000);

    // Confirm delete
    function confirmDelete(productId) {
        if (confirm('Are you sure you want to delete this product? This action cannot be undone.')) {
            // Redirect to delete script
            window.location.href = 'delete_product.php?id=' + productId;
        }
    }
</script>

<?php include('../includes/footer.php'); ?>