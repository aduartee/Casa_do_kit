
function adicionarAoCarrinho(event) {
    event.preventDefault();

    const produto = {
        nome: event.target.getAttribute("data-nome"),
        imagem: event.target.getAttribute("data-imagem"),
        // Outras informações do produto que você pode querer armazenar no carrinho
    };

    // Aqui você pode adicionar o objeto "produto" ao carrinho, seja em um array, objeto, etc.
    // Por exemplo, você pode adicionar o produto a um array global chamado "carrinho":
    carrinho.push(produto);

    // Atualize o contador do carrinho (se aplicável)
    contadorCarrinho.textContent = carrinho.length;

    // Você também pode querer fazer outras coisas, como exibir uma mensagem de sucesso, atualizar a interface, etc.
}
