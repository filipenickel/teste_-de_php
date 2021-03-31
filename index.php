<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <header>
    <link rel="stylesheet" href="./styles/global.css">
  </header>
</head>

<body>
  <div class="div-global">
    <?php include('./menu.php');


    $pagina = isset($_GET['page']) ? $_GET['page'] : '';

    switch ($pagina):
      case 'cad_cliente':
        include('./pages/cad_cliente.php');
        break;
      case 'cad_produto':
        include('./pages/cad_produto.php');
        break;
      default:

        break;
    endswitch;

    ?>

  </div>


</body>

</html>