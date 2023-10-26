<?php
session_name('carrinho');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productAmount = $_POST['productAmount'];
    $poductImage = $_POST['productImage'];

    if (isset($_SESSION['carrinho'][$productId])) {
        $_SESSION['carrinho'][$productId]['quantidade'] += $productAmount;
    } else {
        $_SESSION['carrinho'][$productId] = [
            'id' => $productId,
            'nome' => $productName,
            'preco' => $productPrice,
            'quantidade' => $productAmount,
            'imagem' => $poductImage
        ];
    }

    $response = ['success' => true, 'message' => 'Produto adicionado ao carrinho!'];
} else {
    $response = ['success' => false, 'message' => 'Erro ao adicionar o produto ao carrinho.'];
}

header('Content-Type: application/json');
echo json_encode($response);

?>
