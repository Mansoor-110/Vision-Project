<?php
session_start();
include '../includes/connection.php';

// Set content type to JSON
header('Content-Type: application/json');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not authenticated']);
    exit;
}

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);
$order_id = isset($input['order_id']) ? intval($input['order_id']) : 0;

if (!$order_id) {
    echo json_encode(['success' => false, 'message' => 'Invalid order ID']);
    exit;
}

try {
    // Start transaction
    $conn->begin_transaction();
    
    // Get order details and verify ownership
    $order_query = "SELECT * FROM orders WHERE id = ? AND user_id = ?";
    $order_stmt = $conn->prepare($order_query);
    $order_stmt->bind_param("ii", $order_id, $_SESSION['user_id']);
    $order_stmt->execute();
    $order = $order_stmt->get_result()->fetch_assoc();
    
    if (!$order) {
        throw new Exception('Order not found or access denied');
    }
    
    // Check if order can be cancelled
    $cancellable_statuses = ['pending', 'confirmed'];
    if (!in_array($order['order_status'], $cancellable_statuses)) {
        throw new Exception('Order cannot be cancelled at this stage');
    }
    
    // Update order status to cancelled
    $update_query = "UPDATE orders SET order_status = 'cancelled', updated_at = NOW() WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("i", $order_id);
    
    if (!$update_stmt->execute()) {
        throw new Exception('Failed to update order status');
    }
    
    // If payment was completed, update payment status to refunded
    if ($order['payment_status'] === 'completed') {
        $payment_query = "UPDATE orders SET payment_status = 'refunded' WHERE id = ?";
        $payment_stmt = $conn->prepare($payment_query);
        $payment_stmt->bind_param("i", $order_id);
        
        if (!$payment_stmt->execute()) {
            throw new Exception('Failed to update payment status');
        }
    }
    
    // Optional: Restore product inventory
    // $items_query = "SELECT product_id, quantity FROM order_items WHERE order_id = ?";
    // $items_stmt = $conn->prepare($items_query);
    // $items_stmt->bind_param("i", $order_id);
    // $items_stmt->execute();
    // $items = $items_stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    
    // foreach ($items as $item) {
    //     if ($item['product_id']) {
    //         $inventory_query = "UPDATE products SET stock = stock + ? WHERE id = ?";
    //         $inventory_stmt = $conn->prepare($inventory_query);
    //         $inventory_stmt->bind_param("ii", $item['quantity'], $item['product_id']);
    //         $inventory_stmt->execute();
    //     }
    // }
    
    // Log the cancellation (optional)
    $log_query = "INSERT INTO order_logs (order_id, action, description, created_at) VALUES (?, 'cancelled', 'Order cancelled by customer', NOW())";
    $log_stmt = $conn->prepare($log_query);
    $log_stmt->bind_param("i", $order_id);
    $log_stmt->execute();
    
    // Commit transaction
    $conn->commit();
    
    // Send cancellation email (optional)
    // sendCancellationEmail($order);
    
    echo json_encode([
        'success' => true, 
        'message' => 'Order cancelled successfully',
        'order_id' => $order_id
    ]);
    
} catch (Exception $e) {
    // Rollback transaction
    $conn->rollback();
    
    echo json_encode([
        'success' => false, 
        'message' => $e->getMessage()
    ]);
}

// Function to send cancellation email (optional)
function sendCancellationEmail($order) {
    $to = $order['email'];
    $subject = "Order Cancellation Confirmation - Order #" . $order['order_number'];
    
    $message = "
    <html>
    <head>
        <title>Order Cancelled</title>
        <style>
            body { font-family: Arial, sans-serif; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: #f8f9fa; padding: 20px; text-align: center; }
            .content { padding: 20px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>Order Cancellation Confirmation</h2>
            </div>
            <div class='content'>
                <p>Dear " . htmlspecialchars($order['first_name']) . ",</p>
                <p>Your order #" . $order['order_number'] . " has been successfully cancelled.</p>
                <p>If you had made a payment, the refund will be processed within 3-5 business days.</p>
                <p>Thank you for your understanding.</p>
                <p>Best regards,<br>Your Store Team</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: orders@yourstore.com" . "\r\n";
    
    mail($to, $subject, $message, $headers);
}
?>