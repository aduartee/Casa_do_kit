function abrirDetalhes(event) {
    event.preventDefault();

    const productDetails = document.getElementById("product-details");
    const productNameElement = document.getElementById("product-details-name");
    const productDescriptionElement = document.getElementById("product-details-description");
    const productPriceElement = document.getElementById("product-details-price");
    const produtoVolumeElement = document.getElementById('product-details-volume');
    const productAvailabilityElement = document.getElementById("product-details-availability");
    const addToCartButton = document.getElementById("add-to-cart-button");
    const productImageElement = document.getElementById("product-details-image");

    const button = event.target;
    const productId = button.getAttribute("data-id");
    const nomeProduto = button.getAttribute("data-nome");
    const precoProduto = parseFloat(button.getAttribute("data-preco"));
    const imagemProduto = button.getAttribute("data-imagem");
    const volumeProduto = button.getAttribute("data-volume");
    const descricaoProduto = button.getAttribute("data-descricao");
    const disponibilidadeProduto = button.getAttribute("data-disponibilidade");
    const cardsContainer = document.querySelector(".cards-container");
    const qtdProduto = parseInt(document.getElementById("quantidade").textContent);

    cardsContainer.classList.add("cards-ajuste");


    const product = {
        id: productId,
        name: nomeProduto,
        price: precoProduto,
        image: imagemProduto,
        description: descricaoProduto,
        availability: disponibilidadeProduto,
        volume: volumeProduto, 
        amount: qtdProduto
    };

    // Preencha as informações do produto na aba de detalhes
    productNameElement.textContent = product.name;
    productDescriptionElement.textContent = product.description;
    productPriceElement.textContent = "Preço: R$ " + product.price.toFixed(2);
    productAvailabilityElement.textContent = "Disponibilidade: " + product.availability;
    produtoVolumeElement.textContent = "Volume:" + product.volume;
    productImageElement.src = product.image;


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


    addToCartButton.addEventListener("click", function () {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "carrinho.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        showToast("Produto adicionado ao carrinho", "success");
                        const contadorCarrinho = document.getElementById("contador-carrinho");
                        contadorCarrinho.textContent = parseInt(contadorCarrinho.textContent) + 1;
                        contadorCarrinho.style.display = "block";
                    } else {
                        showToast("Erro ao adicionar o produto ao carrinho.", "error");
                    }
                }
            }
        };

        // Preparar dados para enviar
        const data = new URLSearchParams();
        data.append("productId", product.id);
        data.append("productName", product.name);
        data.append("productPrice", product.price);
        data.append("productImage", product.image);
        data.append("productAmount", product.amount);

        xhr.send(data);


    });
    productDetails.style.right = "0";
}

// Função para fechar a aba de detalhes
function fecharDetalhes() {
    const productDetails = document.getElementById("product-details");
    const cardsContainer = document.querySelector(".cards-container");
    cardsContainer.classList.remove("cards-ajuste");
    productDetails.style.right = "-100%";
}
