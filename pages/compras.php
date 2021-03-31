<?php
require('..\actions\select_client_prod.php');
?>
<header>
  <link rel="stylesheet" type="text/css" href="../styles/global.css" />
</header>
<div class="div-global">

  <?php include('../menu.php'); ?>

  <div class="container-form">

    <form class="form" class="form-compras" name="cad_client" method="post" action="../actions/cad_venda.php">
      <label>Selecione o Cliente</label>
      <select name="cliente">
        <option>Selecione...</option>
        <?php while ($cliente = mysqli_fetch_array($result_cliente)) { ?>
        <option value="<?php echo $cliente['id'] ?>"><?php echo $cliente['nome'] ?></option>
        <?php } ?>
      </select>

      <div id="tabela">
        <table>
          <thead>
            <tr>
              <th>Selecione</th>
              <th>Produto</th>
              <th>Quantidade</th>
              <th>Valor Unitario</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($produto = mysqli_fetch_array($result_produtos)) {
              @$i++;

            ?>

            <tr class="linha">
              <td>
                <input name="produtos[<?php echo $i ?>]" value="<?php echo $produto['id']; ?>" type="checkbox" />
              </td>
              <td>
                <label name="produtos"><?php echo $produto['produto_nome']; ?>
              </td>

              <td><input name="quantidades[<?php echo $i ?>]" type="number"
                  max="<?php echo $produto['produto_qtd']; ?>" /></td>

              <td>
                <input disabled type="number" value="<?php echo $produto['valor_unit'] ?>" />

              </td>
            </tr>
          </tbody>

          <?php } ?>
        </table>
      </div>


      <button type="submit" value="Salvar">Finalizar Compra</button>
    </form>
  </div>
</div>

<script src="../utils/functionsUtils.js"></script>