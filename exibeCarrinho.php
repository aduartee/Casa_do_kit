<?php
session_name('carrinho');
session_start();
include('header.php');
require_once("conn.php");


// Verifique se há produtos no carrinho
if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
    $carrinho = $_SESSION['carrinho'];
} else {
    $carrinho = [];
}


function calcularTotal($carrinho)
{
    $total = 0;

    foreach ($carrinho as $item) {
        $total += $item['preco'] * $item['quantidade'];
    }

    return $total;
}
?>


<body>
    <header class="header">
        <h1 class="header-title">Carrinho de Compras</h1>
    </header>

    <main class="main">
        <div id="toast" class="toast"></div>
        <table class="cart-table">
            <thead>
                <tr>
                    <th class="cart-table-header">Produto</th>
                    <th class="cart-table-header"></th>
                    <th class="cart-table-header">Preço</th>
                    <th class="cart-table-header">Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carrinho as $productId => $produto) : ?>
                    <tr class="cart-item2">
                        <td class="cart-item-image">
                            <div class="thumbnail-container">
                                <img src="<?= $produto['imagem'] ?>" width="50" alt="<?= $produto['nome'] ?>">
                                <div class="large-image-container">
                                    <img src="<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>">
                                </div>
                            </div>
                        </td>
                        <td class="cart-item-name"><?= $produto['nome'] ?></td>
                        <td class="cart-item-price">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                        <td>
                            <div class="quantity-input">
                                <input type="number" class="quantity" min="1" value="<?= $produto['quantidade'] ?>" data-product-id="<?= $productId ?>" data-product-price="<?= $produto['preco'] ?>" data-current-quantity="<?= $produto['quantidade'] ?>" id="quantity-<?= $productId ?>">
                                <button class="remove-button" data-id-product="<?= $productId ?>" data-price-product ="<?= $produto['preco']?>">
                                    <i class="bx bx-trash"></i> Remover
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if (empty($carrinho)) : ?>
            <p class="empty-cart-message">Seu carrinho está vazio.</p>
        <?php endif; ?>
    </main>

    <footer class="footer">
        <p id="footer-total">Total: R$ <?= number_format(calcularTotal($carrinho), 2, ',', '.') ?></p>
    </footer>

    <script src="updateCart.js"></script>
    <script src="js/zoomImagemCart.js"></script>
    <script src="js/updateTotal.js"></script>
    <script src="js/removeItem.js"></script>
</body>