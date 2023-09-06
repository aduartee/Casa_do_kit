<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'];
    $newQuantity = $_POST['newQuantity'];

    if (isset($_SESSION['carrinho'][$productId])) {
        $_SESSION['carrinho'][$productId]['quantidade'] = $newQuantity;
    }

    $response = ['success' => true, 'message' => 'Quantidade atualizada com sucesso!'];
} else {
    $response = ['success' => false, 'message' => 'Erro ao atualizar a quantidade.'];
}

header('Content-Type: application/json');
echo json_encode($response);

