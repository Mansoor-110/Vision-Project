<?php include('../includes/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Jewelry Body - <?php echo htmlspecialchars($_GET['type'] ?? 'Jewelry'); ?></title>
    <style>
        .jewelry-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .jewelry-item {
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .jewelry-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            border-color: #007bff;
        }
        
        .jewelry-item img {
            width: 100%;
            max-width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        
        .jewelry-title {
            text-align: center;
            margin: 30px 0;
            color: #333;
            text-transform: capitalize;
        }
        
        .no-results {
            text-align: center;
            padding: 50px;
            color: #666;
            font-size: 18px;
        }
        
        .back-link {
            display: inline-block;
            margin: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .back-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
include('../includes/connection.php');

// Sanitize input to prevent SQL injection
$body_type = isset($_GET['type']) ? mysqli_real_escape_string($conn, $_GET['type']) : '';

if (empty($body_type)) {
    echo '<div class="no-results">No jewelry type specified.</div>';
    exit;
}

// Use prepared statement for better security
$query = "SELECT * FROM jewellery_bodies WHERE body_type = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $body_type);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$total = mysqli_num_rows($result);
?>

<div class="container">
    
    <h1 class="jewelry-title">Select <?php echo htmlspecialchars($body_type); ?> Style</h1>
    
    <?php if ($total > 0): ?>
        <a href="javascript:history.back()" class="auth-btn mt-3" style="width:200px; margin-left:20px;">← Back to Categories</a>
        <div class="jewelry-container mb-5">
            <?php while ($data = mysqli_fetch_assoc($result)): ?>
                <div class="jewelry-item">
                    <a href="custom_jewellery.php?body_id=<?php echo $data['id']; ?>">
                        <img src="../admin/<?php echo htmlspecialchars($data['body_image']); ?>" 
                             alt="<?php echo htmlspecialchars($body_type); ?> style"
                             onerror="this.src='../images/placeholder.jpg';">
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <div class="no-results">
            <h3>No <?php echo htmlspecialchars($body_type); ?> styles found</h3>
            <p>Please check back later or browse other categories.</p>
              <a href="javascript:history.back()" class="auth-btn mt-3 text-center" style="width:200px; margin-left:440px;">← Back to Categories</a>
        </div>
    <?php endif; ?>
</div>

<?php
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

</body>
</html>

<?php include('../includes/footer.php'); ?>