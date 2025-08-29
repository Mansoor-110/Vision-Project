<?php
session_start();
include '../includes/connection.php';

header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['updated' => false]);
    exit;
}

$user_id = $_SESSION['user_id'];

// Check for recent order status updates (within last 30 seconds)
$check_query = "SELECT COUNT(*) as updated_count 
                FROM orders 
                WHERE user_id = ? 
                AND updated_at > DATE_SUB(NOW(), INTERVAL 30 SECOND)
                AND order_status IN ('processing', 'shipped', 'delivered')";

$check_stmt = $conn->prepare($check_query);
$check_stmt->bind_param("i", $user_id);
$check_stmt->execute();
$result = $check_stmt->get_result()->fetch_assoc();

echo json_encode(['updated' => $result['updated_count'] > 0]);
?>