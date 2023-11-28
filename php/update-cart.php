<?php
session_start();

// Check if the necessary parameters are set
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get cart data from the POST request
    $requestData = json_decode(file_get_contents('php://input'), true);
    $cart = $requestData['cart'];

    // Update the session with the new cart data
    $_SESSION['cart'] = $cart;

    // Send a response to acknowledge the update
    echo "Cart updated successfully!";
} else {
    // If the request method is not POST, send an error response
    http_response_code(400);
    echo "Invalid request.";
}
?>
