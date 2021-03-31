<?php
  include('../conexao.php');
  $select_cliente = "SELECT id,nome FROM clientes";
  $select_produtos = "SELECT id, produto_nome, valor_unit, produto_qtd FROM produtos";
  $result_cliente = mysqli_query($conexao,$select_cliente);
  $result_produtos = mysqli_query($conexao,$select_produtos);