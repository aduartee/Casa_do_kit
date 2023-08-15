<?php
require_once("header.php");

if (session_status() === PHP_SESSION_NONE) {
    session_name('carrinho');
    session_start();
}

// Verifique se há produtos no carrinho
if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
    $carrinho = $_SESSION['carrinho'];
} else {
    $carrinho = [];
}

// Recupere os dados do produto da URL
$produtoId = $_GET['id'];
$produtoNome = urldecode($_GET['name']);
$produtoPreco = $_GET['price'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
</head>

<body>
    <h1>Seu Carrinho de Compras</h1>

    <?php if (!empty($produtoId) && !empty($produtoNome) && !empty($produtoPreco)) : ?>
        <label>ID do Produto: <?= $produtoId ?></label>
        <label>Nome do Produto: <?= $produtoNome ?></label>
        <label>Preço do Produto: R$ <?= number_format($produtoPreco, 2, ',', '.') ?></label>
    <?php endif; ?>

    <ul>
        <?php foreach ($carrinho as $produto) : ?>
            <li>
                <h2><?= $produto['nome'] ?></h2>
                <p>Preço: R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>
