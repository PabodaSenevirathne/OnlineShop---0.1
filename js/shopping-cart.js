
// Function to update cart and navigate to checkout
function updateCartAndNavigateToCheckout() {
    sessionStorage.clear();

    // Optional: You can also remove a specific item from session storage by specifying its key
    // sessionStorage.removeItem('yourKey');

    // Add any other logic you want to perform after clearing session storage
    console.log("Session storage cleared!");
    const cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Send the cart data to the server
    const xhr = new XMLHttpRequest();
   // xhr.open("POST", "http://localhost/Projects/Assignment3/shopping-cart.php", true);
   xhr.open("POST", "../shopping-cart.php", true);




    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
        console.log(`ReadyState: ${xhr.readyState}, Status: ${xhr.status}`);
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("Cart updated successfully!");
            // Redirect to the checkout page
           window.location.href = "checkout.php";
        }else{
            console.error("Error updating cart:", xhr.status, xhr.statusText);

        }
    };

    xhr.send(JSON.stringify({ cart: cart }));
}


//update cart
function updateCart() {
    const cartItemsList = document.getElementById("cartItems");
    const cartTotalElement = document.getElementById("cartTotal");
    const cart = JSON.parse(localStorage.getItem("cart")) || [];

    let cartTotal = 0;

    cartItemsList.innerHTML = "";

    cart.forEach(item => {
        const listItem = document.createElement("li");
        listItem.textContent = `${item.name} x${item.quantity} - $${(item.price * item.quantity).toFixed(2)}`;
        cartItemsList.appendChild(listItem);

        cartTotal += item.price * item.quantity;
    });

    cartTotalElement.textContent = cartTotal.toFixed(2);
}

window.addEventListener("load", updateCart);
