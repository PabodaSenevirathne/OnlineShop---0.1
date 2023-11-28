// function Ok() {
//     // Clear session storage
//     sessionStorage.clear();
//     console.log("Button clicked");
//     console.log("cleared");

//     unset($_SESSION['cart']);
//     console.log("cleared");

// // Optionally, you can destroy the entire session if needed
// session_destroy();
// session_unset()


// }
function Ok() {
    // Make an AJAX request to the server to clear session data
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/clear-session.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Session data cleared successfully
            console.log("Session data cleared");
            localStorage.removeItem("cart");
            // Close the receipt window
            window.close();

            // Redirect to the home page or any other desired page
            // window.location.href = "index.php"; // Replace "index.php" with the desired page
        }
    };
    // Send a simple POST request to trigger the server-side code
    xhr.send("okClicked=true");
}
