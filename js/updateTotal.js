document.addEventListener("DOMContentLoaded", function () {
    const quantityInputs = document.querySelectorAll(".quantity");

    quantityInputs.forEach(quantityInput => {
        quantityInput.addEventListener("change", function () {
            const productId = this.getAttribute("data-product-id");
            const newQuantity = parseInt(this.value);

            updateCartQuantity(productId, newQuantity);
        }); 
    });

    function updateCartQuantity(productId, newQuantity) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "updateQuantity.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const quantityInput = document.querySelector(`.quantity[data-product-id="${productId}"]`);
                    quantityInput.value = newQuantity;
                    const footerTotal = document.getElementById('footer-total');
                    const currentTotal = parseFloat(footerTotal.textContent.replace('Total: R$', '').replace(',', '.'));
                    const priceDifference = quantityInput.dataset.currentQuantity * quantityInput.dataset.productPrice;
                    const updatedTotal = currentTotal + priceDifference;

                    footerTotal.textContent = 'Total: R$ ' + updatedTotal.toFixed(2);
                }
            }
        };

        // Preparar dados para enviar
        const data = new URLSearchParams();
        data.append("productId", productId);
        data.append("newQuantity", newQuantity);

        xhr.send(data);
    }
});
