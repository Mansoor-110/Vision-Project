<?php
// process_order.php
include '../includes/connection.php';

// Set headers for JSON response
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Only POST method allowed']);
    exit;
}

// Check if user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'User not authenticated']);
    exit;
}

$user_id = $_SESSION['user_id'];

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

// Validate required fields
$required_fields = ['first_name', 'last_name', 'email', 'phone', 'address', 'city', 'payment_method'];
foreach ($required_fields as $field) {
    if (empty($input[$field])) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => ucfirst(str_replace('_', ' ', $field)) . ' is required']);
        exit;
    }
}

// Validate email format
if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid email format']);
    exit;
}

// Validate payment method
$valid_payment_methods = ['jazzcash', 'easypaisa', 'card', 'bank'];
if (!in_array($input['payment_method'], $valid_payment_methods)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid payment method']);
    exit;
}

// Get cart data - FIXED: using 'item' instead of 'product_id'
$cart_query = "SELECT * FROM cart WHERE user_id = ?";
$cart_stmt = $conn->prepare($cart_query);
$cart_stmt->bind_param("i", $user_id);
$cart_stmt->execute();
$cart_result = $cart_stmt->get_result();

if ($cart_result->num_rows == 0) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Cart is empty']);
    exit;
}

// Calculate totals
$subtotal = 0;
$cart_items = [];

while ($item = $cart_result->fetch_assoc()) {
    $item_total = (float)$item['product_price'] * (int)$item['quantity'];
    $subtotal += $item_total;
    $cart_items[] = $item;
}

$discount = 50.00;
$shipping = 150.00;
$total_amount = $subtotal - $discount + $shipping;

// Generate unique order number
$order_number = 'ORD' . date('Ymd') . rand(1000, 9999);

// Check if order number exists (unlikely but good practice)
$check_order = "SELECT id FROM orders WHERE order_number = ?";
$check_stmt = $conn->prepare($check_order);
$check_stmt->bind_param("s", $order_number);
$check_stmt->execute();
if ($check_stmt->get_result()->num_rows > 0) {
    $order_number = 'ORD' . date('Ymd') . rand(10000, 99999);
}

// Begin transaction
$conn->autocommit(false);

try {
    // Insert order
    $order_sql = "INSERT INTO orders (
        user_id, order_number, first_name, last_name, email, phone, 
        address, city, postal_code, payment_method, 
        subtotal, shipping_cost, discount_amount, total_amount
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $order_stmt = $conn->prepare($order_sql);
    $order_stmt->bind_param(
        "isssssssssdddd", 
        $user_id,
        $order_number,
        $input['first_name'],
        $input['last_name'],
        $input['email'],
        $input['phone'],
        $input['address'],
        $input['city'],
        $input['postal_code'] ?? '',
        $input['payment_method'],
        $subtotal,
        $shipping,
        $discount,
        $total_amount
    );
    
    if (!$order_stmt->execute()) {
        throw new Exception('Failed to create order');
    }
    
    $order_id = $conn->insert_id;
    
    
    $item_sql = "INSERT INTO order_items (
        order_id, product_id, product_name, product_image, 
        product_price, quantity, total_price
    ) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $item_stmt = $conn->prepare($item_sql);
    
    foreach ($cart_items as $item) {
        $item_total = (float)$item['product_price'] * (int)$item['quantity'];
        
        $item_stmt->bind_param(
            "iissdid",
            $order_id,
            $item['item'], // FIXED: changed from $item['product_id'] to $item['item']
            $item['product_name'],
            $item['product_image'],
            $item['product_price'],
            $item['quantity'],
            $item_total
        );
        
        if (!$item_stmt->execute()) {
            throw new Exception('Failed to add order item');
        }
    }
    
    // Store payment details (if needed)
    $payment_details = [];
    
    switch ($input['payment_method']) {
        case 'jazzcash':
            if (!empty($input['jazzcash_number'])) {
                $payment_details['wallet_number'] = $input['jazzcash_number'];
            }
            break;
            
        case 'easypaisa':
            if (!empty($input['easypaisa_number'])) {
                $payment_details['wallet_number'] = $input['easypaisa_number'];
            }
            break;
            
        case 'card':
            if (!empty($input['card_name'])) {
                $payment_details['card_holder_name'] = $input['card_name'];
                // Store only last 4 digits for security
                if (!empty($input['card_number'])) {
                    $card_number = str_replace(' ', '', $input['card_number']);
                    $payment_details['card_last_four'] = substr($card_number, -4);
                }
            }
            break;
            
        case 'bank':
            if (!empty($input['selected_bank'])) {
                $payment_details['bank_name'] = $input['selected_bank'];
            }
            break;
    }
    
    // Insert payment details if any
    if (!empty($payment_details)) {
        $payment_sql = "INSERT INTO payment_details (order_id, payment_method, wallet_number, card_last_four, card_holder_name, bank_name) VALUES (?, ?, ?, ?, ?, ?)";
        $payment_stmt = $conn->prepare($payment_sql);
        $payment_stmt->bind_param(
            "isssss",
            $order_id,
            $input['payment_method'],
            $payment_details['wallet_number'] ?? null,
            $payment_details['card_last_four'] ?? null,
            $payment_details['card_holder_name'] ?? null,
            $payment_details['bank_name'] ?? null
        );
        $payment_stmt->execute();
    }
    
    // Simulate payment processing
    $payment_success = processPayment($input['payment_method'], $total_amount);
    
    if ($payment_success['success']) {
        // Update order with transaction ID
        $update_sql = "UPDATE orders SET transaction_id = ?, payment_status = 'completed', order_status = 'confirmed' WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("si", $payment_success['transaction_id'], $order_id);
        $update_stmt->execute();
        
        // Clear user's cart
        $clear_cart_sql = "DELETE FROM cart WHERE user_id = ?";
        $clear_stmt = $conn->prepare($clear_cart_sql);
        $clear_stmt->bind_param("i", $user_id);
        $clear_stmt->execute();
        
        // Commit transaction
        $conn->commit();
        
        // Send success response
        echo json_encode([
            'success' => true,
            'message' => 'Order placed successfully!',
            'data' => [
                'order_id' => $order_id,
                'order_number' => $order_number,
                'transaction_id' => $payment_success['transaction_id'],
                'total_amount' => $total_amount,
                'payment_method' => $input['payment_method'],
                'estimated_delivery' => calculateDeliveryDate($cart_items)
            ]
        ]);
        
        // Optional: Send confirmation email
        // sendOrderConfirmationEmail($input['email'], $order_number, $total_amount);
        
    } else {
        // Payment failed
        $update_sql = "UPDATE orders SET payment_status = 'failed' WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("i", $order_id);
        $update_stmt->execute();
        
        $conn->commit(); // Still commit the order record for tracking
        
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => $payment_success['message'] ?? 'Payment processing failed',
            'order_id' => $order_id,
            'order_number' => $order_number
        ]);
    }
    
} catch (Exception $e) {
    // Rollback transaction
    $conn->rollback();
    
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Order processing failed: ' . $e->getMessage()
    ]);
}

// Restore autocommit
$conn->autocommit(true);

// Helper function to simulate payment processing
function processPayment($method, $amount) {
    // Simulate processing time
    sleep(1);
    
    // Simulate success/failure (90% success rate)
    $success = rand(1, 100) <= 90;
    
    if ($success) {
        return [
            'success' => true,
            'transaction_id' => 'TXN' . strtoupper($method) . date('YmdHis') . rand(100, 999),
            'message' => 'Payment processed successfully'
        ];
    } else {
        return [
            'success' => false,
            'message' => 'Payment declined. Please check your payment details and try again.'
        ];
    }
}

// Helper function to calculate estimated delivery date
function calculateDeliveryDate($cart_items) {
    $max_days = 5; // Default delivery days
    
    foreach ($cart_items as $item) {
        if ($item['product_name'] == 'Customized jewellery') {
            $max_days = 14; // Customized items take longer
            break;
        }
    }
    
    return date('Y-m-d', strtotime("+{$max_days} days"));
}

// Optional: Function to send confirmation email
function sendOrderConfirmationEmail($email, $order_number, $total_amount) {
    // Implement email sending logic here
    // You can use PHPMailer or built-in mail() function
    
    $subject = "Order Confirmation - " . $order_number;
    $message = "Thank you for your order! Your order number is: " . $order_number . 
               "\nTotal Amount: Rs. " . number_format($total_amount, 2);
    
    // mail($email, $subject, $message);
}
?>