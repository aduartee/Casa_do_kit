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

    foreach ($carrinho as $itemPrice) {
        $total += $itemPrice['preco'];
    }

    return $total;
}
?>


<body>
    <header class="header">
        <h1 class="header-title">Carrinho de Compras</h1>
    </header>

    <main class="main">
        <table class="cart-table">
            <thead>
                <tr>
                    <th class="cart-table-header">Produto</th>
                    <th class="cart-table-header"></th>
                    <th class="cart-table-header">Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carrinho as $produto) :?>
                    <tr class="cart-item2">
                        <td class="cart-item-image"><img src="<?= $produto['imagem'] ?>" width="50"></td>
                        <td class="cart-item-name"><?= $produto['nome'] ?></td>
    
                        <td class="cart-item-price">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>

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

</body>