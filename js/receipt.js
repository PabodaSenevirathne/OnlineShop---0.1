function Ok() {
    // Make an AJAX request to the server to clear session data
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/clear-session.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("Session data cleared");
            localStorage.removeItem("cart");
            // Close the receipt window
            window.close();
        }
    };
    // Send a simple POST request to trigger the server-side code
    xhr.send("okClicked=true");
}
