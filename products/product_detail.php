<?php include '../includes/header.php' ?>
<?php
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    include('../includes/connection.php');
    $query = "SELECT * FROM add_product WHERE product_id='$product_id'";
    $sql = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($sql);

    $product_name = $data['product_name'];
    $product_price = $data['product_price'];
    $product_image = $data['product_image'];
    $product_description = $data['product_description'];

    $images_query = "SELECT * FROM additional_images WHERE product_id='$product_id'";
    $images_sql = mysqli_query($conn, $images_query);
    $total = mysqli_num_rows($images_sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <style>
       .checkout-btn {
    width: 130px;
    height: 45px;
    border-radius: 12px;
    background: linear-gradient(135deg, #8B0000 0%, #A0252A 50%, #B83A3A 100%);
    border: none;
    color: white;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.25);
    position: relative;
    overflow: hidden;
}

.checkout-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.checkout-btn:hover::before {
    left: 100%;
}

.checkout-btn:hover {
    transform: translateY(-3px);
    background: white;
    border: 2px solid #8B0000;
    color: #8B0000;
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.3);
}

.checkout-btn:active {
    transform: translateY(-1px);
    box-shadow: 0 2px 10px rgba(139, 0, 0, 0.2);
}

.wish-btn {
    margin-left: 10px;
    width: 130px;
    height: 45px;
    border: 2px solid rgba(139, 0, 0, 0.3);
    color: #8B0000;
    border-radius: 12px;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(248, 248, 248, 0.95));
    font-weight: 500;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 2px 10px rgba(139, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
}

.wish-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(139, 0, 0, 0.1), transparent);
    transition: left 0.5s;
}

.wish-btn:hover::before {
    left: 100%;
}

.wish-btn a {
    text-decoration: none;
    color: inherit;
    display: block;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.wish-btn:hover {
    transform: translateY(-3px);
    border: 2px solid #8B0000;
    color: white;
    background: linear-gradient(135deg, #8B0000 0%, #A0252A 50%, #B83A3A 100%);
    box-shadow: 0 8px 25px rgba(139, 0, 0, 0.3);
}

.wish-btn:active {
    transform: translateY(-1px);
    box-shadow: 0 2px 10px rgba(139, 0, 0, 0.2);
}

.product-image {
    width: 100%;
    max-height: 450px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 8px 30px rgba(139, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.product-image:hover {
    transform: scale(1.02);
    box-shadow: 0 12px 40px rgba(139, 0, 0, 0.2);
}

.thumbnail {
    width: 75px;
    height: 75px;
    object-fit: cover;
    cursor: pointer;
    opacity: 0.6;
    border-radius: 8px;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    box-shadow: 0 2px 8px rgba(139, 0, 0, 0.1);
}

.thumbnail:hover {
    opacity: 1;
    transform: scale(1.05);
    border-color: rgba(139, 0, 0, 0.3);
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.2);
}

.thumbnail.active {
    opacity: 1;
    border-color: #8B0000;
    box-shadow: 0 4px 15px rgba(139, 0, 0, 0.3);
    transform: scale(1.05);
}

.thumbnail-row {
    overflow-x: auto;
    display: flex;
    gap: 12px;
    padding: 15px 0;
    scrollbar-width: thin;
    scrollbar-color: #8B0000 rgba(139, 0, 0, 0.1);
}

.thumbnail-row::-webkit-scrollbar {
    height: 6px;
}

.thumbnail-row::-webkit-scrollbar-track {
    background: rgba(139, 0, 0, 0.1);
    border-radius: 3px;
}

.thumbnail-row::-webkit-scrollbar-thumb {
    background: #8B0000;
    border-radius: 3px;
}

.thumbnail-row::-webkit-scrollbar-thumb:hover {
    background: #A0252A;
}

/* Enhanced button container */
.button-container {
    display: flex;
    gap: 15px;
    margin-top: 20px;
    align-items: center;
}

/* Loading state for buttons */
.checkout-btn.loading,
.wish-btn.loading {
    pointer-events: none;
    opacity: 0.7;
}

.checkout-btn.loading::after,
.wish-btn.loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    margin: -10px 0 0 -10px;
    border: 2px solid transparent;
    border-top: 2px solid currentColor;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Focus states for accessibility */
.checkout-btn:focus,
.wish-btn:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.3);
}

@media (max-width: 768px) {
    .checkout-btn,
    .wish-btn {
        width: 100%;
        margin: 8px 0;
    }
    
    .button-container {
        flex-direction: column;
        gap: 10px;
    }

    .thumbnail {
        width: 65px;
        height: 65px;
    }
    
    .thumbnail-row {
        gap: 8px;
        padding: 12px 0;
    }
    
    .product-image {
        max-height: 300px;
    }
}

@media (max-width: 480px) {
    .checkout-btn,
    .wish-btn {
        height: 50px;
        font-size: 16px;
    }
    
    .thumbnail {
        width: 55px;
        height: 55px;
    }
}


    </style>
</head>
<body>
<div class="container mt-5 mb-5">
    <div class="row">
        <!-- Product Images -->
        <div class="col-md-6 col-12 mb-4">
            <img src="<?php echo $product_image ?>" alt="Product" class="img-fluid rounded product-image" id="mainImage">
            <div class="thumbnail-row">
                <img src="<?php echo $product_image ?>" alt="Thumbnail 1" class="thumbnail rounded active" onclick="changeImage(event, this.src)">
                <?php
                if ($total > 0) {
                    while ($images_data = mysqli_fetch_assoc($images_sql)) {
                        ?>
                        <img src="<?php echo $images_data['product_image'] ?>" alt="Thumbnail" class="thumbnail rounded" onclick="changeImage(event, this.src)">
                        <?php
                    }
                } else {
                    echo "<p class='text-muted'>No Other Images Found</p>";
                }
                ?>
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6 col-12">
            <h2 class="mb-3"><?php echo $product_name ?></h2>
            <p class="text-black">Store Name: <h5 style="font-weight:bold;"><?php echo ucwords($data['seller_name'])?></h5></p>
            <div class="mb-3">
                <span class="h4 me-2">Rs.<?php echo $product_price ?></span>
                <span class="text-black-50"><s>Rs.<?php echo $product_price + 300; ?></s></span>
            </div>
            
            <p class="mb-3"><?php echo $product_description ?></p>

            <form action="../cart/cartcrud.php" method="post">
                <input type="hidden" name="product_name" value="<?php echo $product_name ?>">
                <input type="hidden" name="product_image" value="<?php echo $product_image ?>">
                <input type="hidden" name="product_price" value="<?php echo $product_price ?>">
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" class="form-control text-center" id="quantity" name="quantity" value="1" min="1" style="max-width: 100px; background: transparent; color: black;">
                </div>
                <input class="checkout-btn mb-3" type="submit" value="Add to Cart" name="submit">
            </form>

            <button class="wish-btn mb-3">
                <a href="../wishlist/add_wishlist.php?id=<?php echo $product_id ?>"><i class="bi bi-heart"></i> Add to Wishlist</a>
            </button>
        </div>
    </div>
</div>




<script>
    function changeImage(event, src) {
        document.getElementById('mainImage').src = src;
        document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
        event.target.classList.add('active');
    }
</script>
</body>
</html>
<?php include '../includes/footer.php' ?>
