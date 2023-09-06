<?php
session_name('carrinho');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $productId = $_POST['idProduct'];

    error_log("Produto ID recebido: " . $productId); 

    
    if (isset($_SESSION['carrinho'][$productId])) {
        error_log('produto existe');
        unset($_SESSION['carrinho'][$productId]);
        
        $response = ['success' => true, 'message' => 'Produto removido do carrinho!'];
    } else {
        $response = ['success' => false, 'message' => 'Produto não encontrado no carrinho.'];
    }
} else {
    $response = ['success' => false, 'message' => 'Erro ao remover o produto do carrinho.'];
}

header('Content-Type: application/json');
echo json_encode($response);
?>

