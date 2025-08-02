<?php include'../includes/header.php'?>
    <style>
       * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #ffffff 0%, #f8f8f8 100%);
    color: #333333;
    overflow-x: hidden;
    min-height: 100vh;
}

/* Hero Section */
.hero {
    padding: 80px 20px;
    text-align: center;
    position: relative;
    background: radial-gradient(circle at center, rgba(128, 0, 32, 0.1) 0%, transparent 70%);
}

.ta-button {
    display: inline-block;
    padding: 15px 40px;
    background: transparent;
    border: 2px solid #800020;
    color: #800020;
    text-decoration: none;
    font-size: 1.1rem;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

.ta-button::before {
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    background: #800020;
    transition: left 0.3s ease;
    z-index: -1;
}

.ta-button:hover::before {
    left: 0;
}

.ta-button:hover {
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(128, 0, 32, 0.3);
}

/* Products Section */
.products {
    padding: 80px 20px;
    max-width: 1400px;
    margin: 0 auto;
}

.section-title {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 60px;
    color: #800020;
    font-weight: 300;
    letter-spacing: 2px;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 60px;
}

.product-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.4s ease;
    position: relative;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(128, 0, 32, 0.1);
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

.product-card::before {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent, rgba(128, 0, 32, 0.1), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card:hover::before {
    opacity: 1;
}

.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(128, 0, 32, 0.2);
    border-color: #800020;
}

.card-image {
    width: 100%;
    height: 250px;
    background: linear-gradient(135deg, #f5f5f5, #e0e0e0);
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: #800020;
    text-shadow: 0 0 15px rgba(128, 0, 32, 0.5);
}

.card-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent, rgba(128, 0, 32, 0.1), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-card:hover .card-image::after {
    opacity: 1;
}

.card-content {
    padding: 25px;
}

.card-title {
    font-size: 1.4rem;
    margin-bottom: 10px;
    color: #333;
    font-weight: 400;
}

.card-description {
    color: rgba(51, 51, 51, 0.7);
    line-height: 1.6;
    margin-bottom: 20px;
    font-size: 0.95rem;
}

.card-price {
    font-size: 1.3rem;
    color: #800020;
    font-weight: 600;
    margin-bottom: 15px;
}

.view-btn {
    display: inline-block;
    padding: 10px 25px;
    background: transparent;
    border: 1px solid rgba(128, 0, 32, 0.5);
    color: #800020;
    text-decoration: none;
    font-size: 0.9rem;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    cursor: pointer;
    border-radius: 5px;
}

.view-btn:hover {
    background: #800020;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(128, 0, 32, 0.3);
}

/* Category Sections */
.category-section {
    margin-bottom: 80px;
}

.category-title {
    font-size: 2rem;
    color: #800020;
    margin-bottom: 40px;
    text-align: center;
    font-weight: 300;
    letter-spacing: 1px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero {
        padding: 60px 15px;
    }

    .hero h1 {
        font-size: 2.5rem;
        letter-spacing: 1px;
    }

    .hero p {
        font-size: 1rem;
    }

    .products {
        padding: 60px 15px;
    }

    .product-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .section-title {
        font-size: 2rem;
    }

    .category-title {
        font-size: 1.5rem;
    }
}

@media (max-width: 480px) {
    .hero h1 {
        font-size: 2rem;
    }

    .card-content {
        padding: 20px;
    }

    .ta-button {
        padding: 12px 30px;
        font-size: 1rem;
    }
}

.wishlist-icon i {
    color: #800020;
    font-size: 27px;
    transition: all 0.3s ease-in-out;
    text-shadow: 0 0 2px #800020, 0 0 4px #600015;
    margin-left: 10px;
    justify-content: center;
    align-items: center;
}

.wishlist-icon i:hover {
    transform: scale(1.15);
    text-shadow: 0 0 4px #a0002a, 0 0 8px #80001a;
}



    </style>
<div class="category-section">   
  <div class="products">
    <?php
include('../includes/connection.php');
$category = isset($_GET['category']) ? $_GET['category'] : null;
$subcategory = isset($_GET['subcategory']) ? $_GET['subcategory'] : null;
if(empty($subcategory)){
  $query="select * from add_product where product_category='$category'  ";
 
}else{
  
  $query="select * from add_product where product_category='$category' and product_subcategory='$subcategory'   ";
}
 

$sql=mysqli_query($conn,$query);
$total=mysqli_num_rows($sql);

?>

    <h2 class="section-title"><?php echo $category?></h2>
    <h3 class="category-title"><?php echo $subcategory?></h3>
      <div class="product-grid">
    <?php
if($total>0){ while($data=mysqli_fetch_assoc($sql)){ ?>
    <div class="product-card mt-5 ">
      <div
       class="card-image"
                      style="
                      background-image: url('<?php echo $data['product_image']?>');
                     background-size: cover;
                        background-position: center;
                        height: 350px;
                      border-radius: 20px;
                          "
      ></div>
      <div class="card-content">
        <h3 class="card-title"><?php echo $data['product_name'] ?></h3>
        <p class="card-description">
          <?php echo $data['product_description'] ?>
        </p>
        <div class="card-price"><?php echo $data['product_price'] ?></div>
        <a href="product_detail.php?id=<?php echo $data['product_id']?>"class="view-btn">VIEW DETAILS</a>
     <a href="../wishlist/add_wishlist.php?id=<?php echo $data['product_id'] ?>" 
   class="wishlist-icon">
    <i class="fa-solid fa-heart"></i>
</a>

      </div>
    </div>

    <?php
    }
}else{
        echo "No products found";
    }


?>
  </div>
  </div>

<?php include'../includes/footer.php'?>
