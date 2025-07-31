<?php
session_start();
include '../includes/connection.php';

if (isset($_GET['id']) && isset($_SESSION['user_id'])) {
    $product_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Fetch product details from add_product table
    $query = "SELECT * FROM add_product WHERE product_id = '$product_id'";
    $sql = mysqli_query($conn, $query);

    if (mysqli_num_rows($sql) > 0) {
        $product = mysqli_fetch_assoc($sql);
        $product_name = mysqli_real_escape_string($conn, $product['product_name']);
        $product_price = $product['product_price'];
        $product_image = mysqli_real_escape_string($conn, $product['product_image']);
        $quantity=1;

        // Check if product already exists in wishlist
        $check = "SELECT * FROM wishlist WHERE user_id = '$user_id' AND product_name = '$product_name'";
        $check_result = mysqli_query($conn, $check);

        if (mysqli_num_rows($check_result) == 0) {
            // Insert into wishlist
            $insert = "INSERT INTO wishlist (user_id, product_name,  product_price, product_image,quantity)
                       VALUES ('$user_id', '$product_name', '$product_price', '$product_image','$quantity')";
            mysqli_query($conn, $insert);
        }
    }
}

// Redirect back to previous page
header('Location:wishlist.php');
exit;
?>
