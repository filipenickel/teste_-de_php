<header>
  <link rel="stylesheet" type="text/css" href="../styles/global.css" />
</header>
<?php
include('../conexao.php');


$query = "SELECT DISTINCT venda_produtos.id_venda FROM venda_produtos 
INNER JOIN produtos on venda_produtos.produto_id = produtos.id
INNER JOIN pedidos on venda_produtos.id_venda = pedidos.id 
where pedidos.cliente_id = '{$_POST['cliente']}'";
$todosPedidos = mysqli_query($conexao, $query); ?>
<div class="div-global">
  <?php include('../menu.php'); ?>

  <div class="container-form">
    <h3>Lista de pedidos</h3>
    <div id="tabela">
      <?php
      while ($pedidos = mysqli_fetch_array($todosPedidos)) { ?>

      <?php
        $query = "SELECT venda_produtos.id_venda, pedidos.id, produtos.produto_nome, venda_produtos.quantidade, produtos.valor_unit FROM venda_produtos 
  INNER JOIN produtos on venda_produtos.produto_id = produtos.id
  INNER JOIN pedidos on venda_produtos.id_venda = pedidos.id
  where id_venda = '{$pedidos['id_venda']}'";

        $todosProdutos = mysqli_query($conexao, $query); ?>

      <table>

        <thead>

          <tr>
            <th style="background-color: yellow;">Pedido: #<?php echo $pedidos['id_venda']; ?></th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Valor Unitario</th>
            <th>Total</th>
          </tr>
        </thead>
        <?php while ($produtos = mysqli_fetch_array($todosProdutos)) { ?>
        <tbody>

          <tr class="linha">
            <td></td>
            <td>
              <p><?php echo $produtos['produto_nome'] ?></p>
            </td>
            <td>
              <p><?php echo $produtos['quantidade'] ?></p>
            </td>
            <td>
              <p>R$ <?php echo $produtos['valor_unit'] ?></p>
            </td>
            <td>
              <p>R$
                <?php echo $somaUnit = number_format($produtos['valor_unit'] * $produtos['quantidade'], 2, '.', '');  ?>
              </p>
            </td>

          </tr>
        </tbody>
        <?php } ?></br></br>
        <?php } ?>
      </table>
    </div>


  </div>
</div>