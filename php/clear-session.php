<?php
session_start();

if (isset($_POST['okClicked']) && $_POST['okClicked'] === 'true') {
    // Clear the 'cart' session variable
    unset($_SESSION['cart']);

    // Optionally, you can destroy the entire session if needed
    // session_destroy();
    // session_unset();

    // Send a response to the client
    echo "Session data cleared";
} else {
    // Handle invalid or unexpected requests
    echo "Invalid request";
}
?>