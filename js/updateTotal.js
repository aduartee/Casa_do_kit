document.addEventListener("DOMContentLoaded", function () {
    const quantityInputs = document.querySelectorAll(".quantity");

    quantityInputs.forEach(quantityInput => {
        quantityInput.addEventListener("change", function () {
            const productId = this.getAttribute("data-product-id");
            const newQuantity = parseInt(this.value);
            const currentQuantity = parseInt(this.dataset.currentQuantity);
            const productPrice = parseFloat(this.dataset.productPrice);
            
            updateCartQuantity(productId, newQuantity, currentQuantity, productPrice);
        });
    });

    function updateCartQuantity(productId, newQuantity, currentQuantity, productPrice) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "updateQuantity.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const quantityInput = document.querySelector(`.quantity[data-product-id="${productId}"]`);
                    quantityInput.dataset.currentQuantity = newQuantity; 

                    const footerTotal = document.getElementById('footer-total');
                    const currentTotal = parseFloat(footerTotal.textContent.replace('Total: R$', '').replace(',', '.'));

                    const quantityDifference = newQuantity - currentQuantity;
                    const priceDifference = quantityDifference * productPrice;
                    console.log(quantityDifference);

                    if (quantityDifference > 0) {
                        const updatedTotal = currentTotal + priceDifference;
                        footerTotal.textContent = 'Total: R$ ' + updatedTotal.toFixed(2);
                    } else if (quantityDifference < 0) {
                        const updatedTotal = currentTotal - Math.abs(priceDifference);
                        footerTotal.textContent = 'Total: R$ ' + updatedTotal.toFixed(2);
                    }
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
