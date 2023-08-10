<?php
require_once("../header.php");
require_once("../conn.php");

$query = "SELECT * FROM produtos WHERE id = {$_GET['id']}";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$tipo_produto = '';


switch ($row['tipo_produto']) {

  case 'vodka':
    $tipo_produto = 'Vodka - ';
    break;

  case 'whiskey':

    $tipo_produto = 'Whiskey - ';
    break;

  case 'cervejas':

    $tipo_produto = 'Cerveja - ';
    break;

  case 'gins':

    $tipo_produto = 'Gins - ';
    break;

  case 'energicos':

    $tipo_produto = 'Energico - ';
    break;

  case 'espumantes':

    $tipo_produto = 'Espumante - ';
    break;

  case 'licores':

    $tipo_produto = 'Licor - ';
    break;
}

($row['disponibilidade'] == 'Em estoque') ? $resultado = 'text-success' : $resultado = 'text-danger';
?>


<body>
  <div class="container mt-5">

    <div class="row">
      <div class="col-md-6">
        <img src="<?= BASE_URL . $row['caminho_da_imagem'] ?>" alt="Produto <?= $row['id'] ?>" class="img-fluid">
      </div>
      <div class="col-md-6">
        <h1><?= $tipo_produto . $row['nome'] ?></h1>
        <p class="mb-4 fw-semibold">Disponibilidade: <span class="<?= $resultado ?>"><?= $row['disponibilidade'] ?> </span></p>
        <p class="fs-2 mb-4">R$ <?= number_format($row['preco'], 2, ',', '.'); ?></p>
        <h2 class="fs-3">Descrição:</h2>
        <p class="descricao-detalhada fs-5"><?= $row['descricao_detalhada'] ?></p>

        <p class="fs-6 fw-semibold">Escolha quantidade desejada:</p>
        <div class="adiciona-pedido mb-4">
          <button class="btn-diminuir" onclick="diminuirQuantidade()">-</button>
          <span id="quantidade">0</span>
          <button class="btn-aumentar" onclick="aumentarQuantidade()">+</button>
        </div>

        <p class="fs-6 fw-semibold">Escolha o tamanho desejado:</p>
        <div class="mw-100">
        <select id="tamanho" class="form-select mb-4 mw-10" style="width: 100px;">
          <?php
          $volumes = explode(',', $row['volume']); // Divide os valores separados por vírgula em um array
          foreach ($volumes as $volume) {
            $volume = trim($volume); // Remove espaços em branco antes e depois
            echo "<option value=\"$volume\">$volume</option>";
          }
          ?>
        </select>
        </div>
        <a href="bebidas/produto.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-buy">Comprar</a>


      </div>
    </div>
  </div>
</body>

</html>