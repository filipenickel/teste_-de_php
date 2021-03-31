<header>
  <link rel="stylesheet" type="text/css" href="../styles/global.css" />

</header>
<?php
include('../conexao.php');

//Salva na tabela pedidos o numero do pedido e o cliente
$query = "INSERT INTO pedidos(cliente_id) VALUES('{$_POST['cliente']}')";
mysqli_query($conexao, $query);

// Seleciona o ultimo pedido criado pelo usuario
$querySelecionaPedido = "SELECT id FROM pedidos where `id` = (Select Max(id) from pedidos WHERE cliente_id = '{$_POST['cliente']}')";
$verificaPedido =  mysqli_query($conexao, $querySelecionaPedido);
while ($nPedido = mysqli_fetch_array($verificaPedido)) {
  $numPedido = $nPedido['id'];
}


if (isset($_POST["produtos"])) {
  foreach ($_POST["produtos"]  as $key => $produto) {

    $query = "INSERT INTO venda_produtos( id_venda, produto_id, quantidade) VALUES ('$numPedido','$produto','{$_POST["quantidades"][$key]}')";
    mysqli_query($conexao, $query);
  }
} else {
  echo "Select an option first !!";
}

$selectProdutosPedido =  mysqli_query($conexao, "SELECT venda_produtos.id_venda, produtos.produto_nome, produtos.valor_unit,venda_produtos.quantidade FROM venda_produtos 
 INNER JOIN produtos on venda_produtos.produto_id = produtos.id
 where venda_produtos.id_venda = '$numPedido'");

$selectCliente = mysqli_query($conexao, "SELECT nome FROM clientes WHERE id = '{$_POST['cliente']}'");

$cliente = mysqli_fetch_row($selectCliente);

?>
<div class="container-imprimir">
  <div class="container-info-imprimir">
    <h2>Cliente: <?php echo $cliente[0]; ?></h2>
    <h3>Numero do pedido: #<?php echo $numPedido; ?></h3>
  </div>

  <div class="container-info-produtos">
    <table>
      <thead>
        <tr>
          <th>Produto</th>
          <th>Quantidade</th>
          <th>Valor Unitario</th>
          <th>Total</th>
        </tr>
      </thead>

      <?php while ($produtos = mysqli_fetch_array($selectProdutosPedido)) { ?>

      <tbody>
        <tr>
          <td>
            <label><?php echo $produtos['produto_nome']; ?></label>
          </td>
          <td><label><?php echo $produtos['quantidade']; ?></label></td>
          <td><label>R$ <?php echo $produtos['valor_unit']; ?></label></td>
          <td>
            <label>R$
              <?php echo $resultadoTotalNota = number_format($produtos['quantidade'] * $produtos['valor_unit'], 2, '.', ''); ?></label>
          </td>
          <?php @$calculo = $resultadoTotalNota + $calculo; ?>
        </tr>
      </tbody>
      <?php } ?>
      <td></td>
      <td></td>

      <td>Total:</td>
      <td>R$: <?php echo number_format($calculo, 2, '.', ''); ?></td>

    </table>
  </div>
</div>


<!-- Script para impresora -->
<header>
  <script type="text/javascript">
  setTimeout("window.close();", 5000)
  </script>
</header>


<script type="text/javascript">
window.print();
</script>

<script type="text/javascript">
window.onload = function() {
  window.print();
}
</script>