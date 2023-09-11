<?php
require_once("conn.php");

class GerenciadorProdutos
{
    private $produtos = [];

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function adionarProduto(Produto $produto)
    {
        $this->produtos[] = $produto;
    }

    public function getProdutoPorTipo($tipo)
    {
        $produtoPorTipo = [];
        $query = "SELECT * FROM produtos WHERE tipo_produto = ? ORDER BY preco DESC";

        try { 
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $tipo);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $produto = new Produto($row['id'], $row['nome'], $row['preco'], $row['descricao'], $row['volume'], $row['disponibilidade'], $row['img'], $row['tipo']);

                $produtoPorTipo[] = $produto;
            }

            // Feche a consulta e retorne os resultados
            $stmt->close();
        } else{
            throw new Exception("Erro ao tentar buscar os dados no banco", $stmt->error);
        }
    } catch(Exception $e){
        echo "Erro ao tentar realizar a query" . $e->getMessage();
    }
        
        return $produtoPorTipo;
    }


    
}
