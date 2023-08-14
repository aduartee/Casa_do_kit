<?php
require_once("header.php");
require_once("carrinho.php");


// Verifique se há produtos no carrinho
if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
    $carrinho = $_SESSION['carrinho']; // Array de produtos no carrinho
} else {
    $carrinho = array(); // Inicialize o carrinho vazio
}
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

    <?php if (empty($carrinho)) : ?>
        <p>Seu carrinho está vazio.</p>
    <?php else : ?>
        <ul>
            <?php foreach ($carrinho as $produto) : ?>
                <li>
                    <h2><?= $produto['nome']; ?></h2>
                    <p>Preço: R$ <?= number_format($produto['preco'], 2, ',', '.'); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
