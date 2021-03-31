<?php
include('../conexao.php');

$cli_nome = $_POST['nome'];
$cli_end = $_POST['endereco'];
$cli_cpf = $_POST['cpf_cnpj'];
$cli_telefone = $_POST['telefone'];
$cli_email = $_POST['email'];

//Chama a função passando os valores
if (isset($_POST['cpf_cnpj'])) {
  cadastrar(
    $cli_nome,
    $cli_end,
    $cli_cpf,
    $cli_telefone,
    $cli_email,
    $conexao
  );
}

//Funcao que insere no banco de dados o cliente
function cadastrar(
  $cli_nome,
  $cli_end,
  $cli_cpf,
  $cli_telefone,
  $cli_email,
  $conexao
) {
  $query = "INSERT INTO clientes (nome, endereco, cpf_cnpj, telefone, email) VALUES ('$cli_nome', '$cli_end','$cli_cpf','$cli_telefone','$cli_email')";
  mysqli_query($conexao, $query);
}
header("Location:http://localhost/index.php?page=cad_cliente");