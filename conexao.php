<?php
define('HOST','localhost');
define('USUARIO', 'root');
define('SENHA','');
define('DB','teste');

  $conexao = mysqli_connect(HOST,USUARIO,SENHA,DB) or die ('Não connectou ');
  
?>