function adicionarCarrinho(idProduto, nomeProduto, precoProduto, imagemProduto) {
    // Pegando a quantidade selecionada e o tamanho selecionado
    var quantidade = document.getElementById('quantidade').textContent;
    var tamanho = document.getElementById('tamanho').value;
    
    $.ajax({
        url: '../carrinho.php', 
        method: 'POST',
        data: {
            id: idProduto,
            nome: nomeProduto,
            preco: precoProduto,
            imagem: imagemProduto,
            quantidade: quantidade,
            tamanho: tamanho
        },
        success: function(response) {
            alert('Deu certo');
        },
        error: function() {
            alert('Ocorreu um erro ao adicionar o produto ao carrinho.');
        }
    });
}
