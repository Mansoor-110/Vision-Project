    <?php
include('../includes/connection.php');

if(isset($_POST['submit'])){
    $product_id = $_POST['product_id'];
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_category = mysqli_real_escape_string($conn, $_POST['product_category']);
    $product_subcategory = mysqli_real_escape_string($conn, $_POST['product_subcategory']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
    $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
    $product_tag = mysqli_real_escape_string($conn, $_POST['product_tag']);
    $product_url = mysqli_real_escape_string($conn, $_POST['product_url']);

    $final_image = $product_url; // default: URL use hoga

    // Check if new file uploaded
    if(isset($_FILES['product_image']) && $_FILES['product_image']['size'] > 0){
        $product_image_name = $_FILES['product_image']['name'];
        $product_image_tmp  = $_FILES['product_image']['tmp_name'];
        move_uploaded_file($product_image_tmp, '../product_images/' . $product_image_name);
        $final_image = '../product_images/' . $product_image_name; // overwrite url with upload
    }

    $query = "UPDATE add_product SET 
                product_name='$product_name', 
                product_category='$product_category', 
                product_subcategory='$product_subcategory', 
                product_price='$product_price', 
                product_image='$final_image', 
                product_description='$product_description',
                product_tag='$product_tag'
              WHERE product_id='$product_id'";

    $sql = mysqli_query($conn, $query);
    header('location:view_product.php');
}
?>
