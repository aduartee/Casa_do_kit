let quantidade = 0;

function atualizarQuantidade() {
  const quantidadeElement = document.getElementById('quantidade');
  quantidadeElement.textContent = quantidade.toString();
}

function aumentarQuantidade() {
  quantidade++;
  atualizarQuantidade();
}

function diminuirQuantidade() {
  if (quantidade > 0) {
    quantidade--;
    atualizarQuantidade();
  }
}