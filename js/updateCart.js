document.addEventListener("click", function updateCartAmount(event) {
    if (event.target && event.target.classList.contains("update-quantity-btn")) {
        const productId = event.target.getAttribute("data-product-id");
        const quantityInput = document.querySelector(`.quantity[data-product-id="${productId}"]`);
        const newQuantity = parseInt(quantityInput.value);
    }
});