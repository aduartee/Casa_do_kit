<?php
session_name('carrinho');
session_start();

if (isset($_POST['productId']) && isset($_POST['productName']) && isset($_POST['productPrice'])) {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productImage = $_POST['productImage'];


    $produto = [
        'id' => $productId,
        'nome' => $productName,
        'preco' => $productPrice,
        'imagem' => $productImage
    ];

    // Adicionar o produto à sessão do carrinho
    $_SESSION['carrinho'][] = $produto;
    

    $response = ['success' => true, 'message' => 'Produto adicionado ao carrinho!'];
} else {
    $response = ['success' => false, 'message' => 'Erro ao adicionar o produto ao carrinho.'];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
