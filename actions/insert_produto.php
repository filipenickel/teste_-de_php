<?php
include('../conexao.php');

$nomeProduto = $_POST['produto_nome'];
$qtdProduto = $_POST['produto_qtd'];
$valorUnit = $_POST['valor_unit'];
$totalSoma = $valorUnit * $qtdProduto;

$query = "INSERT INTO produtos (produto_nome, valor_unit,produto_qtd,valor_total) VALUES ('$nomeProduto', '$valorUnit','$qtdProduto','$totalSoma')";
mysqli_query($conexao, $query);
header("Location:http://localhost/index.php?page=cad_produto");