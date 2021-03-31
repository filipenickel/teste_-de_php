<header>
  <link rel="stylesheet" type="text/css" href="../styles/global.css" />

</header>

<div class="container-form">
  <h1>Cadastro de novos Produtos</h1>

  <form class="form" action="../actions/insert_produto.php" method="POST">
    <input type="text" placeholder="Nome do Produto" required name="produto_nome"><br>

    <input type="decimal" class="mask" placeholder="Valor Unitario" id="valorunit" required step="0.00" max="999999"
      name="valor_unit"><br>

    <input type="number" placeholder="Quantidade" id="quantidade" required max="9999" name="produto_qtd"><br>

    <button type="submit" value="Salvar">Salvar</button>
  </form>
</div>