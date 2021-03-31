<?php
include('../actions/select_client_prod.php');
?>
<header>
  <link rel="stylesheet" type="text/css" href="../styles/global.css" />
</header>

<div class="div-global">
  <?php include('../menu.php'); ?>
  <div class="container-form">
    <form class="form" class="form-compras" name="cad_client" method="post" action="./listagem_venda.php">

      <label>Selecione o Cliente</label>
      <select name="cliente">
        <option>Selecione...</option>
        <?php while ($cliente = mysqli_fetch_array($result_cliente)) { ?>
        <option value="<?php echo $cliente['id'] ?>"><?php echo $cliente['nome'] ?></option>
        <?php } ?>
      </select>
      <button type="submit" value="Salvar">Pesquisar</button>



      <h3 style="text-align: center;">Selecione o Cliente para ver os pedidos</h3>
  </div>
</div>