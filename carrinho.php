<?php
require_once("header.php");
session_start();

// Função para adicionar um produto ao carrinho
function adicionarProdutoAoCarrinho($produto) {
    if(isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
        $carrinho = $_SESSION['carrinho'];
    } else {
        $carrinho = [];
    }
    
    $carrinho[] = $produto;
    $_SESSION['carrinho'] = $carrinho;
}

// Recebe os dados do produto via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto = [
        'id' => $_POST['id'],
        'imagem' => $_POST['imagem'],
        'nome' => $_POST['nome'],
        'preco' => $_POST['preco'],
        'quantidade' => $_POST['quantidade'],
        'tamanho' => $_POST['tamanho']
    ];
    
    adicionarProdutoAoCarrinho($produto);
}
?>

<body>
    <div class="cart-container">
        <h1 id="cart-title">Seu Carrinho</h1>
        
        <?php foreach ($carrinho as $produto) { ?>
        <div class="cart-item">
            <img src="<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>" class="cart-item-image">
            <div class="cart-item-details">
                <h2><?= $produto['nome'] ?></h2>
                <p>Preço: R$ <?= $produto['preco'] ?></p>
                <p>Quantidade: <?= $produto['quantidade'] ?></p>
                <p>Tamanho: <?= $produto['tamanho'] ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
