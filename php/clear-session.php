<?php
session_start();

if (isset($_POST['okClicked']) && $_POST['okClicked'] === 'true') {
    // Clear the 'cart' session variable
    unset($_SESSION['cart']);

    // Send a response to the client
    echo "Session data cleared";
} else {
    // Handle invalid or unexpected requests
    echo "Invalid request";
}
?>