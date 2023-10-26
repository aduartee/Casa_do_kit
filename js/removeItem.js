document.addEventListener("DOMContentLoaded", function () {
    const removeButtons = document.querySelectorAll(".remove-button");

    function showToast(message, type) {
        const toast = document.getElementById('toast');
        toast.textContent = message;
        toast.classList.add(type);
        toast.style.display = 'block';
    
        setTimeout(() => {
            toast.style.display = 'none';
            toast.classList.remove(type);
        }, 3000);
    }

    removeButtons.forEach(button => {
        button.addEventListener("click", function () {
            const productId = button.getAttribute("data-id-product");
            const productPrice = button.getAttribute("data-price-product");
            const productRow = button.closest(".cart-item2");

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "removeItem.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        try {
                            const response = JSON.parse(xhr.responseText);
                            if (response.success) {
                                productRow.classList.add("cart-item-remove");
                                setTimeout(() => {
                                    productRow.remove();
                                    showToast("Produto removido do carrinho", "success");
                                    const totalElement = document.getElementById("footer-total");
                                    
                                    if (totalElement) {
                                        const currentTotalText = totalElement.textContent;
                                        const currentTotal = parseFloat(currentTotalText.replace("Total: R$ ", "").replace(",", "."));
                                        
                                        const productPriceSub = parseFloat(productPrice);
                                        const productQuantity = parseFloat(button.previousElementSibling.value);
                                        const sub = currentTotal - (productPriceSub * productQuantity);
                                        
                                        totalElement.textContent = "Total: R$ " + sub.toFixed(2).replace(".", ",");
                                    }
                                }, 2000);
                            } else {
                                showToast("Erro ao remover o produto do carrinho", "error");
                            }
                        } catch (error) {
                            console.error("Erro ao fazer parse da resposta JSON:", error);
                        }
                    }
                }
            };

            const data = new URLSearchParams();
            data.append("idProduct", productId);

            xhr.send(data);
        });
    });
});
