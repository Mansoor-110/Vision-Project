<?php
// create_coupon_crud.php
session_start();
include("../includes/connection.php");

if(isset($_POST['submit']) && isset($_SESSION['admin_id'])){
    $coupon_code = mysqli_real_escape_string($conn, $_POST['coupon_code']);
    $discount_type = mysqli_real_escape_string($conn, $_POST['discount_type']);
    $discount_value = mysqli_real_escape_string($conn, $_POST['discount_value']);
    $minimum_amount = mysqli_real_escape_string($conn, $_POST['minimum_amount']);
    $maximum_discount = !empty($_POST['maximum_discount']) ? mysqli_real_escape_string($conn, $_POST['maximum_discount']) : 'NULL';
    $usage_limit = !empty($_POST['usage_limit']) ? mysqli_real_escape_string($conn, $_POST['usage_limit']) : 'NULL';
    $valid_from = mysqli_real_escape_string($conn, $_POST['valid_from']);
    $valid_until = mysqli_real_escape_string($conn, $_POST['valid_until']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $used_count = 0; // Default to 0 for new coupons
    $created_at = date('Y-m-d H:i:s');
    
    // Check if coupon code already exists
    $check_query = "SELECT * FROM coupons WHERE coupon_code = '$coupon_code'";
    $check_result = mysqli_query($conn, $check_query);
    
    if(mysqli_num_rows($check_result) > 0){
        echo "<script>alert('Coupon code already exists!'); window.location.href='coupon_form.php';</script>";
        exit();
    }
    
    $query = "INSERT INTO coupons (coupon_code, discount_type, discount_value, minimum_amount, maximum_discount, usage_limit, used_count, valid_from, valid_until, status, created_at) 
              VALUES ('$coupon_code', '$discount_type', '$discount_value', '$minimum_amount', " . 
              ($maximum_discount === 'NULL' ? 'NULL' : "'$maximum_discount'") . ", " .
              ($usage_limit === 'NULL' ? 'NULL' : "'$usage_limit'") . ", '$used_count', '$valid_from', '$valid_until', '$status', '$created_at')";
    
    $sql = mysqli_query($conn, $query);
    
    if($sql){
        echo "<script>alert('Coupon created successfully!'); window.location.href='view_coupons.php';</script>";
    } else {
        echo "<script>alert('Error creating coupon!'); window.location.href='coupon_form.php';</script>";
    }
} else {
    header('location:login.php');
}
?>

<?php
// update_coupon_crud.php
session_start();
include("../includes/connection.php");

if(isset($_POST['submit']) && isset($_SESSION['admin_id'])){
    $coupon_id = mysqli_real_escape_string($conn, $_POST['coupon_id']);
    $coupon_code = mysqli_real_escape_string($conn, $_POST['coupon_code']);
    $discount_type = mysqli_real_escape_string($conn, $_POST['discount_type']);
    $discount_value = mysqli_real_escape_string($conn, $_POST['discount_value']);
    $minimum_amount = mysqli_real_escape_string($conn, $_POST['minimum_amount']);
    $maximum_discount = !empty($_POST['maximum_discount']) ? mysqli_real_escape_string($conn, $_POST['maximum_discount']) : 'NULL';
    $usage_limit = !empty($_POST['usage_limit']) ? mysqli_real_escape_string($conn, $_POST['usage_limit']) : 'NULL';
    $valid_from = mysqli_real_escape_string($conn, $_POST['valid_from']);
    $valid_until = mysqli_real_escape_string($conn, $_POST['valid_until']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    
    // Check if coupon code already exists for other coupons
    $check_query = "SELECT * FROM coupons WHERE coupon_code = '$coupon_code' AND id != '$coupon_id'";
    $check_result = mysqli_query($conn, $check_query);
    
    if(mysqli_num_rows($check_result) > 0){
        echo "<script>alert('Coupon code already exists!'); window.location.href='coupon_form.php?id=$coupon_id';</script>";
        exit();
    }
    
    $query = "UPDATE coupons SET 
              coupon_code = '$coupon_code',
              discount_type = '$discount_type',
              discount_value = '$discount_value',
              minimum_amount = '$minimum_amount',
              maximum_discount = " . ($maximum_discount === 'NULL' ? 'NULL' : "'$maximum_discount'") . ",
              usage_limit = " . ($usage_limit === 'NULL' ? 'NULL' : "'$usage_limit'") . ",
              valid_from = '$valid_from',
              valid_until = '$valid_until',
              status = '$status'
              WHERE id = '$coupon_id'";
    
    $sql = mysqli_query($conn, $query);
    
    if($sql){
        echo "<script>alert('Coupon updated successfully!'); window.location.href='coupon.php';</script>";
    } else {
        echo "<script>alert('Error updating coupon!'); window.location.href='coupon_form.php?id=$coupon_id';</script>";
    }
} else {
    header('location:login.php');
}
?>

<?php
// delete_coupon.php
session_start();
include("../includes/connection.php");

if(isset($_GET['id']) && isset($_SESSION['admin_id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    $query = "DELETE FROM coupons WHERE id = '$id'";
    $sql = mysqli_query($conn, $query);
    
    if($sql){
        echo "<script>alert('Coupon deleted successfully!'); window.location.href='view_coupons.php';</script>";
    } else {
        echo "<script>alert('Error deleting coupon!'); window.location.href='view_coupons.php';</script>";
    }
} else {
    header('location:login.php');
}
?>