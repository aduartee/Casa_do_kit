<?php
require_once("header.php");
require_once("conn.php");

$query = "SELECT * FROM produtos ORDER BY preco DESC";
$result = $conn->query($query);


$vodkas = [];
$whiskeys = [];
$cervejas = [];
$gins = [];
$energicos = [];
$espumantes = [];
$licores = [];

while ($row = $result->fetch_assoc()) {
  if ($row['tipo_produto'] == 'vodka') {
    $vodkas[] = $row;
  } elseif ($row['tipo_produto'] == 'whiskey') {
    $whiskeys[] = $row;
  } elseif ($row['tipo_produto'] == 'cervejas') {
    $cervejas[] = $row;
  } elseif ($row['tipo_produto'] == 'gins') {
    $gins[] = $row;
  } elseif ($row['tipo_produto'] == 'energicos') {
    $energicos[] = $row;
  } elseif ($row['tipo_produto'] == 'espumantes') {
    $espumantes[] = $row;
  } elseif ($row['tipo_produto'] == 'licores') {
    $licores[] = $row;
  }
}
?>

<body>

  <div class="container mt-5 text-center">
    <div class="row">
      <div class="col-md-12">
        <h1 id="promo" class="mb-7"><span id="ofertas">Ofertas da semana</span></h1>
      </div>
    </div>

    <div class="row">
      <?php
      $count = 0;
      foreach ($vodkas as $row) :
        if ($count % 4 == 0) :
      ?>
          <div class="w-100"></div>
        <?php endif; ?>
        <div class="col-md-3 mb-9">
          <div class="card mb-3">
            <div class="zoom-image">
              <img src="<?= BASE_URL . $row['caminho_da_imagem'] ?>" alt="Produto <?= $row['id'] ?>" class="card-img-top product-image imagem-produto">
              <a href="bebidas/produto.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-buy">Comprar</a>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?= $row['nome']; ?></h5>
              <p class="card-text"><?= $row['descricao']; ?></p>
              <p class="preco"><b>Preço: R$ <?= number_format($row['preco'], 2, ',', '.'); ?></b></p>
            </div>
          </div>
        </div>
      <?php
        $count++;
      endforeach;
      ?>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h1 id="promo" class="mb-7"><span id="ofertas">Energéticos</span></h1>
      </div>
    </div>

    <div class="row justify-content-center">
      <?php foreach ($energicos as $row) : ?>
        <?php
        //Caso os dados que vem da tabela sejam menores que 4, os cards são exibos no meio
        $cardClasse = count($energicos) < 4 ? "col-md-4 mb-9" : "col-md-3 mb-9";
        ?>
        <div class="<?= $cardClasse ?>">
          <div class="card mb-3">
            <div class="zoom-image">
              <img src="<?= BASE_URL . $row['caminho_da_imagem'] ?>" alt="Produto <?= $row['id'] ?>" class="card-img-top product-image">
              <a href="bebidas/produto.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-buy">Comprar</a>
            </div>
            <div class="card-body mb-5">
              <h5 class="card-title"><?= $row['nome']; ?></h5>
              <p class="card-text"><?= $row['descricao']; ?></p>
              <p class="preco"><b>Preço: R$ <?= number_format($row['preco'], 2, ',', '.'); ?></b></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h1 id="promo" class="mb-7"><span id="ofertas">Whiskeys</span></h1>
      </div>
    </div>

    <div class="row">
      <?php foreach ($whiskeys as $row) : ?>
        <div class="col-md-3 mb-9">
          <div class="card mb-3">
            <div class="zoom-image">
              <img src="<?= BASE_URL . $row['caminho_da_imagem'] ?>" alt="Produto <?= $row['id'] ?>" class="card-img-top product-image">
              <a href="bebidas/produto.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-buy">Comprar</a>
            </div>
            <div class="card-body mb-5">
              <h5 class="card-title"><?= $row['nome']; ?></h5>
              <p class="card-text"><?= $row['descricao']; ?></p>
              <p class="preco"><b>Preço: R$ <?= number_format($row['preco'], 2, ',', '.'); ?></b></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h1 id="promo" class="mb-7"><span id="ofertas">Cervejas</span></h1>
      </div>
    </div>

    <div class="row">
      <?php foreach ($cervejas as $row) : ?>
        <div class="col-md-3 mb-9">
          <div class="card mb-3">
            <div class="zoom-image">
              <img src="<?= BASE_URL . $row['caminho_da_imagem'] ?>" alt="Produto <?= $row['id'] ?>" class="card-img-top product-image">
              <a href="bebidas/produto.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-buy">Comprar</a>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?= $row['nome']; ?></h5>
              <p class="card-text"><?= $row['descricao']; ?></p>
              <p class="preco"><b>Preço: R$ <?= number_format($row['preco'], 2, ',', '.'); ?></b></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>


    <div class="row">
      <div class="col-md-12">
        <h1 id="promo" class="mb-7"><span id="ofertas">Gin´s</span></h1>
      </div>
    </div>

    <div class="row">
      <?php foreach ($gins as $row) : ?>
        <div class="col-md-3">
          <div class="card mb-3">
            <div class="zoom-image">
              <img src="<?= BASE_URL . $row['caminho_da_imagem'] ?>" alt="Produto <?= $row['id'] ?>" class="card-img-top product-image">
              <a href="bebidas/produto.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-buy">Comprar</a>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?= $row['nome']; ?></h5>
              <p class="card-text"><?= $row['descricao']; ?></p>
              <p class="preco"><b>Preço: R$ <?= number_format($row['preco'], 2, ',', '.'); ?></b></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h1 id="promo" class="mb-7"><span id="ofertas">Espumantes</span></h1>
      </div>
    </div>

    <div class="row">
      <?php foreach ($espumantes as $row) : ?>
        <?php
        //Caso os dados que vem da tabela sejam menores que 4, os cards são exibos no meio
        $cardClasse = count($energicos) < 4 ? "col-md-4 mb-9" : "col-md-3 mb-9";
        ?>
        <div class="<?= $cardClasse ?>">
          <div class="card mb-3">
            <div class="zoom-image">
              <img src="<?= BASE_URL . $row['caminho_da_imagem'] ?>" alt="Produto <?= $row['id'] ?>" class="card-img-top product-image">
              <a href="bebidas/produto.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-buy">Comprar</a>
            </div>
            <div class="card-body">
              <h5 class="card-title"><?= $row['nome']; ?></h5>
              <p class="card-text mb-5"><?= $row['descricao']; ?></p>
              <p class="preco"><b>Preço: R$ <?= number_format($row['preco'], 2, ',', '.'); ?></b></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  
    <div class="row">
      <div class="col-md-12">
        <h1 id="promo" class="mb-7"><span id="ofertas">Espumantes</span></h1>
      </div>
    </div>

  <div class="row">
    <?php foreach ($licores as $row) : ?>
      <div class="col-md-3">
        <div class="card mb-3">
          <div class="zoom-image">
            <img src="<?= BASE_URL . $row['caminho_da_imagem'] ?>" alt="Licores <?= $row['id'] ?>" class="card-img-top product-image">
            <a href="bebidas/produto.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-buy">Comprar</a>
          </div>
          <div class="card-body">
            <h5 class="card-title"><?= $row['nome']; ?></h5>
            <p class="card-text"><?= $row['descricao']; ?></p>
            <p class="preco"><b>Preço: R$ <?= number_format($row['preco'], 2, ',', '.'); ?></b></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  </div>
</body>

</html>